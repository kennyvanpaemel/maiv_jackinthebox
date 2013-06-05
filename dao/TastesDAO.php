<?php

require_once '../classes' . DIRECTORY_SEPARATOR . 'DatabasePDO.php';


class TastesDAO
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = DatabasePDO::getInstance();
    }

    public function getAllTastes()
    {
    	$sql = 'SELECT * FROM tastes';
        $stmt = $this->pdo->prepare($sql);
        if($stmt->execute())
        {
            $tastes = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(!empty($tastes))
            { 
            	return $tastes;
            }
        }

        return array();

    }

    
}