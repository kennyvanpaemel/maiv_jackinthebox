<?php
/*
header("Content-Type: application/json");

define("WWW_ROOT",dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR);

require_once WWW_ROOT. "api" .DIRECTORY_SEPARATOR. 'Slim'. DIRECTORY_SEPARATOR .'Slim.php';
require_once WWW_ROOT. "dao" .DIRECTORY_SEPARATOR. 'BurgersDAO.php';
require_once WWW_ROOT. "dao" .DIRECTORY_SEPARATOR. 'UsersDAO.php';
require_once WWW_ROOT. "dao" .DIRECTORY_SEPARATOR. 'IngredientsDAO.php';
require_once WWW_ROOT. "dao" .DIRECTORY_SEPARATOR. 'CommentsDAO.php';


$app = new Slim();

$app->get('/burgers','getAllBurgers');//--
$app->get('/users','getAllUsers');//--
$app->get('/users/:username','getUserByUsername');
$app->get('/users/mail/:email','sendUserDataToUser');
$app->get('/ingredients','getAllIngredients');//--
$app->get('/comments','getAllComments');//--
$app->get('/tastes','getAllTastes');//--

$app->get('/burgers/user/:usergroup_id','getBurgerForUser');//--
$app->get('/users/burger/:burger_id','getUsersForBurger');//--
$app->get('/users/username/:username','getFinalSaveByUsername');
$app->get('/burgers/taste/:taste','getBurgersByTaste');//--
$app->get('/burgers/vegi','getVegiBurgers');//--
$app->get('/burgers/vegi/:taste','getVegiBurgersByTaste');//
$app->get('/ingredients/id/:ingredient_id','getIngredientById');//--
$app->get('/ingredients/:user_id','getIngredientForUser');
$app->get('/ingredients/taste/:taste','getIngredientsByTaste');
$app->get('/ingredients/taste/vegi/:taste','getIngredientsByTasteAndVegi');
$app->get('/comments/:burger_id','getCommentsForBurger');//--

$app->post('/burgers','addBurger');//
$app->post('/users','addUser');//
$app->post('/users/update','updateUser');//
$app->post('/comments/add','addComment');//

$app->put('/burgers/:burger_id','updateBurger');//
$app->post('/burgers/rating/:burger_id/:rating','updateBurgerRating');//

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

function getUserByUsername($username){
    $usersDAO = new UsersDAO();
    echo json_encode($usersDAO->getUserByUsername($username));
    exit();
}

function sendUserDataToUser($email){
    $usersDAO = new UsersDAO();
    $user = $usersDAO->getUserByEmail($email);
    if($user != null){
        $mail  = '<html><head></head><body>';

        $mail .= 'Dear burgerlover,<br/><br/>';
        $mail .= 'You recently asked us to sent you your personal logindata.<br/>';
        $mail .= "Because of privacy reasons we aren't allowed to sent you your password.<br/>";
        $mail .= 'Username: '+$user['username'];
        $mail .= '<br/><br/>';
        $mail .= "In case you really can't recall your password you can contact our customer service.<br/>";
        $mail .= "Send us a mail and we'll reset your password.<br/>";
        $mail .= '<a href="mailto:support@jitbflavoursavour.com?Subject=JITB%20support">Jack In The Box Customer Support</a><br/>';
        $mail .= '<br/><br/><br/>Greetings,&nbsp; <br/>Jack In The Box Technical Service<br/><br/>';

        $mail  .= '</body></html>';

        $header = 'From: Jack In The Box <no-reply@jackinthebox.com>' . "\r\n" .'X-Mailer: PHP/' . phpversion();
        $header .= 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        mail($user['email'], 'Jack In The Box: Logingegevens', $mail, $header);
        echo $user['email'];
    }else{
        echo '';
    }
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

function getBurgerForUser($usergroup_id)
{
	$burgersDAO = new BurgersDAO();
	echo json_encode($burgersDAO->getBurgerForUser($usergroup_id));
	exit();
}

function getFinalSaveByUsername($username){
    $usersDAO = new UsersDAO();
    echo json_encode($usersDAO->getFinalSaveByUsername($username));
    exit();
}

function getUsersForBurger($burger_id)
{
	$usersDAO = new UsersDAO();
	echo json_encode($usersDAO->getUsersForBurger($burger_id));
	exit();
}

function getBurgersByTaste($taste)
{
	$burgersDAO = new BurgersDAO();
	echo json_encode($burgersDAO->getBurgersByTaste($taste));
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

function getCommentsForBurger($burger_id)
{
	$commentsDAO = new CommentsDAO();
	echo json_encode($commentsDAO->getCommentsForBurger($burger_id));
	exit();
}

function getIngredientForUser($user_id)
{
	$usersDAO = new UsersDAO();
	echo json_encode($usersDAO->getIngredientsForUser($user_id));
	exit();
}

function getIngredientsByTaste($taste)
{
    $ingredientsDAO = new IngredientsDAO();
    echo json_encode($ingredientsDAO->getIngredientsByTaste($taste));
    exit();
}

function getIngredientsByTasteAndVegi($taste){
    $ingredientsDAO = new IngredientsDAO();
        echo json_encode($ingredientsDAO->getIngredientsByTasteAndVegi($taste));
        exit();
}

function addBurger()
{
    error_log("add burger");
    $post = Slim::getInstance()->request()->post();
    $burgersDAO = new BurgersDAO();
    echo json_encode($burgersDAO->addBurger($post));
    exit();
}

function addUser()
{
    error_log("add user");
    $post = Slim::getInstance()->request()->post();
	$usersDAO = new UsersDAO();
	echo json_encode($usersDAO->addUser($post));
	exit();
}

function updateUser(){
    error_log("update user");
    $post = Slim::getInstance()->request()->post();
    $usersDAO = new UsersDAO();
    echo json_encode($usersDAO->updateUser($post));
    exit();
}

function addComment()
{
	$post = Slim::getInstance()->request()->post();
	$commentsDAO = new CommentsDAO();
	echo json_encode($commentsDAO->addComment($post));
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
	echo json_encode($burgersDAO->updateBurgerRating($burger_id,$rating));
	exit();
}
*/
header("Content-Type: application/json");

define("WWW_ROOT",dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR);

require_once WWW_ROOT. "api" .DIRECTORY_SEPARATOR. 'Slim'. DIRECTORY_SEPARATOR .'Slim.php';
require_once WWW_ROOT. "dao" .DIRECTORY_SEPARATOR. 'BurgersDAO.php';
require_once WWW_ROOT. "dao" .DIRECTORY_SEPARATOR. 'UsersDAO.php';
require_once WWW_ROOT. "dao" .DIRECTORY_SEPARATOR. 'IngredientsDAO.php';
require_once WWW_ROOT. "dao" .DIRECTORY_SEPARATOR. 'CommentsDAO.php';
require_once WWW_ROOT. "dao" .DIRECTORY_SEPARATOR. 'BurgersIngredientsDAO.php';
require_once WWW_ROOT. "dao" .DIRECTORY_SEPARATOR. 'QRCodesDAO.php';


$app = new Slim();

$app->get('/burgers','getAllBurgers');//--
$app->get('/users','getAllUsers');//--
$app->get('/qrcodes','getAllQRCodes');
$app->get('/users/:username','getUserByUsername');
$app->get('/users/mail/:email','sendUserDataToUser');
$app->get('/ingredients','getAllIngredients');//--
$app->get('/comments','getAllComments');//--
$app->get('/tastes','getAllTastes');//--
$app->get('/burgeringredient/:burger_id','getBurgerIngredientsByBurgerId');

$app->get('/burgers/user/:usergroup_id','getBurgerForUser');//--
$app->get('/burger/:burger_id','getBurgerByBurgerId');//--
$app->get('/users/burger/:burger_id','getUsersForBurger');//--
$app->get('/users/username/:username','getFinalSaveByUsername');
$app->get('/burgers/taste/:taste','getBurgersByTaste');//--
$app->get('/burgers/vegi','getVegiBurgers');//--
$app->get('/burgers/vegi/:taste','getVegiBurgersByTaste');//
$app->get('/ingredients/id/:ingredient_id','getIngredientById');//--
$app->get('/ingredients/:user_id','getIngredientForUser');
$app->get('/ingredients/taste/:taste','getIngredientsByTaste');
$app->get('/ingredients/taste/vegi/:taste','getIngredientsByTasteAndVegi');
$app->get('/comments/:burger_id','getCommentsForBurger');//--

$app->post('/burgers','addBurger');//
$app->post('/users','addUser');//
$app->post('/qrcode','addQRCode');//
$app->post('/users/update','updateUser');//
$app->post('/users/update/burger','updateBurgerStatus');//
$app->post('/users/addedtogroup','updateAddedToGroup');

$app->post('/comments/add','addComment');//

$app->post('/burgers/updateadded','updateBurgerAddedIngredientsIds');
$app->post('/comments/:burger_id/:user_id','addComment');//

$app->post('/burgeringredient','addBurgerIngredient');

$app->put('/burgers/:burger_id','updateBurger');//
$app->post('/burgers/rating/:burger_id/:rating','updateBurgerRating');//

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

function getAllQRCodes(){
    $qrCodesDAO = new QRCodesDAO();
    echo json_encode($qrCodesDAO->getAllQRCodes());
    exit();
}

function getUserByUsername($username){
    $usersDAO = new UsersDAO();
    echo json_encode($usersDAO->getUserByUsername($username));
    exit();
}

function sendUserDataToUser($email){
    $usersDAO = new UsersDAO();
    $user = $usersDAO->getUserByEmail($email);
    if($user != null){
        $mail  = '<html><head></head><body>';

        $mail .= 'Dear burgerlover,<br/><br/>';
        $mail .= 'You recently asked us to sent you your personal logindata.<br/>';
        $mail .= "Because of privacy reasons we aren't allowed to sent you your password.<br/>";
        $mail .= 'Username: '+$user['username'];
        $mail .= '<br/><br/>';
        $mail .= "In case you really can't recall your password you can contact our customer service.<br/>";
        $mail .= "Send us a mail and we'll reset your password.<br/>";
        $mail .= '<a href="mailto:support@jitbflavoursavour.com?Subject=JITB%20support">Jack In The Box Customer Support</a><br/>';
        $mail .= '<br/><br/><br/>Greetings,&nbsp; <br/>Jack In The Box Technical Service<br/><br/>';

        $mail  .= '</body></html>';

        $header = 'From: Jack In The Box <no-reply@jackinthebox.com>' . "\r\n" .'X-Mailer: PHP/' . phpversion();
        $header .= 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        mail($user['email'], 'Jack In The Box: Logingegevens', $mail, $header);
        echo $user['email'];
    }else{
        echo '';
    }
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

function getBurgerIngredientsByBurgerId($burger_id){
    error_log("getBurgerIngredientsByBurgerId".$burger_id);
    $burgersIngredientsDAO = new BurgersIngredientsDAO();
    echo json_encode($burgersIngredientsDAO->getBurgerIngredientsByBurgerId($burger_id));
    exit();
}

function getBurgerForUser($usergroup_id)
{
	$burgersDAO = new BurgersDAO();
	echo json_encode($burgersDAO->getBurgerForUser($usergroup_id));
	exit();
}

function getBurgerByBurgerId($burger_id){
    $burgersDAO = new BurgersDAO();
    echo json_encode($burgersDAO->getBurgerByBurgerId($burger_id));
    exit();
}

function getFinalSaveByUsername($username){
    $usersDAO = new UsersDAO();
    echo json_encode($usersDAO->getFinalSaveByUsername($username));
    exit();
}

function getUsersForBurger($burger_id)
{
	$usersDAO = new UsersDAO();
	echo json_encode($usersDAO->getUsersForBurger($burger_id));
	exit();
}

function getBurgersByTaste($taste)
{
	$burgersDAO = new BurgersDAO();
	echo json_encode($burgersDAO->getBurgersByTaste($taste));
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

function getCommentsForBurger($burger_id)
{
	$commentsDAO = new CommentsDAO();
	echo json_encode($commentsDAO->getCommentsForBurger($burger_id));
	exit();
}

function getIngredientForUser($user_id)
{
	$usersDAO = new UsersDAO();
	echo json_encode($usersDAO->getIngredientsForUser($user_id));
	exit();
}

function getIngredientsByTaste($taste)
{
    $ingredientsDAO = new IngredientsDAO();
    echo json_encode($ingredientsDAO->getIngredientsByTaste($taste));
    exit();
}

function getIngredientsByTasteAndVegi($taste){
    $ingredientsDAO = new IngredientsDAO();
        echo json_encode($ingredientsDAO->getIngredientsByTasteAndVegi($taste));
        exit();
}

function addBurger()
{
    error_log("add burger");
    ob_start();
    print_r($_GET);
    print_r($_POST);
    $trace = ob_get_clean();
    error_log($trace);
    $post = Slim::getInstance()->request()->post();
    $burgersDAO = new BurgersDAO();
    echo json_encode($burgersDAO->addBurger($post));
    exit();
}

function addUser()
{
    error_log("add user");
    $post = Slim::getInstance()->request()->post();
	$usersDAO = new UsersDAO();
	echo json_encode($usersDAO->addUser($post));
	exit();
}

function addQRCode(){
    error_log("add qrcode");
    $post = Slim::getInstance()->request()->post();
    $qrCodesDAO = new QRCodesDAO();
    echo json_encode($qrCodesDAO->addQRCode($post));
    exit();
}

function updateUser(){
    error_log("update user");
    $post = Slim::getInstance()->request()->post();
    $usersDAO = new UsersDAO();
    echo json_encode($usersDAO->updateUser($post));
    exit();
}

function updateBurgerStatus(){
    error_log("update burger data from user");
    ob_start();
    print_r($_GET);
    print_r($_POST);
    $trace = ob_get_clean();
    error_log($trace);
    $post = Slim::getInstance()->request()->post();
    $usersDAO = new UsersDAO();
    echo json_encode($usersDAO->updateBurgerStatus($post));
    exit();
}

function addComment()
{
	$post = Slim::getInstance()->request()->post();
	$commentsDAO = new CommentsDAO();
	echo json_encode($commentsDAO->addComment($post));
	exit();
}

function addBurgerIngredient(){
    error_log("add burgeringredient");
    $post = Slim::getInstance()->request()->post();
    $burgerIngredientsDAO = new BurgersIngredientsDAO();
    echo json_encode($burgerIngredientsDAO->addBurgerIngredient($post));
    exit();
}

function updateAddedToGroup(){
    error_log("update user: added to group");
    $post = Slim::getInstance()->request()->post();
    $usersDAO = new UsersDAO();
    echo json_encode($usersDAO->updateAddedToGroup($post));
    exit();
}

function updateBurgerAddedIngredientsIds(){
    error_log("update burger: added ingredients ids");
    $post = Slim::getInstance()->request()->post();
    $burgersDAO = new BurgersDAO();
    echo json_encode($burgersDAO->updateBurgerAddedIngredientsIds($post));
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
	echo json_encode($burgersDAO->updateBurgerRating($burger_id,$rating));
	exit();
}
