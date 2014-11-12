<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require('active.php'); 


$test = new Active('test');

//$data = $test->where('ID', '>', 1)->limit(1)->insert();
$data = $test->selectTable('test')->insert(); 

var_dump($data);
//$data = $test->whereTitleAndId(array('title', 'id'));



echo '<br>';
echo '<br>';
echo '<br>';
//var_dump($dataset);



?> 