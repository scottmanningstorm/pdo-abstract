<?php 


class ProfileCrud extends ControllerBaseClass
{

	public function index($title = '') 	
	{
		$model = new ProfileModel();

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
		$this->addParam('edit_record_link' , 'http://localhost:8888/pdo-abstract/Profilecrud/edit');
		$this->addParam('view_record_link' , 'http://localhost:8888/pdo-abstract/crud/recordView');
		$this->addParam('edit_profile_link' , 'http://localhost:8888/pdo-abstract/Profilecrud/edit');
		$this->addParam('delete_link' ,$http . $url.'/delete');
 
		foreach ($get_all_rows as $row => $value) {	
			$profile_id[] = $value['id'];
			$user_id[] = $value['user_id'];
			$name[] = $value['name'];
			$address[] = $value['address'];  
			$phone[] = $value['phone'];
		}	

		//POST requests and vars.
		$this->addParam('id', $profile_id); 
		$this->addParam('user_id', $user_id); 
		$this->addParam('name', $name); 
		$this->addParam('address', $address); 
		$this->addParam('phone', $phone	); 
		
		if (!!$_POST)
		{	
			if ($_POST['delete_row']) {
				$delete = $model->delete($_POST['delete_row']);	
				header('refresh: 0'); 
			}

			if (!!$_POST['insert']) {
				header('location: http://localhost:8888/pdo-abstract/Profilecrud/add'); 
			}

		}

		$this->callView('profileView');  

	}

	public function add() 
	{
		$model = new ProfileModel();
	
		
		
		$this->addParam('title', 'Add new record'); 
		$this->addParam('row', $row); 

		if (!!$_POST)
		{	
			if ($_POST['name'] && $_POST['address']  && $_POST['phone']) { 					
				$insert_values = array("name" => $_POST['name'], "address" => $_POST['address'], "phone" => $_POST['phone']);
				$rows = $model->insert($insert_values);
				header('Location: http://localhost:8888/pdo-abstract/profileCrud'); 
			}
		}

		$this->callView('profileAdd');
	
	}

	public function edit($id = '') 
	{
		$model = new UserModel(); 

		$user = $model->hasRelationship($id); 
 		
		if (count($user) > 0) { 
			foreach ($user as $row => $value) {
				$user_id = $value['user_id'];
				$profile_id = $value['id'];
				$name = $value['name'];
				$address = $value['address'];
				$phone = $value['phone'];  
			}	
		} else { 
			throw new Exception("No relationships found - profileCrud.php : line:95");
		}

		$this->addParam('title', 'Edit Profile Table');
		$this->addParam('user_id', $user_id);
		$this->addParam('profile_id', $profile_id);
		$this->addParam('name', $name);
		$this->addParam('address', $address);
		$this->addParam('phone', $phone);
		
		$this->callView('ProfileEdit');

	} 
	/*
	public function editOLDFUNC($id = '' ) 
	{
	
		//Grab any POST data for 'Profile'
		if (!!$_POST) {	
			if ($_POST['profile_id'] && $_POST['user_id'] && $_POST['name'] && $_POST['address'] && $_POST['phone']) { 
		
				$model->grammer->binds = array(); 
				$model->grammer->wheres = array();
				$rows = $model->where('user_id', '=', $id)->update(array('name' => $_POST['name'], 'address' => $_POST['address'], 'phone' => $_POST['phone']));

				header('Location: http://localhost:8888/pdo-abstract/profileCrud'); 
			}
		}

		$http = 'http://'; 
		$url = $_SERVER['SERVER_NAME'] .':'. $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI']; 
	
		$this->addParam('profile_id', $profile_id); 
		$this->addParam('user_id', $id);
		$this->addParam('name', $name); 
		$this->addParam('address', $address); 
		$this->addParam('phone', $phone);
		$this->addParam('edit_link' , 'http://localhost:8888/pdo-abstract/profilecrud/edit');
		$this->addParam('edit_user_link' , 'http://localhost:8888/pdo-abstract/usercrud/userView');
		
		$this->addParam('title', 'View Profile');
		$this->callView('ProfileEdit');

	}
	*/ 

	public function update($id = '', $username = '', $password = '')  
	{
		$model = new UserModel(); 
		$rows = $model->where('id', '=', $id)->update(array('username' => 'sdf' , 'password' => 'asd'), 1);

		$this->callView('crudUpdate');
	}
	
	public function view($id = '') 
	{	
		$model = new ProfileModel(); 

		$profile = $model->getProfile($id);
		
		if (count($profile) > 0) { 
			foreach ($profile as $row => $value) {
				$user_id = $value['user_id'];
				$profile_id = $value['id'];
				$name[] = $value['name'];
				$address[] = $value['address'];
				$phone[] = $value['phone'];  
			}	
		}
		$http = 'http://'; 
		$url = $_SERVER['SERVER_NAME'] .':'. $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI']; 
		
		$this->addParam('id', $id);
		$this->addParam('profile_id', $profile_id); 
		$this->addParam('user_id', $id);
		$this->addParam('name', $name); 
		$this->addParam('address', $address); 
		$this->addParam('phone', $phone);
		$this->addParam('edit_profile_link' , 'http://localhost:8888/pdo-abstract/Profilecrud/edit');
		$this->addParam('view_user_link' , 'http://localhost:8888/pdo-abstract/Usercrud/viewSingle');
		$this->addParam('edit_user_link' , 'http://localhost:8888/pdo-abstract/Usercrud/edit');
		$this->addParam('title', 'View Profile');

		$this->callView('Profileview');

	}
	public function viewRecord($id = '') 
	{
		echo 'asdas';
	}
	public function viewSingle($id = '') 
	{
		$model = new ProfileModel(); 

		$profile = $model->getProfile($id);
		
		if (count($profile) > 0) { 
			foreach ($profile as $row => $value) {
				$user_id = $value['user_id'];
				$id = $value['id'];
				$name = $value['name'];
				$address = $value['address'];
				$phone = $value['phone'];  
			}	
		}
		
		$http = 'http://'; 
		$url = $_SERVER['SERVER_NAME'] .':'. $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI']; 
		
		$this->addParam('id', $id);
		$this->addParam('user_id', $user_id);
		$this->addParam('name', $name); 
		$this->addParam('address', $address); 
		$this->addParam('phone', $phone);
		$this->addParam('edit_profile_link' , 'http://localhost:8888/pdo-abstract/Profilecrud/edit');
		$this->addParam('view_user_link' , 'http://localhost:8888/pdo-abstract/Usercrud/viewSingle');
		$this->addParam('edit_user_link' , 'http://localhost:8888/pdo-abstract/Usercrud/edit');
		$this->addParam('title', 'View Profile');

		$this->callView('profileViewSingle');

	}


}

?> 