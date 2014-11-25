<?php 


class ProfileModel extends Active
{

	public function __construct() 
	{
		parent::__construct('profile'); 
	} 
		
	public function getProfile($id = '')
	{	
		//$results = $this->getDb('profile', $id);
		$operator = '='; 

		if ($id == '') {
			$id = 0; 
			$operator = '>';
		}

		$results = $this->where('user_id', $operator, $id)->get();

		return $results;  
	}

 	public function hasRelationship($id) 
 	{	
 		$user_model = new UserModel();
 		$results = $user_model->where('id', '=', $id)->get();

 		if ($results) {
 			return $results; 
 		} else { 
 			return false; 
 		}

 	}

}

?> 