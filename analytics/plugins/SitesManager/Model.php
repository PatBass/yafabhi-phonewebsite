<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\SitesManager;

use Piwik\Access;
use Piwik\Date;
use Piwik\Db;
use Piwik\Common;
use Exception;

class Model
{
    private static $rawPrefix = 'site';
    private $table;

    public function __construct()
    {
        $this->table = Common::prefixTable(self::$rawPrefix);
    }

    public function createSite($site)
    {
        $db = $this->getDb();
        $db->insert($this->table, $site);

        $idSite = $db->lastInsertId();

        return $idSite;
    }

    /**
     * Returns all websites belonging to the specified group
     * @param string $group Group name
     * @return array of sites
     */
    public function getSitesFromGroup($group)
    {
        $sites = $this->getDb()->fetchAll("SELECT * FROM " . $this->table . "
                                           WHERE `group` = ?", $group);

        return $sites;
    }

    /**
     * Returns the list of website groups, including the empty group
     * if no group were specified for some websites
     *
     * @return array of group names strings
     */
    public function getSitesGroups()
    {
        $groups = $this->getDb()->fetchAll("SELECT DISTINCT `group` FROM " . $this->table);

        $cleanedGroups = array();
        foreach ($groups as $group) {
            $cleanedGroups[] = $group['group'];
        }

        return $cleanedGroups;
    }

    /**
     * Returns all websites
     *
     * @return array The list of websites, indexed by idsite
     */
    public function getAllSites()
    {
        $sites = $this->getDb()->fetchAll("SELECT * FROM " . $this->table . " ORDER BY idsite ASC");

        return $sites;
    }

    /**
     * Returns the list of the website IDs that received some visits since the specified timestamp.
     *
     * @param \Piwik\Date $time
     * @param \Piwik\Date $now
     * @return array The list of website IDs
     */
    public function getSitesWithVisits($time, $now)
    {
        $sites = Db::fetchAll("
            SELECT idsite FROM " . $this->table . " s
            WHERE EXISTS (
                SELECT 1
                FROM " . Common::prefixTable('log_visit') . " v
                WHERE v.idsite = s.idsite
                AND visit_last_action_time > ?
                AND visit_last_action_time <= ?
                LIMIT 1)
        ", array($time, $now));

        return $sites;
    }


    /**
     * Returns the list of websites ID associated with a URL.
     *
     * @param string $url
     * @param string $urlBis
     * @return array list of websites ID
     */
    public function getAllSitesIdFromSiteUrl($url, $urlBis)
    {
        $siteUrlTable = Common::prefixTable('site_url');

        $ids = $this->getDb()->fetchAll(
            'SELECT idsite FROM ' . $this->table . '
                    WHERE (main_url = ? OR main_url = ?) ' .
            'UNION
                SELECT idsite FROM ' . $siteUrlTable . '
                    WHERE (url = ? OR url = ?) ', array($url, $urlBis, $url, $urlBis));

        return $ids;
    }

    /**
     * Returns the list of websites ID associated with a URL.
     *
     * @param string $url
     * @return array list of websites ID
     */
    public function getSitesIdFromSiteUrlHavingAccess($url, $urlBis, $login)
    {
        $siteUrlTable  = Common::prefixTable('site_url');
        $sqlAccessSite = Access::getSqlAccessSite('idsite');

        $ids = $this->getDb()->fetchAll(
            'SELECT idsite
                FROM ' . $this->table . '
                    WHERE (main_url = ? OR main_url = ?)' .
            'AND idsite IN (' . $sqlAccessSite . ') ' .
            'UNION
                SELECT idsite
                FROM ' . $siteUrlTable . '
                    WHERE (url = ? OR url = ?)' .
            'AND idsite IN (' . $sqlAccessSite . ')',
            array($url, $urlBis, $login, $url, $urlBis, $login));

        return $ids;
    }

    /**
     * Returns all websites with a timezone matching one the specified timezones
     *
     * @param array $timezones
     * @return array
     * @ignore
     */
    public function getSitesFromTimezones($timezones)
    {
        $query = 'SELECT idsite FROM ' . $this->table . '
                  WHERE timezone IN (' . Common::getSqlStringFieldsArray($timezones) . ')
                  ORDER BY idsite ASC';
        $sites = $this->getDb()->fetchAll($query, $timezones);

        return $sites;
    }

    public function deleteSite($idSite)
    {
        $db = $this->getDb();

        $db->query("DELETE FROM " . $this->table . " WHERE idsite = ?", $idSite);
        $db->query("DELETE FROM " . Common::prefixTable("site_url") . " WHERE idsite = ?", $idSite);
        $db->query("DELETE FROM " . Common::prefixTable("access") . " WHERE idsite = ?", $idSite);
    }

    /**
     * Returns the list of websites from the ID array in parameters.
     *
     * @param array $idSites list of website ID
     * @param bool $limit
     * @return array
     */
    public function getSitesFromIds($idSites, $limit = false)
    {
        if (count($idSites) === 0) {
            return array();
        }

        if ($limit) {
            $limit = "LIMIT " . (int)$limit;
        } else {
            $limit = '';
        }

        $idSites = array_map('intval', $idSites);

        $db    = $this->getDb();
        $sites = $db->fetchAll("SELECT * FROM " . $this->table . "
                                WHERE idsite IN (" . implode(", ", $idSites) . ")
                                ORDER BY idsite ASC $limit");

        return $sites;
    }

    /**
     * Returns the website information : name, main_url
     *
     * @throws Exception if the site ID doesn't exist or the user doesn't have access to it
     * @param int $idSite
     * @return array
     */
    public function getSiteFromId($idSite)
    {
        $site = $this->getDb()->fetchRow("SELECT * FROM " . $this->table . "
                                          WHERE idsite = ?", $idSite);

        return $site;
    }

    /**
     * Returns the list of all the website IDs registered.
     * Caller must check access.
     *
     * @return array The list of website IDs
     */
    public function getSitesId()
    {
        $result  = Db::fetchAll("SELECT idsite FROM " . Common::prefixTable('site'));

        $idSites = array();
        foreach ($result as $idSite) {
            $idSites[] = $idSite['idsite'];
        }

        return $idSites;
    }

    /**
     * Returns the list of all URLs registered for the given idSite (main_url + alias URLs).
     *
     * @throws Exception if the website ID doesn't exist or the user doesn't have access to it
     * @param int $idSite
     * @return array list of URLs
     */
    public function getSiteUrlsFromId($idSite)
    {
        $urls = $this->getAliasSiteUrlsFromId($idSite);
        $site = $this->getSiteFromId($idSite);

        if (empty($site)) {
            return $urls;
        }

        return array_merge(array($site['main_url']), $urls);
    }

    /**
     * Returns the list of alias URLs registered for the given idSite.
     * The website ID must be valid when calling this method!
     *
     * @param int $idSite
     * @return array list of alias URLs
     */
    public function getAliasSiteUrlsFromId($idSite)
    {
        $db     = $this->getDb();
        $result = $db->fetchAll("SELECT url FROM " . Common::prefixTable("site_url") . "
                                WHERE idsite = ?", $idSite);
        $urls = array();
        foreach ($result as $url) {
            $urls[] = $url['url'];
        }

        return $urls;
    }

    public function updateSite($site, $idSite)
    {
        $idSite = (int) $idSite;

        $db = $this->getDb();
        $db->update($this->table, $site, "idsite = $idSite");
    }

    /**
     * Returns the list of unique timezones from all configured sites.
     *
     * @return array ( string )
     */
    public function getUniqueSiteTimezones()
    {
        $results = Db::fetchAll("SELECT distinct timezone FROM " . $this->table);

        $timezones = array();
        foreach ($results as $result) {
            $timezones[] = $result['timezone'];
        }

        return $timezones;
    }

    /**
     * Updates the field ts_created for the specified websites.
     *
     * @param $idSites int Id Site to update ts_created
     * @param string Date to set as creation date.
     *
     * @ignore
     */
    public function updateSiteCreatedTime($idSites, $minDateSql)
    {
        $idSites   = array_map('intval', $idSites);

        $query = "UPDATE " . $this->table . " SET ts_created = ?" .
                " WHERE idsite IN ( " . implode(",", $idSites) . " ) AND ts_created > ?";

        $bind  = array($minDateSql, $minDateSql);

        Db::query($query, $bind);
    }

    /**
     * Insert the list of alias URLs for the website.
     * The URLs must not exist already for this website!
     */
    public function insertSiteUrl($idSite, $url)
    {
        $db = $this->getDb();
        $db->insert(Common::prefixTable("site_url"), array(
                'idsite' => (int) $idSite,
                'url'    => $url
            )
        );
    }

    public function getPatternMatchSites($ids, $pattern, $limit)
    {
        $ids_str = '';
        foreach ($ids as $id_val) {
            $ids_str .= (int) $id_val . ' , ';
        }
        $ids_str .= (int) $id_val;

        $bind = array('%' . $pattern . '%', 'http%' . $pattern . '%', '%' . $pattern . '%');

        // Also match the idsite
        $where = '';
        if (is_numeric($pattern)) {
            $bind[] = $pattern;
            $where  = 'OR s.idsite = ?';
        }

        $query = "SELECT idsite, name, main_url, `group`
                  FROM " . $this->table . " s
                  WHERE (    s.name like ?
                          OR s.main_url like ?
                          OR s.`group` like ?
                          $where )
                     AND idsite in ($ids_str)
                 LIMIT " . (int) $limit;

        $db    = $this->getDb();
        $sites = $db->fetchAll($query, $bind);

        return $sites;
    }

    /**
     * Delete all the alias URLs for the given idSite.
     */
    public function deleteSiteAliasUrls($idsite)
    {
        $db = $this->getDb();
        $db->query("DELETE FROM " . Common::prefixTable("site_url") . " WHERE idsite = ?", $idsite);
    }

    private function getDb()
    {
        return Db::get();
    }
}
