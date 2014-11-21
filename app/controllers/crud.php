<?php 


class Crud extends ControllerBaseClass
{

	public function index($title = '') 	
	{
		$model = new Model();

		$rows = $model->where('id', '>', '0')->get();
		

		//Grab our POST data
		if (!!$_POST)
		{	
			if($_POST['delete_row']) {
				$delete = $model->delete($id);
			}
		}
		

		//getting url for edit and update... 
		$url = $_SERVER['SERVER_NAME'] .':'. $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI']; 

 		$http = 'http://'; 
 		$this->addStylesheet('styles'); 
		$this->addParam('results', $rows);
		$this->addParam('table', $model->grammer->table);
		$this->addParam('title' , 'CRUD System'); 
		$this->addParam('page_info', 'A simple Create, Read, Update and Delete system.'); 
		$this->addParam('edit_link' , $http . $url.'/edit');
		$this->addParam('delete_link' ,$http . $url.'/delete');

		foreach ($rows as $row => $value) {
			$id[] = $value['id'];
			$username[] = $value['username'];
			$password[] = $value['password'];
			$timestamp[] = $value['created_at'];  
		}	
		
		

		$this->addParam('id', $id); 
		$this->addParam('username', $username); 
		$this->addParam('password', $password); 
		$this->addParam('timestamp', $timestamp); 
		
		$this->callView('crudView');  
	
	}

	public function add() 
	{
		echo 'add sdfdfsdfview';
	}

	public function edit($id='') 
	{
	
	    
		$model = new Model(); 
		$http = 'http://'; 
		$update_url = $http = $http . $_SERVER['SERVER_NAME'] .':'. $_SERVER['SERVER_PORT'] . '/pdo-abstract/crud/update'; 
 	
		$result = $model->where('id', '=', $id)->get();
		
	
		$this->addParam('id', $id); 
		$this->addParam('title', 'Edit id numder ' . $id); 
		$this->addParam('row', $result[0]);
		$this->addParam('id', $id); 	
		$this->addParam('submit_link', $update_url); 

		//Grab our POST data
		if (!!$_POST)
		{	
			if ($_POST['password'] && $_POST['id'] && $_POST['username']) { 
				$rows = $model->where('id', '=', $id)->update(array('username' => $_POST['username'], 'password' => $_POST['password']), 1);
				header('Location: http://localhost:8888/pdo-abstract/crud'); 
			}
		}

		$this->callView('crudEdit');

	}

	public function delete($id='')
	{
		$url = $_SERVER['SERVER_NAME'] .':'. $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI']; 
 		$http = 'http://'; 

		$this->addParam('id', $id); 
		$this->addParam('submit_link', $url . $id); 

 		$this->callView('crudDelete');  
	}

	public function update($id='', $username='', $password='')  
	{
		$model = new Model(); 
		 
		//Limit 1 Not working!! 
		$rows = $model->where('id', '=', $id)->update(array('username' => 'sdf' , 'password' => 'asd'), 1);
		
		echo 'inside update' . $username; 

		//$confimation = 

		$this->callView('crudUpdate');
	}

}

?> 