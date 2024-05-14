<?php
namespace andino\gastos\models;

use andino\gastos\lib\Database;
use PDO;


class Expense extends Database{

    private Category $category;
    private string $date;
    public function __construct(private string $titulo, private int $categoryId, private float $expense){
        parent::__construct();
    }

    //public  5:22:05
}