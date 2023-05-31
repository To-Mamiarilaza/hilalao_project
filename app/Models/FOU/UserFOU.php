<?php

namespace App\Models\FOU;
use Illuminate\Support\Facades\DB;
use App\Exceptions\UserException;

class UserFOU
{
    public $id_user;
    public $id_genre;
    public $name;
    public $email;
    public $dtn;
    public $genre;
    public $mdp;
    public $contact;


    // Getter pour l'attribut 'mail'
    public function getIdUser()
    {
        return $this->id_user;
    }

    // Setter pour l'attribut 'mail'
    public function setIdUser($value)
    {
        $this->id_user = $value;
    }

    public function getContact() {
        return $this->contact;
    }

    public function setContact($values) {
        $this->contact = $values;
    }

    public function getIdGenre() {
        return $this->id_genre;
    }

    public function setIdGenre($value) {
        $this->id_genre = $value;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function setGenre($value) {
        $this->genre = $value;
    }

    public function getMDP()
    {
        return $this->mdp;
    }

    // Setter pour l'attribut 'mail'
    public function setMDP($value)
    {
        $this->mdp = $value;
    }

    // Getter pour l'attribut 'mail'
    public function getEmail()
    {
        return $this->email;
    }

    // Setter pour l'attribut 'mail'
    public function setEmail($value)
    {
        $this->email = $value;
    }

    public function getName()
    {
        return $this->name;
    }

    // Setter pour l'attribut 'name'
    public function setName($value)
    {
        $this->name = $value;
    }

    // Autres getters et setters pour les attributs

    // Exemple :
    // Getter pour l'attribut 'telephone_number'
    public function getDTN()
    {
        // Ajouter une logique personnalisée si nécessaire
        return $this->dtn;
    }

    // Setter pour l'attribut 'telephone_number'
    public function setDTN($value)
    {
        // Ajouter une logique personnalisée si nécessaire
        $this->dtn = $value;
    }

    public function __construct()
    {

    }

    public function log() {
        try {
            $users = new UserFOU();
            $users = $users->findUserByUsername($this->getName());
            if ($users->getMDP() != $this->getMDP()) {
                throw new UserException("mdp", "Mot de passe érroné");
            }
            return $users;
        } catch (UserException $e) {
            throw $e;
        }

    }

    public function save() {
        $sql ="INSERT INTO users (name, email, dtn, mdp, id_genre, contact) VALUES ('%s', '%s', '%s', '%s', %s, '%s')";
        $sql = sprintf($sql, $this->getName(), $this->getEmail(), $this->getDTN(), $this->getMDP(), $this->getIdGenre(), $this->getContact());
        DB::insert($sql);
    }

    public static function findAll() {
        $users = DB::select('SELECT * FROM v_list_users');
        $res = array();
        foreach ($users as $result) {
            $temp = new UserFOU();
            $temp->setIdUser($result->id_user);
            $temp->setName($result->name);
            $temp->setGenre($result->genre);
            $temp->setIdGenre($result->id_genre);
            $temp->setDTN($result->dtn);
            $temp->setEmail($result->email);
            $temp->setMDP($result->mdp);
            $temp->setContact($result->contact);
            $res[] = $temp;
        }
        return $res;
    }

    public static function findUserByUsername($username) {
        $sql = "SELECT * FROM v_list_users WHERE email='%s' OR name='%s'";
        $sql = sprintf($sql, $username, $username);
        $results = DB::select($sql);
        $temp = new UserFOU();
        if (count($results)!=0) {
            $result = $results[0];
            $temp->setIdUser($result->id_user);
            $temp->setName($result->name);
            $temp->setGenre($result->genre);
            $temp->setIdGenre($result->id_genre);
            $temp->setDTN($result->dtn);
            $temp->setEmail($result->email);
            $temp->setMDP($result->mdp);
            $temp->setContact($result->contact);
        } else {
            throw new UserException("username","L'utilisateur n'existe pas");
        }
        return $temp;
    }


}
