<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kennyvanpaemel
 * Date: 26/10/11
 * Time: 10:22
 * To change this template use File | Settings | File Templates.
 */
 
class CustomPDOException extends PDOException{

       function __construct($e)
       {
           parent::__construct($e);
       }

       function getCustomMessage()
       {
           global $config;

           if($config->production)
           {
               return "Ooops... there was an error while saving you data please try again later!";
           }else{
               return "[ " . $this->getCode() . '] ' . $this->getMessage() . " in file " . $this->getFile() . ' on line '. $this->getLine();
           }
       }

}
