<?php
////////////////////////////////
//   DEBUG - Error Reporting. //
error_reporting(E_ALL);   	  //
ini_set('display_errors', 1); //
////////////////////////////////

require_once('loader/autoLoader.php'); 

AutoLoader::findClass(); 
 
$test = new Active('user');

/////////////////
///TEST INDEX//// 
/////////////////


$array = array("username" => "New Username ", "password" => "New Password");
$a = array('userNAMEM', 'Password si '); 

var_dump( $test->where('id', '=', 173)->get() );


/////////////////
///TEST INDEX//// 
/////////////////

?> 