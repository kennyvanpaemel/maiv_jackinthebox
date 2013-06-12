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

    public function getBurgerIdByUsername($username){

    }

    public function getUserByEmail($email){
        $sql = "SELECT *
                FROM jitb_users
                WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":email",$email);
        if($stmt->execute())
        {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!empty($user)){
                return $user;
            }
        }
        return array();
    }

    public function getUserByUsername($username){
        $sql = "SELECT *
                FROM jitb_users
                WHERE username = :username";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":username",$username);
        if($stmt->execute())
        {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!empty($user)){
                return $user;
            }
        }
        return array();
    }

    public function getUsersForBurger($burger_id)
    {
        $sql = "SELECT * 
                FROM jitb_users
                WHERE burger_id=:burger_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':burger_id', $burger_id);
        if($stmt->execute()){
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($users)){
                return $users;
            }
        }
        return array();
    }

    public function updateUser($post){
        $sql = "UPDATE jitb_users SET username = :username,
                                      name = :name,
                                      lastname = :lastname,
                                      email = :email,
                                      password = :password
                                      WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":username",$post['username']);
        $stmt->bindValue(":name",$post['name']);
        $stmt->bindValue(":lastname",$post['lastname']);
        $stmt->bindValue(":email",$post['email']);
        $stmt->bindValue(":password",$post['password']);
        $stmt->bindValue(":id",$post['id']);

        if($stmt->execute()){
            return true;
        } else {
            throw new Exception("Your email address couldn't be changed.");
        }
    }

     public function getIngredientsForUser($user_id)
    {
        $sql = 'SELECT * FROM jitb_users WHERE id= :user_id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":user_id",$user_id);
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

    public function getLastInsertedUser($user_id){
        $sql = "SELECT * 
                FROM jitb_users
                WHERE id = :user_id";
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
        $sql = "INSERT INTO jitb_users (username,name,lastname,email,password) VALUES(:username,:name,:lastname,:email,:password)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":username",$post['username']);
        $stmt->bindValue(":name",$post['name']);
        $stmt->bindValue(":lastname",$post['lastname']);
        $stmt->bindValue(":email",$post['email']);
        $stmt->bindValue(":password",$post['password']);
        if($stmt->execute()){
            return $post;
        }
        return false;
    }
}