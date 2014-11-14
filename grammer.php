<?php 


class Grammer
{

	public $active; 

	/**
     * Holds an array of our WHERE statments.
     * @var Array
     */
	public $wheres = array();
 	
 	/**
     * Holds our order by statment
     * @var Array
     */
	public $order_by;
	
	/**
     * Holds our limit 
     * @var Array
     */
	public $limit_by; 
	
	
	/**
     * Holds our collumns
     * @var Array
     */
	public $column; 
	
	 /**
     * Holds ref to our group bys
     * @var string
     */
	public $group_by;

	/**
     * Holds and array of any variables needed to be binded to SELECT statment. 
     * @var Array 
     */
	public $binds = array();

	public $table;

	public $bindValues; 







	 /**
	  * Method build up a WHERE statment, 
	  *
	  * @access public
	  * @param int $id
	  * @return associativeArray. 
	  */
	public function where($column, $operator, $value)
	{
	
		$this->active->wheres[] = $column.' '. $operator.' :'.$column;

		$this->active->binds[$column] = $value;

		return $this;	
	}

    /**
     * Gets any LIMIT statments to use in our query. 
     * @return string $return 
     */
	public function limit($limit) 
	{
		$this->limit_by = $limit; 

		return $this; 
	}

	public function setWhere($where) 
	{
		$this->wheres = $where;
	}

	public function setLimit($limit)
	{
		$this->limit = $limit; 
	}

	public function setGroupBy($group)
	{
		$this->group_by = $group; 
	}

	public function setOrderBy($order)
	{
		$this->order_by = $order; 
	}

	public function setLimitBy($limit)
	{
		$this->limit_by = $limit; 
	}

	public function setTable($table)
	{
		$this->table = $table; 
	}

	public function setColumns($column)
	{
		$this->active->column = $column; 
	}
	public function setBinds($data)
	{
		$binds = array();

		foreach ($data as $key => $value) {

		
			$binds[] = ':'.$key;

			$this->active->column[] = $key;
			$this->active->bindValues = $value; 	
		}

		$this->active->binds = $binds;  
	}


	 /**
	  * Method will compile our UPDATE querys. 
	  *
	  * @access public
	  * @param optinal $query
	  * @param string $bind
	  * @return associativeArray. 
	  */
	public function setUpdateProperties(Active $active, $values, $limit) 
	{
		
		//$grammer->setUpdate($this->update);

		$grammer->Where($this->wheres); 
		$grammer->setOrderBy($this->order_by);
		$grammer->setLimitby($this->limit_by); 
		$grammer->setBinds($values); 

		return $this; 
	}

	

	 

	public function callMethod($staments)
	{
		foreach ($statments as $component) {
			
			if (method_exists($this, $component)) {					
				$this->active->{$component}; 
			}
		}
	} 



}


?> 