<?php 

	require_once("classes/Config.php");
	require_once("classes/CodeSmarty.php");
	require_once("classes/CodePDO.php");

	$smarty = new CodeSmarty();
	$config = new Config();

$page = "";
$action = "";
$taste = "";

$content = "";

if(isset($_GET['action']))
{
	$action = $_GET['action'];
}

if(isset($_GET['page']))
{
	$page = $_GET['page'];
}

if(isset($_GET['taste']))
{
	$taste = $_GET['taste'];
}

switch($page)
{
	default:
		$content = $smarty->fetch('home/home.html');
	break;

	case 'overzicht':

		require_once('includes/overzicht.php');

		$content = getOverzicht($taste);

	break;

	case 'registratie':

		if($action == "validate")
		{
			require_once('includes/validate.php');

			$content = validate();

		}else
		{
			$content = $smarty->fetch('registratie/registratie.html');
		}

	break;
}

$smarty->assign('content',$content);

$smarty->display('smarty_templates/index.html');

?>