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
    	$sql = 'SELECT * FROM jitb_ingredients';
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

    public function getIngredientById($id)
    {
        $sql = 'SELECT * FROM jitb_ingredients WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id",$id);
        if($stmt->execute())
        {
            $ingredient = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(!empty($ingredient))
            { 
                return $ingredient;
            }
        }

        return array();
    }

    public function getIngredientsByTaste($taste)
    {
        $sql = 'SELECT * FROM jitb_ingredients WHERE taste= :taste OR taste = :taste2';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":taste",$taste);
        $stmt->bindValue(":taste2",'neutral');
        if($stmt->execute())
        {
            $ingredient = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(!empty($ingredient))
            {
                return $ingredient;
            }
        }

        return array();
    }

    public function getIngredientsByTasteAndVegi($taste)
    {
        $sql = 'SELECT * FROM jitb_ingredients WHERE (taste= :taste AND vegi = :vegi) OR (taste = :taste2 AND vegi = :vegi2)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":taste",$taste);
        $stmt->bindValue(":taste2",'neutral');
        $stmt->bindValue(":vegi",1);
        $stmt->bindValue(":vegi2",1);
        if($stmt->execute())
        {
            $ingredient = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(!empty($ingredient))
            {
                return $ingredient;
            }
        }

        return array();
    }

    public function addIngredient($post)
    {
        $sql = "INSERT INTO jitb_ingredients (name,taste,vegi,weight) VALUES(:name,:taste,:vegi,:weight)";
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