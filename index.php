<?php
ob_start();

require_once('../penguin-framework/loader/autoLoader.php'); 

//Auto loading. If we try to call a class that has not been included - 
AutoLoader::findClass(); 


//Set to show errors during development. 
Config::Enviroment('local'); 

/////////////////
///TEST INDEX//// 
/////////////////


//Start routing 
$route = new Route();  
$route->callController(); 

//echo '<br /> <br /> <br /> <br /> ';

/////////////////
///TEST INDEX//// 
/////////////////



?> 