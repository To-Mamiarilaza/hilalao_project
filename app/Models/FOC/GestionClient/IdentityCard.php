<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class IdentityCard
{
    private $id_card;
    private $card_picture;
    private $card_number;

///Constructeur
    public function __construct($id_card, $card_picture, $card_number)
    {
        $this->id_card = $id_card;
        $this->card_picture = $card_picture;
        $this->card_number = $card_number;
    }

///Encapsulation
    public function getId_card()
    {
        return $this->id_card;
    }

    public function getCard_picture()
    {
        return $this->card_picture;
    }

    public function getCard_number()
    {
        return $this->card_number;
    }

///Fonctions de classe
    //Recuperer toutes les cartes identites
    public static function getAll()
    {
        $results = DB::select('SELECT * FROM identity_card');
        $datas = [];
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new IdentityCard($row->id_card, $row->card_picture, $row->card_number);
            $i++;
        }
        
        return $datas;
    }

    //Recuperer la carte d'identite correspondant au parametre id
    public static function getById($id)
    {
        $results = DB::table('identity_card')->where('id_card', $id)->first();
        
        return new IdentityCard($results->id_card,$results->card_picture, $results->card_number);
    }

    //Sauvegarder un client dans la base
    public function create()
    {
        DB::table('identity_card')->insert([
            'id_card' => $this->id_card,
            'card_picture' => $this->card_picture,
            'card_number' => $this->card_number,
        ]);
    }

    //Mettre a jour un client
    public function update()
    {
        DB::table('identity_card')
        ->where('id_card', $this->id_card)
        ->update([
            'id_card' => $this->id_card, 
            'card_picture' => $this->card_picture, 
            'card_number' => $this->card_number
        ]);
    }

    //Supprimer un client par son id
    public static function delete($id)
    {
        DB::table('identity_card')
        ->where('id_card', $id)
        ->delete();
    }
}