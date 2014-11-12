<?php 

class SelectGrammer extends grammer { 

	 /**
     * Holds ref to our column
     * @var string
     */
	public $column; 

	/**
     * Holds ref to our table
     * @var string
     */
	public $table; 
	
	/**
     * Holds ref to our where statment.
     * @var string
     */
	public $where; 
	
	/**
     * Holds ref to our Order bys
     * @var string
     */
	public $order_by; 
	
	/**
     * Holds ref to our group bys
     * @var string
     */
	public $group_by;
	
	/**
     * Holds ref to our limits
     * @var string
     */
	public $limit_by; 


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

	public function setColumn($column)
	{
		$this->column = $column; 
	}

	public function setWhere($where) 
	{
		$this->where = $where;
	}

}

?> 