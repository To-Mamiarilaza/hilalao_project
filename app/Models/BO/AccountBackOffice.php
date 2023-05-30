<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class AccountBackOffice extends Model
{
    protected $table = 'account_back_office';
    protected $primaryKey = 'id_account';
    public $timestamps = false;

    protected $fillable = [
        'mail',
        'password',
        'firstname',
        'name',
        'telephone_number',
    ];

    // Autres relations ou méthodes du modèle

    // Getter pour l'attribut 'mail'
    public function getPrimaryKey()
    {
        return $this->attributes['primaryKey'];
    }

    // Setter pour l'attribut 'mail'
    public function setPrimaryKey($value)
    {
        $this->attributes['primaryKey'] = $value;
    }

    public function getPassword()
    {
        return $this->attributes['password'];
    }

    // Setter pour l'attribut 'mail'
    public function setPassword($value)
    {
        $this->attributes['password'] = $value;
    }

    // Getter pour l'attribut 'mail'
    public function getMailAttribute()
    {
        return $this->attributes['mail'];
    }

    // Setter pour l'attribut 'mail'
    public function setMailAttribute($value)
    {
        $this->attributes['mail'] = $value;
    }

    // Getter pour l'attribut 'firstname'
    public function getFirstnameAttribute()
    {
        return $this->attributes['firstname'];
    }

    // Setter pour l'attribut 'firstname'
    public function setFirstnameAttribute($value)
    {
        $this->attributes['firstname'] = $value;
    }

    // Autres getters et setters pour les attributs

    // Exemple :
    // Getter pour l'attribut 'telephone_number'
    public function getTelephoneNumberAttribute()
    {
        // Ajouter une logique personnalisée si nécessaire
        return $this->attributes['telephone_number'];
    }

    // Setter pour l'attribut 'telephone_number'
    public function setTelephoneNumberAttribute($value)
    {
        // Ajouter une logique personnalisée si nécessaire
        $this->attributes['telephone_number'] = $value;
    }

    public function __construct($id, $mail,$pwd,$firstname,$name,$tel)
    {
        parent::__construct();
        $this->id_account = $id;
        $this->mail = $mail;
        $this->password = $pwd;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->telephone_number = $tel;
    }
// 
    public function getAllAccountBackOffice()
    {
        $accounts = DB::select('SELECT * FROM account_back_office');
        $results =  response()->json($accounts);
        $res = array();
        foreach ($results as $result) {
            $id = $result->id_account;
            $mail = $result->mail;
            $pwd = $result->password;
            $firstname = $result->firstname;
            $name = $result->name;
            $telephoneNumber = $result->telephone_number;
            $res[] = new AccountBackOffice($id,$mail,$pwd,$firstname,$name,$telephoneNumber);
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
            $id = $result->id_account;
            $mail = $result->mail;
            $pwd = $result->password;
            $firstname = $result->firstname;
            $name = $result->name;
            $telephoneNumber = $result->telephone_number;

            $res = new AccountBackOffice($id, $mail, $pwd, $firstname, $name, $telephoneNumber);
            return $res;
        }

        return null;
    }

    public function insertAccountBackOffice($mail,$pwd,$firstname,$name,$tel){
        $temp = new AccountBackOffice();
        $temp->mail = $mail;
        
    }
}
