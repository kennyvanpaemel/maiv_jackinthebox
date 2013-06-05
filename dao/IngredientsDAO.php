<?php

require_once '../classes' . DIRECTORY_SEPARATOR . 'DatabasePDO.php';


class IngredientsDAO
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = DatabasePDO::getInstance();
    }

    public function getAllIngredients()
    {
    	$sql = 'SELECT * FROM ingredients';
        $stmt = $this->pdo->prepare($sql);
        if($stmt->execute())
        {
            $ingredients = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(!empty($ingredients))
            { 
            	return $ingredients;
            }
        }

        return array();

    }

    public function addIngredient($post)
    {
        $sql = "INSERT INTO ingredients (name,taste,vegi,weight) VALUES(:name,:taste,:vegi,:weight)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":name",$post['name']);
        $stmt->bindValue(":taste",$post['taste']);
        $stmt->bindValue(":vegi",$post['vegi']);
        $stmt->bindValue(":weight",$post['weight']);
        if($stmt->execute()){
            return $this;
        }
        return false;
    }
}