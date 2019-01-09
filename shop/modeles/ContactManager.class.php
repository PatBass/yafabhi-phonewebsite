<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 9/14/14
 * Time: 2:29 PM
 */
abstract class ContactManager
{
    /**
     * Méthode permettant d'ajouter un contact
     * @param $contact Contact Le contact à ajouter
     * @return void
     */
    abstract protected function add(Contact $contact);
    /**
     * Méthode renvoyant le nombre de contacts total
     * @return int
     */
    abstract public function count();
    /**
     * Méthode permettant de supprimer un contact
     * @param $id int L'identifiant du contact à supprimer
     * @return void
     */
    abstract public function delete($id);
    /**
     * Méthode retournant une liste du contact demandé
     * @param $debut int Le premier contact à sélectionner
     * @param $limite int Le nombre de contacts à sélectionner
     * @return array La liste des contacts. Chaque entrée est une instance de Contact.
     */
    abstract public function getList($debut = -1, $limite = -1);
    /**
     * Méthode retournant un contact précise
     * @param $id int L'identifiant du contact à récupérer
     * @return Contact Le contact demandé
     */
    abstract public function getUnique($id);
    /**
     * Méthode permettant d'enregistrer un contact
     * @param $contact Contact le contact à enregistrer
     * @see self::add()
     * @see self::modify()
     * @return void
     */
    public function save(Contact $contact)
    {
        if ($contact->isValid())
        {
            $this->add($contact);
        }
        else
        {
            throw new RuntimeException('Contact info must be valid to be sent');
        }
    }

}