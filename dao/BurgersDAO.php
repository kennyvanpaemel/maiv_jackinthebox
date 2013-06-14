<?php

require_once '../classes' . DIRECTORY_SEPARATOR . 'DatabasePDO.php';


class BurgersDAO
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = DatabasePDO::getInstance();
    }

    public function getAllBurgers()
    {
    	$sql = 'SELECT * FROM jitb_burgers ORDER BY rating DESC';
        $stmt = $this->pdo->prepare($sql);
        if($stmt->execute())
        {
            $burgers = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(!empty($burgers))
            { 
            	return $burgers;
            }
        }

        return array();

    }

    public function getBurgerForUser($usergroup_id)
    {
        $sql = "SELECT * 
                FROM jitb_burgers
                WHERE usergroup_id = :usergroup_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':usergroup_id', $usergroup_id);
        if($stmt->execute()){
            $burger = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($burger)){
                return $burger;
            }
        }
        return array();
    }

    public function getBurgersByTaste($taste)
    {
        $sql = "SELECT * 
                FROM jitb_burgers
                WHERE taste = :taste";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':taste', $taste);
        if($stmt->execute()){
            $burgers = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($burgers)){
                return $burgers;
            }
        }
        return array();
    }

    public function getVegiBurgers()
    {
        $sql = "SELECT * 
                FROM jitb_burgers
                WHERE vegi = 1";
        $stmt = $this->pdo->prepare($sql);
        if($stmt->execute()){
            $burger = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($burger)){
                return $burger;
            }
        }
        return array();
    }

    public function getVegiBurgersByTaste($taste)
    {
        $sql = "SELECT * 
                FROM jitb_burgers
                WHERE vegi = 1 AND taste= :taste";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':taste', $taste);
        if($stmt->execute()){
            $burger = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($burger)){
                return $burger;
            }
        }
        return array();
    }

    public function updateBurger($post)
    {
        $sql = 'UPDATE jitb_burgers SET name= :name, taste= :taste, rating= :rating, weight= :weight WHERE id= :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":name",$post['name']);
        $stmt->bindValue(":taste",$post['taste']);
        $stmt->bindValue(":rating",$post['rating']);
        $stmt->bindValue(":weight",$post['weight']);
        $stmt->bindValue(":id",$post['id']);
        if($stmt->execute())
        {
            return $this;
        }
        return array();
    }

    public function updateBurgerRating($id,$rating)
    {
        $sql = 'UPDATE jitb_burgers SET rating= :rating WHERE id= :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":rating",$rating);
        $stmt->bindValue(":id",$id);

        if($stmt->execute())
        {
            return $this;
        }
        return array();
    }

    public function getLastInsertedBurger($id){
        $sql = "SELECT * 
                FROM jitb_burgers
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        if($stmt->execute()){
            $id = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!empty($id)){
                return $id;
            }
        }
        return array();
    }

    public function addBurger($post)
    {
        error_log("[BurgersDAO] Add Burger");
        ob_start();
        print_r($post);
        $trace = ob_get_clean();
        error_log($trace);
        $sql = "INSERT INTO jitb_burgers (taste,vegi,added_ingredients_ids) VALUES(:taste,:vegi,:added_ingredients_ids)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":taste",$post['taste']);
        $stmt->bindValue(":vegi",$post['vegi']);
        $stmt->bindValue(":added_ingredients_ids",$post['added_ingredients_ids']);
        if($stmt->execute()){
            return $this->pdo->lastInsertId();
        }
        return false;
    }
}