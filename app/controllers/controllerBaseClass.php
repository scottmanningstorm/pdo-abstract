<?php 


Abstract class ControllerBaseClass 
{
	
	protected $params = array(); 

	public function callView($view = 'view')
	{	
		if($this->checkIfViewExists($view)) {
			extract($this->params, EXTR_PREFIX_SAME, "wddx");
			include('app/views/'.$view.'.php'); 	
		}
	}

	public function addParam($key, $paramValue)
	{
		$this->params[$key] = $paramValue; 
	} 

	public function getParams($key)
	{
		return $this->params[$key]; 
	}

	public function checkIfViewExists($view)
	{
		if (file_exists('app/views/'.$view.'.php')) {
			return true; 
		} else {
			return false;
		}
	}

	public function addStylesheet($path) 
	{

		//dont echo html. Store css path to param. 
		if (file_exists('css/'.$path.'.css')) {
		 	echo '<link rel="stylesheet" type="text/css" href="css/'.$path.'.css" />';
		} else {
			throw new Exception('no stylesheet found for ' . $path); 
			return false; 
		}
	}

}


?> 