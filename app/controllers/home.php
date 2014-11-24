<?php 


class Home extends ControllerBaseClass
{
	public function index($title = '', $username= '') 	
	{
		$this->addParam('title' , $title); 
		$this->addParam('username', $username); 
		
		$this->callView();  
	}

	public function view() 
	{
		echo 'ohome view';
	}

}

?> 