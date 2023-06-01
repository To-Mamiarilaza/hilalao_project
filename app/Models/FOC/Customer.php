<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Customer
{
    private $id_customer;
    private $name;
    private $customer_id_card;
    private $profile_picture;
    private $adress;
    private $phone_numbers;
    private $email;

    public function __construct($id_customer, $name, /*$customer_id_card ,*/ $profile_picture, $adress, $phone_numbers, $email)
    {
        $this->id_customer = $id_customer;
        $this->name = $name;
        $this->customer_id_card = $customer_id_card;
        $this->profile_picture = $profile_picture;
        $this->adress = $adress;
        $this->phone_numbers = $phone_numbers;
        $this->email = $email;
    }

///Encapsulation
    public function getId_customer()
    {
        return $this->id_customer;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCustomer_id_card()
    {
        return $this->customer_id_card;
    }

    public function getProfile_picture()
    {
        return $this->profile_picture;
    }

    public function getAdress()
    {
        return $this->adress;
    }

    public function getPhone_numbers()
    {
        return $this->phone_numbers;
    }

    public function getEmail()
    {
        return $this->email;
    }

    //Recuperer toutes les clients
    public function getAll()
    {
        $results = DB::select('SELECT * FROM customer');
        $datas = [];
        $i = 0;
        foreach ($results as $row) {
            $datas[$i] = new Customer($row->id_customer, $row->name, $row->getCustomer_id_card, $row->profile_picture, $row->adress, $row->phone_numbers, $row->email);
            $i++;
        }
        
        return $datas;
    }

    //Recuperer le client correspondant le id au parametre id
    public function getById($id)
    {
        $results = DB::table('customer')->where('id_customer', $id)->first();
        
        return new Customer($results->id_customer,$results->name, $results->customer_id_card, $results->profile_picture, $results->adress, $results->phone_numbers, $results->email);
    }

    public function create()
    {
        DB::table('customer')->insert([
            'id_customer' => $this->id_customer,
            'name' => $this->name,
            /*'customer_id_card' => $this->customer_id_card,*/
            'profile_picture' => $this->profile_picture,
            'adress' => $this->adress,
            'phone_numbers' => $this->phone_numbers,
            'email' => $this->email
        ]);
    }

    public function update($id, $data)
    {
    /*    DB::table('customer')
    ->where('colonne', 'condition')
    ->update([
        'colonne1' => 'nouvelle_valeur1',
        'colonne2' => 'nouvelle_valeur2',
        // Ajoutez les autres colonnes et valeurs ici
    ]);*/
    }

    public function delete($id)
    {
        // Écrivez le code pour supprimer un enregistrement
    }
}