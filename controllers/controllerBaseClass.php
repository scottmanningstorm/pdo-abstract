<?php 


Abstract class ControllerBaseClass 
{
	
	protected $params = array(); 

	public function __construct() 
	{
		echo 'base class constructor'; 
	}

	public function callView($a = 'param1')
	{

		include('views/view.php'); 
	}

	public function addParam($param)
	{
		$this->params[] = $param; 
	} 

}


?> 