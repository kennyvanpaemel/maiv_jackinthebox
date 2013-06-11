<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kennyvanpaemel
 * Date: 7/12/11
 * Time: 13:53
 * To change this template use File | Settings | File Templates.
 */
require_once("libs/Smarty.class.php");

class CodeSmarty extends Smarty
{
    function __construct()
    {
        global $config;

        parent::__construct();

        $this->setTemplateDir($config->smarty_templates_dir);
        $this->setCompileDir($config->smarty_compile_dir);

        $this->debugging = false;
    }
}
