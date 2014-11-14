<?php 
require_once("grammer.php"); 

class SelectGrammer extends Grammer { 
	
		/**
     * Holds ref to our group bys
     * @var string
     */
	public $group_by;

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
		$this->column = $column; 
	}

	public function setSelectProperties(Active $active)								
	{
		
		$this->Where($this->wheres);
		$this->setOrderby($this->order_by);
		$this->setLimitBy($this->limit_by); 
		$this->setGroupBy($this->group_by); 
		$this->setTable($this->table);

		return $this;
	}

	
}

?> 