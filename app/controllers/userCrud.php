<?php 


class UserCrud extends ControllerBaseClass
{

	public function index($title = '') 	
	{
		$model = new UserModel();

		$get_all_rows = $model->where('id', '>', '0')->get();
		$url = $_SERVER['SERVER_NAME'] .':'. $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI']; 
 		$http = 'http://'; 
 	
		foreach ($get_all_rows as $row => $value) {
			$id[] = $value['id'];
			$username[] = $value['username'];
			$password[] = $value['password'];
			$timestamp[] = $value['created_at'];  
		}	

		//POST requests and vars.
		$this->addParam('id', $id); 
		$this->addParam('username', $username); 
		$this->addParam('password', $password); 
		$this->addParam('timestamp', $timestamp); 
		
		if (!!$_POST) {	
			if ($_POST['delete_row']) {
				$delete = $model->delete($_POST['delete_row']);
				header('refresh: 0'); 
			}

			if (!!$_POST['insert']) {
				header('location: http://localhost:8888/pdo-abstract/crud/add'); 
			}

		}

		//Add all of our params for view
 		$this->addStylesheet('styles'); 
		$this->addParam('results', $get_all_rows);
		$this->addParam('table', $model->grammer->table);
		$this->addParam('title' , 'CRUD System');
		$this->addParam('page_info', 'A simple Create, Read, Update and Delete system.'); 
		//Page links
		$this->addParam('edit_user_link' , 'http://localhost:8888/pdo-abstract/userCrud/edit');
		$this->addParam('delete_link' , 'http://localhost:8888/pdo-abstract/userCrud/delete');
		$this->addParam('edit_profile_link' , 'http://localhost:8888/pdo-abstract/profileCrud/edit');


		$this->callView('userView');  

	}

	public function add() 
	{
		$model = new UserModel();
	
		$row = array('id' => 0, 'username' => 'user', 'password' => 'password', 'created_at' => 0); 
		
		$this->addParam('title', 'Add new record'); 
		$this->addParam('row', $row); 

		if (!!$_POST)
		{	
			if ($_POST['password'] && $_POST['username']) { 					
				$insert_values = array("password" => $_POST['password'], "username" => $_POST['username']);
				$rows = $model->insert($insert_values);
				header('Location: http://localhost:8888/pdo-abstract/crud'); 
			}
		}

		$this->callView('userAdd');
	
	}

	public function edit($id = '') 
	{    
		$model = new UserModel(); 

		$http = 'http://'; 
		$update_url = $http = $http . $_SERVER['SERVER_NAME'] .':'. $_SERVER['SERVER_PORT'] . '/pdo-abstract/crud/update'; 
		$result = $model->where('id', '=', $id)->get();
		
		foreach ($result as $row => $value) {
			$id = $value['id'];
			$username = $value['username'];
			$password = $value['password'];
			$timestamp = $value['created_at'];  
		}	

		//Add all our vars//
		$this->addParam('title', 'Edit User table'); 
		$this->addParam('id', $id); 
		$this->addParam('username', $username); 
		$this->addParam('password', $password); 
		$this->addParam('timestamp', $timestamp); 
		
		//Catch any POST data//
		if (!!$_POST)
		{	
			if ($_POST['password'] && $_POST['id'] && $_POST['username']) { 
				$rows = $model->where('id', '=', $id)->update(array('username' => $_POST['username'], 'password' => $_POST['password']), 1);
				header('Location: http://localhost:8888/pdo-abstract/userCrud'); 
			}
		}

		$this->callView('userEdit');
	}

	public function delete($id='')
	{
		$url = $_SERVER['SERVER_NAME'] .':'. $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI']; 
 		$http = 'http://'; 

		$this->addParam('id', $id); 
		$this->addParam('submit_link', $url . $id); 

 		$this->callView('userDelete');  
	}

	public function update($id='', $username='', $password='')  
	{
		$model = new UserModel(); 
		$rows = $model->where('id', '=', $id)->update(array('username' => 'sdf' , 'password' => 'asd'), 1);

		$this->callView('crudUpdate');
	}

}

?> 