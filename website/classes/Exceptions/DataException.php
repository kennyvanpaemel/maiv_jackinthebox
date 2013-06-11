<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kennyvanpaemel
 * Date: 26/10/11
 * Time: 11:35
 * To change this template use File | Settings | File Templates.
 */
 
class DataException extends Exception{

  
       function getCustomMessage()
       {
           global $config;

           if($config->production)
           {
               return "Ooops... there was an error retrieving your data!";
           }else{
               return "[ " . $this->getCode() . '] ' . $this->getMessage() . " in file " . $this->getFile() . ' on line '. $this->getLine();
           }
       }
}
