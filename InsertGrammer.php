<?php 

class InsertGrammer extends Grammer { 
	



	/**
     * Holds ref to our table
     * @var string
     */
	public $table;

	/**
     * Holds ref to our limits
     * @var string
     */
	public $limit_by; 

	public $binds = array();

	public function setBinds($data)
	{
		$binds = array();

		foreach ($data as $key => $value) {
			$binds[':$key'] = $value;
		}

		$this->binds = $binds;
	}



}

?> 