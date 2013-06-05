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

    public function updateDestination($id,$data)
    {
        $sql = 'UPDATE destinations SET trip_naam= :tripnaam, city= :city, country= :country, slaapplaats= :slaapplaats, vervoer= :vervoer, dest_id= :destid WHERE id= :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':tripnaam',$data['trip_naam']);
        $stmt->bindValue(':city',$data['city']);
        $stmt->bindValue(':country',$data['country']);
        $stmt->bindValue(':slaapplaats',$data['slaapplaats']);
        $stmt->bindValue(':vervoer',$data['vervoer']);
        $stmt->bindValue(':destid',$data['dest_id']);
        $stmt->bindValue(':id',$id);
        if($stmt->execute())
        {
            return $data;
        }
    }

    public function getLastInsertedTrip($id){
        $sql = "SELECT * 
                FROM `trips`
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        if($stmt->execute()){
            $todo = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!empty($trip)){
                return $trip;
            }
        }
        return array();
    }

    public function addBurger($post)
    {
        $sql = "INSERT INTO destinations (name,taste,rating,weight) VALUES(:name,:taste,:rating,:weight)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":name",$name);
        $stmt->bindValue(":taste",$taste);
        $stmt->bindValue(":rating",$rating);
        $stmt->bindValue(":weight",$weight);
        if($stmt->execute()){
            return $this;
        }
        return false;
    }
}