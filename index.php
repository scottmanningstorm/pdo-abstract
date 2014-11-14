<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require('GrammerMapper.php'); 


$test = new Active('user');

//$grammer = new Grammer($test); 



$test->where("id", '>', 20)->get(); 

//$data = $test->where('ID', '>', 1)->limit(1)->insert();
//$array = array("username" => "my username ", "password" => "pMy assword");

//$data = $test->setWhere('id', '>', 1)->Limit(3)->get(); 
 


//$mapper->Where("id", "=", 1)->limit(10).get();
//$mapper->get();  


echo "<br /> <br />"; 
 
 
	



echo '<br>';
echo '<br>';
echo '<br>';
//var_dump($dataset);



?> 