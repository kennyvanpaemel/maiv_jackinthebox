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

$app->post('/burgers','addBurger');
$app->post('/users','addUser');
$app->post('/comments/:burger_id/:user_id','addComment');

$app->put('/burgers/:burger_id','updateBurger');
$app->put('/burgers/:burger_id/:rating','updateBurgerRating');

$app->run();

function getAllBurgers()
{
	$burgersDAO = new BurgersDAO();
}

function getAllUsers()
{
	$usersDAO = new UsersDAO();
}

function getAllIngredients()
{
	$ingredientsDAO = new IngredientsDAO();
}

function getAllComments()
{
	$commentsDAO = new CommentsDAO();
}

function getAllTastes()
{
	$tastesDAO = new TastesDAO();
}

function getBurgerForUser($user_id)
{
	$burgersDAO = new BurgersDAO();
}

function getUsersForBurger($burger_id)
{
	$usersDAO = new UsersDAO();
}

function getBurgersByTaste($taste_id)
{
	$burgersDAO = new BurgersDAO();
}

function getVegiBurgers($vegi)
{
	$burgersDAO = new BurgersDAO();
}

function addBurger()
{
	$burgersDAO = new BurgersDAO();
}

function addUser()
{
	$usersDAO = new UsersDAO();
}

function addComment($burger_id,$user_id)
{
	$commentsDAO = new CommentsDAO();
}

function updateBurger($burger_id)
{
	$burgersDAO = new BurgersDAO();
}

function updateBurgerRating($burger_id,$rating)
{
	$burgersDAO = new BurgersDAO();
}
