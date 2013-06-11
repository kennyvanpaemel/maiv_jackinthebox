<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kennyvanpaemel
 * Date: 26/10/11
 * Time: 09:37
 * To change this template use File | Settings | File Templates.
 */
 
class PHPErrorHandler {

    public static function handle($errorType,$errorString,$errorFile,$errorLine)
    {
        global $config;

        if($config->production)
        {
            error_log(date("Y-m-d h:i:s"). ': [' .$errorType. ']'.$errorString.' in file '.$errorFile.' on line ' .$errorLine."\r\n",3,$config->errorlog);
        }else
        {
           echo '[' .$errorType. ']'.$errorString.' in file '.$errorFile.' on line ' .$errorLine;
        }
    }

}
