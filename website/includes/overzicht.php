<?php 

function getOverzicht($taste)
{
	global $smarty;
	global $config;

	$baseURL = 'http://localhost/food/maiv_jackinthebox/api';
	$comments = [];
	$burger_data = file_get_contents($baseURL."/burgers/taste/".$taste);
	$burger = json_decode($burger_data,TRUE);
	
	print_r($burger[0]);

	$smarty->assign('burger_data',$burger);
	$smarty->assign('comments',$comments);
	return $smarty->fetch('smarty_templates/burgers_overzicht/burgers_overzicht.htm');
}

?>