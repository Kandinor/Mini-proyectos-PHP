<?php
namespace andino\gastos\models;

use andino\gastos\lib\Database;
use PDO;

/**
 * Clase Category para manejar las operaciones de categorías en la base de datos.
 * 
 * @package andino\gastos\models
 */
class Category extends Database{
    /**el id no lo llenamos, porque cuando tengamos info en la bbdd se llene y saber el gasto que es con identificador unico
     * @var int
    */
    private int $id;

    /**
     * Constructor de la clase Category.
     *
     * @param string $name Nombre de la categoría.
     */
    public function __construct(private string $name){

        parent :: __construct();

    }

    /**funciones que guarda los nombres en la tabla categories 
     * @return void
    */
    public function save(){
        $query = $this -> connect()->prepare("INSERT INTO categories (name) VALUES(:name)");
        $query -> execute(['name' => $this -> name]);
    }

    /**
     * Recupera todas las categorías de la base de datos.
     * Retorna un array de objetos Category.
     *
     * @return Category[] Array de objetos Category.
     */
    public static function getAll(){
        $db = new Database();
        $query = $db -> connect()->query("SELECT * FROM categories");

        while ($r = $query -> fetch (PDO::FETCH_ASSOC)) {
            $category = Category :: createFromArray($r);
            array_push($categories, $category);
        }

        return $categories;
    }


    /**
     * Recupera una categoría específica por su ID.
     * Retorna un objeto Category si la categoría es encontrada.
     *
     * @param int $id El ID de la categoría a recuperar.
     * @return Category|null El objeto Category si se encuentra, null si no.
     */
    public static function get($id){
        $db = new Database();
        $query = $db->connect()->prepare("SELECT * FROM categories WHERE id = :id");
        $query->execute(['id' => $id]);


        $category = Category::createFromArray($query->fetch(PDO::FETCH_ASSOC));

        return $category;
    }

    /**
     * Verifica si una categoría con un nombre específico ya existe en la base de datos.
     *
     * @param string $name El nombre de la categoría a verificar.
     * @return bool True si la categoría existe, false de lo contrario.
     */
    public static function exists($name){
        $db = new Database();
        $query = $db->connect()->prepare("SELECT * FROM categories WHERE name = :name");
        $query-> execute(['name' => $name]);

        return $query->rowCount() > 0;
    }

    /**
     * Crea un objeto Category a partir de un array asociativo.
     * Útil para transformar los resultados de la base de datos en objetos Category.
     *
     * @param array $arr Array asociativo que contiene los datos de la categoría.
     * @return Category El objeto Category creado.
     */
    public static function createFromArray($arr){
        $category = new Category($arr['name']);
        $category->setId($arr['id']);

        return $category;
    }

    /**
     * Establece el ID de la categoría.
     *
     * @param int $value El nuevo valor del ID.
     * @return void
     */
    public function setId($value){
        $this->id =$value;
    }

    /**
     * Obtiene el nombre de la categoría.
     *
     * @return string El nombre de la categoría.
     */
    public function getName(){
        return $this->name;
    }

    /**
     * Obtiene el ID de la categoría.
     *
     * @return int El ID de la categoría.
     */
    public function getId(){
        return $this->id;
    }

}