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
    	$sql = 'SELECT * FROM comments';
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
        $sql = 'SELECT * FROM comments WHERE burger_id= :burger_id';
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

    public function addComment($burger_id,$user_id,$comment)
    {
        $sql = "INSERT INTO comments (user_id,burger_id,comment) VALUES(:user_id,:burger_id,:comment)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":user_id",$user_id);
        $stmt->bindValue(":burger_id",$burger_id);
        $stmt->bindValue(":comment",$comment);
        if($stmt->execute()){
            return $this;
        }
        return false;
    }
}