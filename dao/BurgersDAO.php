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
    	$sql = 'SELECT * FROM burgers ORDER BY rating DESC';
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

    public function getBurgerForUser($user_id)
    {
        $sql = "SELECT * 
                FROM burgers
                WHERE $user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':user_id', $user_id);
        if($stmt->execute()){
            $burger = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!empty($burger)){
                return $burger;
            }
        }
        return array();
    }

    public function updateBurger($burger_id,$post)
    {
        $sql = 'UPDATE burgers SET name= :name, taste= :taste, rating= :rating, weight= :weight WHERE burger_id= :burger_id';
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

    public function getLastInsertedBurger($burger_id){
        $sql = "SELECT * 
                FROM burgers
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
        $sql = "INSERT INTO destinations (name,taste,rating,weight) VALUES(:name,:taste,:rating,:weight)";
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