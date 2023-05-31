<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Info_Terrain{
    public $name;
    public $category;
    public $location;
    public $type;
    public $picture;
    public $beginTime;
    public $endTime;
    public $price;

    //Getter & Setter
    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }
    
    public function getCategory(){
        return $this->category;
    }

    public function setCategory($category){
        $this->category = $category;
    }

    public function getLocation(){
        return $this->location;
    }

    public function setLocation($location){
        $this->location = $location;
    }

    public function getType(){
        return $this->type;
    }

    public function setType($type){
        $this->type = $type;
    }

    public function getPicture(){
        return $this->picture;
    }

    public function setPicture($picture){
        $this->picture = $picture;
    }

    public function getBeginTime(){
        return $this->beginTime;
    }

    public function setBeginTime($beginTime){
        $this->beginTime = $beginTime;
    }

    public function getEndTime(){
        return $this->endTime;
    }

    public function setEndTime($endTime){
        $this->endTime = $endTime;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function getAllAccountBackOffice(){
        $accounts = DB::select('SELECT * FROM Info_Terrain where ');
    }

    public function getActualTime(){
        $current_time = Carbon::now();
        $formatted_time = $current_time->format('Y-m-d H:i:s');
        return $formatted_time;
    }

}