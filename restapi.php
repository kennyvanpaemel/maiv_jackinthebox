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

$app->get('/burgers','getAllBurgers');//
$app->get('/users','getAllUsers');//
$app->get('/ingredients','getAllIngredients');//
$app->get('/comments','getAllComments');//
$app->get('/tastes','getAllTastes');//

$app->get('/burgers/:user_id','getBurgerForUser');//
$app->get('/users/:usergroup_id','getUsersForBurger');//
$app->get('/burgers/:taste_id','getBurgersByTaste');
$app->get('/burgers/vegi','getVegiBurgers');//
$app->get('/burgers/vegi/:taste','getVegiBurgersByTaste');//
$app->get('/ingredients/:ingredient_id','getIngredientById');//

$app->post('/burgers','addBurger');//
$app->post('/users','addUser');//
$app->post('/comments/:burger_id/:user_id','addComment');//

$app->put('/burgers/:burger_id','updateBurger');//
$app->put('/burgers/:burger_id/:rating','updateBurgerRating');//

$app->run();

function getAllBurgers()
{
	$burgersDAO = new BurgersDAO();
	echo json_encode($burgersDAO->getAllBurgers());
	exit();
}

function getAllUsers()
{
	$usersDAO = new UsersDAO();
	echo json_encode($usersDAO->getAllUsers());
	exit();
}

function getAllIngredients()
{
	$ingredientsDAO = new IngredientsDAO();
	echo json_encode($ingredientsDAO->getAllIngredients());
}

function getIngredientById($ingredient_id)
{
	$ingredientsDAO = new IngredientsDAO();
	echo json_encode($ingredientsDAO->getIngredientById($ingredient_id));
	exit();
}

function getAllComments()
{
	$commentsDAO = new CommentsDAO();
	echo json_encode($commentsDAO->getAllComments());
	exit();
}

function getAllTastes()
{
	$tastesDAO = new TastesDAO();
	echo json_encode($tastesDAO->getAllTastes());
	exit();
}

function getBurgerForUser($user_id)
{
	$burgersDAO = new BurgersDAO();
	echo json_encode($burgersDAO->getBurgerForUser($user_id));
	exit();
}

function getUsersForBurger($usergroup_id)
{
	$usersDAO = new UsersDAO();
	echo json_encode($usersDAO->getUsersForBurger($usergroup_id));
	exit();
}

function getBurgersByTaste($taste_id)
{
	$burgersDAO = new BurgersDAO();
	echo json_encode($burgersDAO->getBurgersByTaste($taste_id));
	exit();
}

function getVegiBurgers()
{
	$burgersDAO = new BurgersDAO();
	echo json_encode($burgersDAO->getVegiBurgers());
	exit();
}

function getVegiBurgersByTaste($taste)
{
	$burgersDAO = new BurgersDAO();
	echo json_encode($burgersDAO->getVegiBurgersByTaste($taste));
	exit();
}

function addBurger()
{
	$post = (array) json_decode(Slim::getInstance()->request()->getBody());
	$burgersDAO = new BurgersDAO();
	echo json_encode($burgersDAO->addBurger($post));
	exit();
}

function addUser()
{
	$post = (array) json_decode(Slim::getInstance()->request()->getBody());
	$usersDAO = new UsersDAO();
	echo json_encode($usersDAO->addUser($post));
	exit();
}

function addComment($burger_id,$user_id)
{
	$post = (array) json_decode(Slim::getInstance()->request()->getBody());
	$commentsDAO = new CommentsDAO();
	echo json_encode($commentsDAO->addComment($burger_id,$user_id,$post));
	exit();
}

function updateBurger($burger_id)
{
	$post = (array) json_decode(Slim::getInstance()->request()->getBody());
	$burgersDAO = new BurgersDAO();
	echo json_encode($burgersDAO->updateBurger($burger_id,$post));
	exit();
}

function updateBurgerRating($burger_id,$rating)
{
	$burgersDAO = new BurgersDAO();
	echo json_encode($burgersDAO->updateRating($burger_id,$rating));
	exit();
}
