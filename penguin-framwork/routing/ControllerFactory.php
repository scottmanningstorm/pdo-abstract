<?php 


class ControllerFactory 
{
	public static function BuildController($class, $method)
	{
		if (class_exists($class)) {

			$controller = new ReflectionMethod($class, $method, $args = array()); 

			$controller->invokeArgs(new $class, $args);

			return $controller; 

		} else {

			echo ('Error - could not intantiate class - '.$class.' This class does not exist' ); 

		}
		
	}

}

?> 