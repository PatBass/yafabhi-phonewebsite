<?php



class DBFactory
{
    public static function getMysqlConnexionWithPDO()
    {
        $db = new PDO('mysql:host=localhost', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    public static function getMysqlConnexionWithMySQLi()
    {

        return new MySQLi('localhost', 'bambou01_pnk', '@#bassoukissa$', 'bambou01_pnk');

    }
}

