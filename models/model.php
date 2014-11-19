<?php 


class Model extends Active
{

	public function __construct($table = '') 
	{
	
		parent::__construct();

		$this->grammer->table = $table;  

	}

	
	
}

?> 