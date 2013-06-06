<?php

require_once '../classes' . DIRECTORY_SEPARATOR . 'DatabasePDO.php';


class UsersDAO
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = DatabasePDO::getInstance();
    }

    public function getAllUsers()
    {
    	$sql = 'SELECT * FROM jitb_users';
        $stmt = $this->pdo->prepare($sql);
        if($stmt->execute())
        {
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(!empty($users))
            { 
            	return $users;
            }
        }

        return array();

    }

    public function getUsersForBurger($burger_id)
    {
        $sql = "SELECT * 
                FROM jitb_users
                WHERE burger_id = :burger_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':burger_id', $burger_id);
        if($stmt->execute()){
            $users = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!empty($users)){
                return $users;
            }
        }
        return array();
    }

    public function getLastInsertedUser($user_id){
        $sql = "SELECT * 
                FROM jitb_users
                WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':user_id', $user_id);
        if($stmt->execute()){
            $user_id = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!empty($user_id)){
                return $user_id;
            }
        }
        return array();
    }

    public function addUser($post)
    {
        $sql = "INSERT INTO jitb_users (name,lastname,email) VALUES(:name,:lastname,:email)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":name",$post['name']);
        $stmt->bindValue(":lastname",$post['lastname']);
        $stmt->bindValue(":email",$post['email']);
        if($stmt->execute()){
            return $this;
        }
        return false;
    }
}