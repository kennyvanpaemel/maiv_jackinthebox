<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kennyvanpaemel
 * Date: 7/12/11
 * Time: 13:54
 * To change this template use File | Settings | File Templates.
 */
class Config
{
    function __construct()
    {
        $this->production = false;

        $this->smarty_templates_dir = "smarty_templates";
        $this->smarty_compile_dir= "smarty_compile";

		$this->db = array(
            "user"=>"jack_usr",
            "pw"=>"test123$",
            "host"=>"localhost",
            "name"=>"jackinthebox",
            "port"=>"3306"
        );

    }
}
