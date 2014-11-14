<?php 

 
class InsertGrammer extends Grammer  
{ 
	
	public $insert; 
	public $into; 

	public $binds = array();

	public function setBinds($data)
	{
		$binds = array();

		foreach ($data as $key => $value) {
		 
			$binds[] = ':'.$key;

			$this->column[] = $key;
		}

		$this->binds = $binds;
		
	  
	}

	 

	public function setTable($table)
	{
		$this->table = $table; 
	}
	
	public function setColumn($column)
	{
		$this->column = $column; 

		return $this;
	}


	 /**
	  * Method will compile our INSERT querys. 
	  *
	  * @access public
	  * @param optinal $query
	  * @param string $bind
	  * @return associativeArray. 
	  */
	public function setInsertProperties($values)
	{
	
		$grammer->setTable($this->table);
		$grammer->setBinds($values); 
 		
		return $grammer; 
	}
	
}

?> 