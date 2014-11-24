<?php 


class UserModel extends Active
{

	public function __construct() 
	{
		parent::__construct('user'); 
	} 
		
	public function getProfile($id = '')
	{	
		//$results = $this->getDb('profile', $id);
		$results= $this->where('user_id', '=', $id)->get();

		return $results;  
	}

}

?> 