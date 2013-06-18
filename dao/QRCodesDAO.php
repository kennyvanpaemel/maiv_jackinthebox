<?php

require_once '../classes' . DIRECTORY_SEPARATOR . 'DatabasePDO.php';


class QRCodesDAO
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = DatabasePDO::getInstance();
    }

    public function getAllQRCodes()
    {
<<<<<<< HEAD
        $sql = 'SELECT * FROM jitb_qrcodes';
=======
    	$sql = 'SELECT * FROM jitb_qrcodes';
>>>>>>> 11c235fbf83334edc9f54126543ddea94797599c
        $stmt = $this->pdo->prepare($sql);
        if($stmt->execute())
        {
            $qrcodes = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(!empty($qrcodes))
            { 
<<<<<<< HEAD
                return $qrcodes;
=======
            	return $qrcodes;
>>>>>>> 11c235fbf83334edc9f54126543ddea94797599c
            }
        }

        return array();
    }

    public function addQRCode($post)
    {
        error_log("[QRCodesDAO] Add QRCode");
        ob_start();
        print_r($post);
        $trace = ob_get_clean();
        error_log($trace);
        $sql = "INSERT INTO jitb_qrcodes (qrcode) VALUES(:qrcode)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":qrcode",$post['qrcode']);
        if($stmt->execute()){
            return true;
        }
        return false;
    }
}