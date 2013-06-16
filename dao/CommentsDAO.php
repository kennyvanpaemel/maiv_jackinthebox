<?php

require_once '../classes' . DIRECTORY_SEPARATOR . 'DatabasePDO.php';


class CommentsDAO
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = DatabasePDO::getInstance();
    }

    public function getAllComments()
    {
    	$sql = 'SELECT * FROM jitb_comments';
        $stmt = $this->pdo->prepare($sql);
        if($stmt->execute())
        {
            $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(!empty($comments))
            { 
            	return $comments;
            }
        }

        return array();
    }

    public function getCommentsForBurger($burger_id)
    {
        $sql = 'SELECT * FROM jitb_comments WHERE burger_id= :burger_id ORDER BY id ASC';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":burger_id",$burger_id);
        if($stmt->execute())
        {
            $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(!empty($comments))
            { 
                return $comments;
            }
        }

        return array();
    }

    public function addComment($post)
    {
        $sql = "INSERT INTO jitb_comments (username,comment,burger_id) VALUES(:username,:comment,:burger_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":username",$post['username']);
        $stmt->bindValue(":comment",$post['comment']);
        $stmt->bindValue(":burger_id",$post['burger_id']);
        if($stmt->execute()){
            return $this;
        }
        return false;
    }
}