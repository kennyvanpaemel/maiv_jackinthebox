<?php

header("Content-Type: application/json");

define("WWW_ROOT",dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR);

require_once WWW_ROOT. "api" .DIRECTORY_SEPARATOR. 'Slim'. DIRECTORY_SEPARATOR .'Slim.php';
require_once WWW_ROOT. "dao" .DIRECTORY_SEPARATOR. 'BurgersDAO.php';
require_once WWW_ROOT. "dao" .DIRECTORY_SEPARATOR. 'UsersDAO.php';
require_once WWW_ROOT. "dao" .DIRECTORY_SEPARATOR. 'IngredientsDAO.php';
require_once WWW_ROOT. "dao" .DIRECTORY_SEPARATOR. 'CommentsDAO.php';
require_once WWW_ROOT. "dao" .DIRECTORY_SEPARATOR. 'TastesDAO.php';


$app = new Slim();

$app->get('/burgers','getAllBurgers');
$app->get('/users','getAllUsers');
$app->get('/ingredients','getAllIngredients');
$app->get('/comments','getAllComments');
$app->get('/tastes','getAllTastes');

$app->get('/burgers/:user_id','getBurgerForUser');
$app->get('/users/:burger_id','getUsersForBurger');
$app->get('/burgers/:taste_id','getBurgersByTaste');
$app->get('/burgers/:vegi','getVegiBurgers');

$app->run();

?>
