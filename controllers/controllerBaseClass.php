<?php 


Abstract class ControllerBaseClass 
{
	
	protected $params = array(); 


	public function __construct() 
	{
		
	}

	public function callView()
	{	
		extract($this->params, EXTR_PREFIX_SAME, "wddx");

		include('views/view.php'); 	
	}

	public function addParam($key, $paramValue)
	{
		$this->params[$key] = $paramValue; 
	} 

	public function getParams($key)
	{
		return $this->params[$key]; 
	}

}


?> 