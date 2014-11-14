<?php
require('queryBuilder.php'); 
require_once('query.php'); 

//Can be abstracted using poloymorphisim 
require_once('Selectgrammer.php'); 
require_once('Insertgrammer.php'); 
require_once('updategrammer.php'); 

class Active
{
	//
	private $grammer_components = array( 'select',
										 'from',
										 'columns',
										 'where',
										 'columns',
										 'orderBy', 
										 'groupBy',
										 'values',
										 'table',
										 );
	/**
     * Holds our query object
     * @var Object
     */
	public $query;

	/**
     * Holds ref to our query builder object
     * @var Object
     */
	public  $query_builder;

	/*
	public $select_grammer; 
	public $insert_grammer; 
	public $update_grammer; 
	*/ 

	public $grammer; 

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
		$this->grammer = new Grammer($this); 

		
		$this->table = $table;
		
	}


	public function __call($name, $args)
	{
		$this->findFunction($name); 
	}

	//If we try to call a function from grammer obect that does no exist, Grammer->__call() will divert to 
	//$this->findFuntion() and try to call the correct function. 
	public function findFunction($name) 
	{

		if (method_exists($this, $name)) {
			$this->grammer->{$name}(); 
		} else {
			echo "No funcion found for " . $name; 
		}

	}

	///////////////////////////////////////////////////////////////////////////
	public function getSelectGrammer()
	{
		return new SelectGrammer();
	}
	
	public function getInsertGrammer() 
	{
		return new Insertgrammer(); 
	}
	
	public function getUpdateGrammer() 
	{
		return new Updategrammer(); 
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
	  * Method compiles our query and returns an assoc array  
	  *
	  * @access public
	  * @return associativeArray. 
	  */
	public function get()
	{
		$grammer = $this->setSelectProperties();

		return $this->query->getAssoc($this->query_builder->compileSelect($grammer), $this->grammer->bindValues); 

	}

	public function insert($values) 
	{ 
 		


		$grammer = $this->setInsertProperties($this->binds); 		

	 	return $this->query->insert($this->query_builder->compileInsert($grammer),  $values); 

	}

	public function Update($values, $limit)
	{
		$grammer = $this->setUpdateProperties($this, $values, $this->limit_by); 

		return $this->query->insert($this->query_builder->compileUpdate($grammer), $values); 
	}	


	public function setSelectProperties()								
	{
		
		$this->grammer->setWhere($this->wheres);

		$this->grammer->setBinds($this->binds);

	    $this->grammer->setOrderBy($this->order_by);
	 	$this->grammer->setLimitBy($this->limit_by); 
		$this->grammer->setGroupBy($this->group_by); 
		$this->grammer->setTable($this->table);

		return $this->grammer;

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

	public function compileQuery() 
	{
		$this->callMethod($grammer_components); 
	}



}


?>