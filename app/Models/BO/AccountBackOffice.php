<?php

namespace App\Models\BO;
use Illuminate\Support\Facades\DB;

class AccountBackOffice
{
    public $id_account;
    public $mail;
    public $password;
    public $firstname;
    public $name;
    public $telephone_number;


    // Getter pour l'attribut 'mail'
    public function getPrimaryKey()
    {
        return $this->id_account;
    }

    // Setter pour l'attribut 'mail'
    public function setPrimaryKey($value)
    {
        $this->id_account = $value;
    }

    public function getPassword()
    {
        return $this->password;
    }

    // Setter pour l'attribut 'mail'
    public function setPassword($value)
    {
        $this->password = $value;
    }

    // Getter pour l'attribut 'mail'
    public function getMail()
    {
        return $this->mail;
    }

    // Setter pour l'attribut 'mail'
    public function setMail($value)
    {
        $this->mail = $value;
    }

    // Getter pour l'attribut 'firstname'
    public function getFirstname()
    {
        return $this->firstname;
    }

    // Setter pour l'attribut 'firstname'
    public function setFirstname($value)
    {
        $this->firstname = $value;
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
    public function getTelephoneNumber()
    {
        // Ajouter une logique personnalisée si nécessaire
        return $this->telephone_number;
    }

    // Setter pour l'attribut 'telephone_number'
    public function setTelephoneNumber($value)
    {
        // Ajouter une logique personnalisée si nécessaire
        $this->telephone_number = $value;
    }

    public function __construct()
    {
    }

    public function getAllAccountBackOffice()
    {
        $accounts = DB::select('SELECT * FROM account_back_office');
        $res = array();
        foreach ($accounts as $result) {
            $temp = new AccountBackOffice();
            $temp->setPrimaryKey($result->id_account);
            $temp->setMail($result->mail);
            $temp->setPassword($result->password);
            $temp->setFirstname($result->firstname);
            $temp->setName($result->name);
            $temp->setTelephoneNumber($result->telephone_number);
            $res[] = $temp;
        }
        return $res;
    }


    public function getAccountBackOfficeConnected($mail, $pwd)
    {
        $req = 'SELECT * FROM account_back_office WHERE mail = "%s" AND password = "%s"';
        $req = sprintf($req, $mail, $pwd);
        $accounts = DB::select($req);
        if (count($accounts) > 0) {
            $result = $accounts[0];
            $res = new AccountBackOffice();
            $res->id_account = $result->id_account;
            $res->mail = $result->mail;
            $res->password = $result->password;
            $res->firstname = $result->firstname;
            $res->name = $result->name;
            $res->telephone_number = $result->telephone_number;
            return $res;
        }

        return null;
    }

    public function insertAccountBackOffice(){
        $req = 'INSERT INTO account_back_office(mail,password,firstname,name,telephone_number) VALUES ("%s","%s","%s","%s",%s) ';
        $mail = $this->mail;
        $pwd = $this->password;
        $name = $this->name ;
        $firstname = $this->firstname ;
        $tel = $this->telephone_number ;
        $req = sprintf($req,$mail,$pwd,$name,$firstname,$tel);
        DB::insert($req);
    }
}
