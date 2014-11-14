<?php 


class UpdateGrammer extends Grammer 
{
	

	

	//refine this into interfaces and abstrac classses
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


}