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

    public function updateBurger($burger_id,$post)
    {
        $sql = 'UPDATE jitb_burgers SET name= :name, taste= :taste, rating= :rating, weight= :weight WHERE burger_id= :burger_id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":name",$post['name']);
        $stmt->bindValue(":taste",$post['taste']);
        $stmt->bindValue(":rating",$post['rating']);
        $stmt->bindValue(":weight",$post['weight']);
        $stmt->bindValue(":burger_id",$post['burger_id']);
        if($stmt->execute())
        {
            return $this;
        }
    }

    public function updateBurgerRating($burger_id)
    {
        $sql = 'UPDATE jitb_burgers SET rating= rating+1 WHERE burger_id= :burger_id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":burger_id",$burger_id);
        if($stmt->execute())
        {
            return $this;
        }
    }

    public function getLastInsertedBurger($burger_id){
        $sql = "SELECT * 
                FROM jitb_burgers
                WHERE burger_id = :burger_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':burger_id', $burger_id);
        if($stmt->execute()){
            $burger_id = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!empty($burger_id)){
                return $burger_id;
            }
        }
        return array();
    }

    public function addBurger($post)
    {
        $sql = "INSERT INTO jitb_burgers (name,taste,rating,weight) VALUES(:name,:taste,:rating,:weight)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":name",$post['name']);
        $stmt->bindValue(":taste",$post['taste']);
        $stmt->bindValue(":rating",$post['rating']);
        $stmt->bindValue(":weight",$post['weight']);
        if($stmt->execute()){
            return $this;
        }
        return false;
    }
}