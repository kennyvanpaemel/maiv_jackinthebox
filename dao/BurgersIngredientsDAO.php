<?php

require_once '../classes' . DIRECTORY_SEPARATOR . 'DatabasePDO.php';


class BurgersIngredientsDAO
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = DatabasePDO::getInstance();
    }

    public function addBurgerIngredient($post)
    {
        error_log("[BurgersIngredientsDAO] Add BurgerIngredient");
        $sql = "INSERT INTO jitb_burgersingredients (burger_id, ingredient_id) VALUES(:burger_id, :ingredient_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":burger_id",$post['burger_id']);
        $stmt->bindValue(":ingredient_id",$post['ingredient_id']);
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    public function getBurgerIngredientsByBurgerId($burger_id){
        error_log("[BurgersIngredientsDAO] Get BurgerIngredient By BurgerId");
        $sql = "SELECT jitb_burgers.name, jitb_burgers.taste, jitb_burgers.vegi, jitb_burgers.added_ingredients_ids, jitb_burgersingredients.burger_id,  jitb_burgersingredients.ingredient_id, jitb_ingredients.name, jitb_ingredients.url
                FROM jitb_burgers
                INNER JOIN jitb_burgersingredients ON jitb_burgers.id = jitb_burgersingredients.burger_id
                INNER JOIN jitb_ingredients ON jitb_ingredients.id = jitb_burgersingredients.ingredient_id
                WHERE jitb_burgersingredients.burger_id = :burger_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':burger_id', $burger_id);
        $errors = $stmt->errorInfo();
        error_log($errors[2]);
        if($stmt->execute()){
            $burgers = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($burgers)){
                return $burgers;
            }
        }
        return array();
    }
}