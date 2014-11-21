<?php
ob_start();

require_once('../penguin-framwork/loader/autoLoader.php'); 

AutoLoader::findClass(); 

//Set to show errors during development. 
Config::Enviroment('dev'); 


//$test = new Active('user');

/////////////////
///TEST INDEX//// 
/////////////////

/*
$array = array("username" => "New Username ", "password" => "New Password");
$a = array('userNAMEM', 'Password si '); 

var_dump( $test->where('id', '=', 173)->get() );
*/


$route = new Route(); 

$route->callController(); 
//$route->dumpURI(); 
	 
 
echo '<br /> <br /> <br /> <br /> ';





/////////////////
///TEST INDEX//// 
/////////////////

?> 