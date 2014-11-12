<?php

class QueryBuilder 
{
	


	 /**
	  * Deletes a given record from our databse. 
	  * @access public
	  * @param int $id
	  * @return String $statment  
	  */
	public function deleteFromDatabase($id) 
	{
		$statment = "DELETE FROM " .$this->table.' '.$this->getWhere();
		return $statment; 
	}		
	 
	 /**
	  * Method will update a record. 
	  * @access public
	  * @param int $id
	  * @return String $statment  
	  */ 
	public function updateDatabase($id, $values)
	{
		$statment = "UPDATE " .$this->table. " SET Values (".$this->binds($vales).") WHERE id = ".$id." "; 
		return $statment; 
	} 

	 /**
	  * Method will compile a sql statment based on properties set in this object. 
	  *
	  * @access public
	  * @return string $statment  
	  */ 
	public function compileSelect(Selectgrammer $grammer)
	{
		$statment[] = 'SELECT';

		$statment[] = $this->callMethod($grammer); 

	}
	 /**
	  * Takes any vars to INSERT to our databse. 
	  * @access public
	  * @param array $values
	  * @return String $statment  
	  */
	public function compileInsert(InsertGrammer $grammer)  
	{
		/*
		$statment = "INSERT INTO " .$this->table. " Values (".$this->binds($vales).")"; 
		return $statment; 
		*/ 
		$statment[] = "INSERT INTO ";

		$statment[] = $this->callMethod($grammer); 

		die(var_dump($statment)); 
		
		return $statment; 

	}


	public function callMethod($grammer) 
	{

		foreach ($grammer as $key => $value) {

			$property = $this->renderProperty($key);

			$method = 'build'.$property;

			if (method_exists($this, $method)) {

				$statment[] = $this->{$method}($value);

			}

		}
		
		return implode(' ', $statment);

	}

	public function renderProperty($key)
	{
		$prop = explode('_', $key);
		$new_value = array();

		if (count($prop) > 0) {

			for ($i=0; $i<=count($prop)-1; $i++) {
				$new_value[] = ucfirst($prop[$i]);
			}

			$new_value = implode('', $new_value);
		}

		return $new_value;

	}

	public function buildBinds($binds)
	{
		return 'VALUES ('.implode(', ', $binds).')';
	}

	 /**
	  * Returns part of our query string for GROUPBY. 
	  *
	  * @access public
	  * @return string $return  
	  */ 
	public function buildGroupBy($group) 
	{
		$return = '';

		if(!!$group) {
			$return = 'GROUP BY ' . $group; 
		} 

		return $return; 
	}

	 /**
     * Gets part of our query stament for any ORDERBY statments. 
     * @return string $return
     */
	public function buildOrderBy($order)
	{
		$return = ''; 

		if ($order) {
			$return = ' ORDER BY '. $order;
		}

		return $return; 
	} 
	


    /**
     * Gets part of our query string for any tables. 
     * @return string 
     */
	public function buildTable($table) 
	{	
		return ' FROM ' . $table; 
	}


    /**
     * Builds up our WHERE statments for our query. 
     * @return string $return
     */
	public function buildWhere($where)
	{
		if (count($where) > 0) {

				$return = 'WHERE '. implode(' AND ', $where);

			return $return; 
		}
	}


     /**
     * Gets any LIMIT statments to use in our query. 
     * @return string $return 
     */
	public function buildLimitBy($limit) 
	{
		$return = '';

		if (!!$limit) { 
			$return = ' LIMIT ' . $limit; 
		}

		return $return; 
	}


	/**
     * Gets any set Columns to use in our query. 
     * @return string $return 
     */
	public function buildColumn($columns) 
	{
		if (!!$columns) {	
			$return = $columns; 
		} else {
			$return = '*'; 
		}

		return $return; 
	}



}

?> 