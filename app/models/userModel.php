<?php 


class UserModel extends Active
{

	public function __construct() 
	{
		parent::__construct('user'); 
	} 
		
	public function getUser($id = '')
	{	
		//$results = $this->getDb('profile', $id);
		$operator = '='; 

		if ($id == '') {
			$id = 0; 
			$operator = '>';
		}

		$results = $this->where('id', $operator, $id)->get();

		return $results;  
	}

 	public function hasRelationship($id) 
 	{	
 		$profile_model = new ProfileModel();
 		$results = $profile_model->where('user_id', '=', $id)->get();

 		if ($results) {
 			return $results; 
 		} else { 
 			return false; 
 		}

 	}

}

?> 