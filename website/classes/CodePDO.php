<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kennyvanpaemel
 * Date: 30/10/11
 * Time: 15:36
 * To change this template use File | Settings | File Templates.
 */
 
class CodePDO extends PDO {

    private static $instance = null;

    public static function getInstance()
    {
        global $config;

        if(is_null(self::$instance))
        {

        self::$instance = new PDO('mysql:host='
                                  .$config->db['host']
                                  .';port='.$config->db['port']
                                  .';dbname='.$config->db['name']
                                  , $config->db['user']
                                  , $config->db['pw']);

            // attribuut instellen om alleen exception errors te tonen

        self::$instance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        }

        return self::$instance;
    }

}

?>
