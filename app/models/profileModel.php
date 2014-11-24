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
		$results= $this->where('user_id', '=', $id)->get();

		return $results;  
	}

}

?> 