<?php

class QueryBuilder 
{
	
	protected $select_components = array('select',
										  'from',
										  'columns',
										  'where',
										  'orderBy',
										  'groupBy',
										  'limit', 
										  'table' 

									);

	protected $insert_components = array('insert',
										  'columns',
										  'values'
									);

	protected $update_components = array('update',
										  'set',	//SQL SET statment
										  'where',
										  'orderBy',
										  'limit'
									);

	// UPDATE table SET column = value WHERE cond = conv ORDER BY col LIMIT 1, 4
	protected $query_type; 

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
	 


	public function compileUpdate(Grammer $grammer) 
	{
		$statment = $this->callMethod($grammer, $this->update_components); 
		 
		return $statment;
	}

	 /**
	  * Method will compile a sql statment based on properties set in this object. 
	  *
	  * @access public
	  * @return string $statment  
	  */ 
	public function compileSelect(Grammer $grammer)
	{


		$statment = $this->callMethod($grammer, $this->select_components); 
	
		return $statment;
	}

	 /**
	  * Takes any vars to INSERT to our databse. 
	  * @access public
	  * @param array $values
	  * @return String $statment  
	  */

	public function compileInsert(Grammer $grammer)  
	{

		$statment = $this->callMethod($grammer, $this->insert_components); 
	
		return $statment;

	}

	public function callMethod($grammer, $select_components) 
	{
		foreach ($select_components as $value) {

			$method = 'build'.ucfirst($value);
		
			if (method_exists($this, $method)) {
				
				$statment[] = $this->{$method}($grammer);

			}

		}
		
		return implode(' ', $statment);

	}

	
	public function buildUpdate(Grammer $grammer) 
	{
		return 'UPDATE ' . $grammer->table;
	} 

	public function buildInsert(Grammer $grammer) 
	{
		return 'INSERT INTO ' . $grammer->table;
	} 

	public function buildColumns(Grammer $grammer)
	{	
 		if ($grammer->column > 0) { 
			return '(' .implode(', ', $grammer->column ). ' )';  
		}
	}

	public function buildValues(Grammer $grammer)
	{
		return 'VALUES (' .implode(', ', $grammer->bindvalues ). ' )';
	}
	//buildSet




	 /**
	  * Returns part of our query string for GROUPBY. 
	  *
	  * @access public
	  * @return string $return  
	  */ 
	public function buildGroup(Grammer $grammer) 
	{
		$return = '';

		if(!!$group) {
			$return = 'GROUP BY ' . $grammer->group_by; 
		} 

		return $return; 
	}

	 /**
     * Gets part of our query stament for any ORDERBY statments. 
     * @return string $return
     */
	public function buildOrder(Grammer $grammer)
	{
		$return = ''; 

		if ($grammer->order_by) {
			$return = ' ORDER BY '. $grammer->order_by;
		}

		return $return; 
	} 
	


    /**
     * Gets part of our query string for any tables. 
     * @return string 
     */
	public function buildFrom(Grammer $grammer) 
	{	
		return "FROM " . $grammer->table;
	}

	public function buildTable(Grammer $grammer)
	{
		return $grammer->table; 
	}


    /**
     * Builds up our WHERE statments for our query. 
     * @return string $return
     */
	public function buildWhere(Grammer $grammer)
	{
		if (count($grammer->wheres) > 0) {

			$return = 'WHERE '. implode(' AND ', $grammer->wheres);

			return $return; 
		}
	}


     /**
     * Gets any LIMIT statments to use in our query. 
     * @return string $return 
     */
	public function buildLimit(Grammer $grammer) 
	{

		$return = '';

		if (!!$grammer->limit_by) { 
			$return = ' LIMIT ' . $grammer->limit_by; 
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