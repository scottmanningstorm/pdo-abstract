<?php 


class ProfileCrud extends ControllerBaseClass
{

	public function index($title = '') 	
	{
		$model = new UserModel();

		$get_all_rows = $model->where('id', '>', '0')->get();
		$url = $_SERVER['SERVER_NAME'] .':'. $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI']; 
 		$http = 'http://'; 
 		//Add all of our params for view
 		$this->addStylesheet('styles'); 
		$this->addParam('results', $get_all_rows);
		$this->addParam('table', $model->grammer->table);
		$this->addParam('title' , 'CRUD System');
		$this->addParam('page_info', 'A simple Create, Read, Update and Delete system.'); 
		//Page links
		$this->addParam('edit_user_link' , $http . $url.'/editUser');
		$this->addParam('view_profile_link' , $http . $url.'/profile');
		$this->addParam('edit_profile_link' , $http . $url.'/editProfile');
		$this->addParam('delete_link' ,$http . $url.'/delete');

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
		
		if (!!$_POST)
		{	
			if ($_POST['delete_row']) {
				$delete = $model->delete($_POST['delete_row']);
				header('refresh: 0'); 
			}

			if (!!$_POST['insert']) {
				header('location: http://localhost:8888/pdo-abstract/crud/add'); 
			}

		}

		$this->callView('crudView');  

	}

	public function add() 
	{
		$model = new ProfileModel();
	
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

		$this->callView('crudEdit');
	
	}


	public function edit($id = '' ) 
	{
		//Shows more information about a record - show any relationships between other tables. 
		$model = new ProfileModel(); 	
		//Get profile table, - 1 to 1 relationship with user table. 
		$profile = $model->getProfile($id, 1);
		if (count($profile) > 0) { 
			foreach ($profile as $row => $value) {
				$profile_id[] = $value['id'];
				$name[] = $value['name'];
				$address[] = $value['address'];
				$phone[] = $value['phone'];  
			}	
		}
		
		//Grab any POST data for 'Profile'
		if (!!$_POST) {	
			if ($_POST['profile_id'] && $_POST['user_id'] && $_POST['name'] && $_POST['address'] && $_POST['phone']) { 
		
				$model->grammer->binds = array(); 
				$model->grammer->wheres = array();
				$rows = $model->update(array('name' => $_POST['name'], 'address' => $_POST['address'], 'phone' => $_POST['phone']));
						
				header('Location: http://localhost:8888/pdo-abstract/crud'); 
			}
		}

		$http = 'http://'; 
		$url = $_SERVER['SERVER_NAME'] .':'. $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI']; 
		
		$this->addParam('profile_id', $profile_id); 
		$this->addParam('user_id', $id);
		$this->addParam('name', $name); 
		$this->addParam('address', $address); 
		$this->addParam('phone', $phone);
		$this->addParam('edit_link' , 'http://localhost:8888/pdo-abstract/crud/edit');
		$this->addParam('title', 'View Profile');

		$this->callView('ProfileEdit');

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
		$model = new UserModel(); 
		$rows = $model->where('id', '=', $id)->update(array('username' => 'sdf' , 'password' => 'asd'), 1);

		$this->callView('crudUpdate');
	}
	
	public function profile($id = '') 
	{	
		$model = new ProfileModel(); 

		$profile = $model->getProfile($id, 1);
		
		if (count($profile) > 0) { 
			foreach ($profile as $row => $value) {
				$profile_id[] = $value['id'];
				$name[] = $value['name'];
				$address[] = $value['address'];
				$phone[] = $value['phone'];  
			}	
		}
		$http = 'http://'; 
		$url = $_SERVER['SERVER_NAME'] .':'. $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI']; 
		
		$this->addParam('profile_id', $profile_id); 
		$this->addParam('user_id', $id);
		$this->addParam('name', $name); 
		$this->addParam('address', $address); 
		$this->addParam('phone', $phone);
		$this->addParam('edit_link' , 'http://localhost:8888/pdo-abstract/crud/edit');
		$this->addParam('title', 'View Profile');

		$this->callView('viewProfile');

	}

}

?> 