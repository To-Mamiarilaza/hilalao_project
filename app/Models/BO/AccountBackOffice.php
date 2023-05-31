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

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllAccountBackOffice()
    {
        $accounts = DB::select('SELECT * FROM account_back_office');
        $results =  response()->json($accounts);
        $res = array();
        $temp = null;
        foreach ($results as $result) {
            $temp = new AccountBackOffice();
            $temp->primaryKey = $result->id_account;
            $temp->mail = $result->mail;
            $temp->password = $result->password;
            $temp->firstname = $result->firstname;
            $temp->name = $result->name;
            $temp->telephone_number = $result->telephone_number;
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
            $res->primaryKey = $result->id_account;
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
