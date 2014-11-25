<?php 


class Crud extends ControllerBaseClass
{

	public function index() 	
	{
	 	$model = new UserModel(); 

	 	$this->addParam('user_table_link', 'http://localhost:8888/pdo-abstract/profileCrud');
	 	$this->addParam('profile_table_link', 'http://localhost:8888/pdo-abstract/profileCrud');
	 	$this->addParam('title', 'List of tables avalible');
	 	$this->addParam('sub_title', 'Avalible tables');

	 	$this->callView('showAllTables');  

	}

	public function recordView($id = '')
 	{
		$model = new UserModel(); 

		$results = $model->getUser($id);
		//grabs any relationships
		$relationship = $model->hasRelationship($id);

		foreach ($relationship as $key => $value) {
			$profile_id = $value['id']; 
			$user_id = $value['user_id']; 
			$name = $value['name']; 
			$address = $value['address']; 
			$phone =  $value['phone']; 
		}

		foreach ($results as $key => $value) {
			$id = $value['id']; 
			$username = $value['username']; 
			$password = $value['password']; 
			$time_stamp = $value['created_at']; 
		}
 
		//Data from databse
		$this->addParam('id', $id); 
		$this->addParam('username', $username); 
		$this->addParam('password', $password); 
		$this->addParam('time_stamp', $time_stamp); 
		//data from database relationship 
		$this->addParam('profile_id', $profile_id);
		$this->addParam('user_id', $user_id); 
		$this->addParam('name', $name); 
		$this->addParam('address', $address); 
		$this->addParam('phone', $phone);  
		$this->addParam('title', 'View and update a database record'); 
		$this->addParam('edit_user_table_link', 'http://localhost:8888/pdo-abstract/userCrud/edit'); 
		$this->addParam('edit_profile_table_link', 'http://localhost:8888/pdo-abstract/Profilecrud/edit'); 

		$this->callView('recordView');
	}

}


?>







