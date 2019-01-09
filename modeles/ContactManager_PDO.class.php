<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 9/15/14
 * Time: 2:35 PM
 */
class ContactManager_PDO extends ContactManager
{
    /**
     * Attribut contenant l'instance représentant la BDD
     * @type PDO
     */
    protected $db;
    /**
     * Constructeur étant chargé d'enregistrer l'instance de PDO dansl'attribut $db
     * @param $db PDO Le DAO
     * @return void
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    /**
     * @see ContactManager::add()
     */
    protected function add(Contact $contact)
    {
        $requete = $this->db->prepare('INSERT INTO contact SET last_name =
		:last_name, first_name = :first_name, email=:email, message = :message, dateAjout = NOW()');
        $requete->bindValue(':last_name', $contact->last_name());
        $requete->bindValue(':email', $contact->email());
        $requete->bindValue(':first_name', $contact->first_name());
        $requete->bindValue(':message', $contact->message());
        $requete->execute();
    }
    /**
     * @see ContactManager::count()
     */
    public function count()
    {
        return $this->db->query('SELECT COUNT(*) FROM contact')->fetchColumn();
    }
    /**
     * @see ContactManager::delete()
     */
    public function delete($id)
    {
        $this->db->exec('DELETE FROM contact WHERE id = '.(int) $id);
    }
    /**
     * @see ConntactManager::getList()
     */
    public function getList($debut = -1, $limite = -1)
    {
        $sql = 'SELECT id, last_name, email, message, first_name, DATE_FORMAT(dateAjout, \'le %d/%m/%Y à %Hh%i\')
				AS dateAjout
				FROM contact
				ORDER BY id DESC';
        // On vérifie l'intégrité des paramètres fournis
        if ($debut != -1 || $limite != -1)
        {
            $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
        }
        $requete = $this->db->query($sql);
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Contact');
        $listeContact = $requete->fetchAll();
        $requete->closeCursor();
        return $listeContact;
    }
    /**
     * @see ContactManager::getUnique()
     */
    public function getUnique($id)
    {
        $requete = $this->db->prepare('SELECT id, last_name, first_name, message, email, DATE_FORMAT (dateAjout, \'le %d/%m/%Y à %Hh%i\') AS dateAjout
										FROM contact
										WHERE id = :id');
        $requete->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $requete->execute();
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Contact');
        return $requete->fetch();
    }
}