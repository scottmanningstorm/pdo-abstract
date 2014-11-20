<?php 


class Crud extends ControllerBaseClass
{

	public function __construct()
	{	 
		 parent::__construct();
	}


	public function index($title = '') 	
	{
		$model = new Model(); 

		$rows = $model->where('id', '>', '0')->get(); 
		
		$this->addParam('results', $rows);
		$this->addParam('table', $model->grammer->table);
		$this->addParam('title' , 'CRUD System'); 
		$this->addParam('page_info', 'A simple Create, Read, Update and Delete system.'); 
		
		$this->callView();  
	}

	public function add() 
	{
		echo 'ohome view';
	}

	public function edit($id='') 
	{
		
	}

}

?> 