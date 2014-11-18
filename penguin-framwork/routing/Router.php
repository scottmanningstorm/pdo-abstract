<?php 

class Router 
{
	
	protected $uri = array(); 

	protected $routes;

	protected $controller_obj;

	protected $request_method;

	protected $allowed_methods = array('GET',
									   'POST'
									  ); 
	protected $default_controller; 


	public function __construct() 
	{
		$this->default_controller = 'DefaultController';

		$this->setURI(); 

		$this->loadController();
		

	} 

	public function loadController() 
	{
	
		if (!$this->GetController()) {
			//die('asasdasdasdd');
		}

		if (file_exists('../penguin-framwork/controllers/' .$this->GetController() . '.php')) { 
			
			$this->controller_obj = new $this->GetController(); 
		
		} else {
			 
			$this->controller_obj = new $this->default_controller; 

		}

	}

	public function GetController() 
	{
		if (!!$this->uri && $this->uri[0]) {

			return $this->uri[0]; 
		
		} else {
		
			return null; 
		
		}
	}

	public function getMethod($method) 
	{
		if (!!$this->uri && !!$this->[1]) {

			return $this->uri[1]; 
	
		} else {

			return null; 
		}
		
	}

	public function GetMethod() 
	{
		if (!!$this->uri && $this->uri[1]) {

			return $this->uri[1]; 
		
		} else {
		
			return null; 
		
		}
	}

	public function setController($controller)
	{
		$this->uri[0] = $controller; 
	} 

	public function setURI() 
	{
		
		$this->uri = strtolower(	$_SERVER['REQUEST_URI']); 
	
		$this->uri = explode('/', $_SERVER['REQUEST_URI']);
		
		array_shift($this->uri); 	//Pop off emmpty elemet	
		
		array_shift($this->uri);	//pop off our root. 

	}

	public function dumpURI() 
	{
		var_dump($this->uri); 
	}

	public function getServerMethod() 
	{
		$method = $_SERVER['REQUEST_METHOD'];

		if (in_array($this->request_method, $this->allowed_methods)) {

			$this->allowed_methods = $method;
	
		} else {
			
			$this->allowed_methods = ''; 
			echo 'Error - requested method ('. $method .') not allowed';
		}
	}

	public function createNewController($method, $uri, $action) 
	{
		return ControllerFactory::BuildController($method, $class); 
	}

}

?> 