<?php
namespace andino\gastos\models;

use andino\gastos\lib\Database;

class Gasto extends Database{

    private string $uuid;

    public function __construct(private string $title, private string $content){
        parent::__construct();
        $this->uuid = uniqid();
    }

    public function save(){
        $query =$this->connect()->prepare("INSERT INTO gastos ");
    }

    
}