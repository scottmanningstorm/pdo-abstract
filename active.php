<?php
require('queryBuilder.php'); 
require_once('query.php'); 

//Can be abstracted useing poloymorphisim 
require_once('Selectgrammer.php'); 
require_once('Insertgrammer.php'); 

class Active
{
	/**
     * Holds our query object
     * @var Object
     */
	protected $query;

	/**
     * Holds ref to our query builder object
     * @var Object
     */
	protected $query_builder;

	/**
     * Holds an array of our WHERE statments.
     * @var Array
     */
	protected $wheres = array();
 	
 	/**
     * Holds our order by statment
     * @var Array
     */
	protected $order_by;
	
	/**
     * Holds our limit 
     * @var Array
     */
	protected $limit_by; 
	
	/**
     * Holds our group
     * @var Array
     */
	protected $group_by;
	
	/**
     * Holds our collumns
     * @var Array
     */
	protected $column; 

	/**
     * Holds and array of any variables needed to be binded to SELECT statment. 
     * @var Array 
     */
	protected $binds = array();

	protected $table;

	
	 /**
	  * Objects constructor
	  *
	  * @access public
	  * @param optinal $table
	  */
	public function __construct($table="")
	{
		$this->query = new Query();
		$this->query_builder = new QueryBuilder();

		$this->table = $table;
	}

	 /**
	  * Method build up a WHERE statment, 
	  *
	  * @access public
	  * @param int $id
	  * @return associativeArray. 
	  */
	public function where($column, $operator, $value)
	{
		$this->wheres[] = $column.' '.$operator.' :'.$column;

		$this->binds[$column] = $value;


		return $this;
	}


	public function orderBy($column, $pos="DESC")
	{
		$this->order_by = $column. ' '.$pos;

		return $this;
	}

	public function limit($limit)
	{
		$this->limit_by = $limit; 

		return $this;
	}

	public function groupBy($group)
	{
		$this->group_by = $group; 

		return $this; 
	}

	public function selectTable($table)
	{
		$this->table = $table; 

		return $this; 
	}

	public function selectColumn($column)
	{
		$this->column = $column; 

		return $this; 
	}

	 /**
	  * Method compiles our query and returns an assoc array  
	  *
	  * @access public
	  * @return associativeArray. 
	  */
	public function get()
	{
		$grammer = $this->setSelectProperties();
			 		
		
		return $this->query->getAssoc($this->query_builder->compileSelect($grammer), $this->binds); 

	}

	public function insert() 
	{ 
		//setBinds($data);

		$grammer = $this->setInsertProperties(); 
		
		//$grammer->setBinds($this->binds);  
 
		return $this->query->getAssoc($this->query_builder->compileInsert($grammer), $this->binds); 

	}

	 /**
	  * Method will compile our query. 
	  *
	  * @access public
	  * @param optinal $query
	  * @param string $bind
	  * @return associativeArray. 
	  */
	public function setInsertProperties()
	{
		$grammer = $this->getInsertGrammer();

		$grammer->setTable($this->table);

		//$grammer->setWhere($this->wheres);
		$grammer->setLimitBy($this->limit_by); 
		//

		return $grammer;
	}
	///////////////////////////////////////////////////////////////////////////
	// Function is being repeated - same as setSelectProperties. 
	//can be astracted using polymorphisim - interface and abstract classes. 
	public function setSelectProperties()								
	{
		$grammer = $this->getSelectGrammer();

		$grammer->setWhere($this->wheres);
		$grammer->setOrderby($this->order_by);
		$grammer->setLimitBy($this->limit_by); 
		$grammer->setGroupBy($this->group_by); 
		$grammer->setTable($this->table);

		return $grammer;
	}
	///////////////////////////////////////////////////////////////////////////
	public function getSelectGrammer()
	{
		return new SelectGrammer();
	}

	public function getInsertGrammer()
	{
		return new InsertGrammer();
	}

	 /**
	  * Method will find an id in our database matching the id passed into the function. 
	  *
	  * @access public
	  * @param int $id
	  * @return associativeArray. 
	  */
	public function find($id)
	{
		$this->query_builder->setWhere('id = :id');
		$this->query_builder->setLimit(1);

		return $this->query->getAssoc($this->query_builder->compileSelect(), array('id' => $id));
	}




	public function delete($id)
	{
		$this->query_builder->setWhere($this->wheres);

		$this->query_builder->deleteFromDatabase($id); 

		return $this; 
	}




	/**
	  * Method returns true or false if there is an active record for passed in id. 
	  *
	  * @access public
	  * @param int $id
	  * @return bool 
	  */
	public function doesRecordExist($id)
	{
		$find = $this->find($id); 

		if(!!$find) {
			$return = true;
		} else $return = false; 

		return $return; 
	}


}


?>