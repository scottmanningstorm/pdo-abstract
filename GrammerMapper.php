<?php 

require('active.php'); 

class GrammerMapper 
{

	protected $active; 

	protected $grammer; 

	protected $select_grammer; 

	protected $insert_grammer; 

	protected $update_grammer; 

	protected $query_builder; 

	private $insert_grammer_components = array( 'insert',
												'into',
												'where',
												'table',
													
												'column',
												'limit',
												'values'
												); 

	private $select_grammer_components = array(); 
	private $update_grammer_components = array(); 


	public function __construct($active_obj) 
	{
		$this->active = $active_obj;
		$this->grammer = new selectGrammer(); 
	}


	public function compileSelectGrammer() 
	{
		$this->callMethod($insert_grammer_components); 
	}
	public function compileInsertGrammer() 
	{
		$this->callMethod($select_grammer_components); 
	}
	public function compileUpdateGrammer() 
	{
		$this->callMethod($update_grammer_components); 
	}


	public function callMethod($staments)
	{
		foreach ($statments as $component) {
			
			if (method_exists($this, $component)) {					
				$this->active->{$component}; 
			}
		}
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
	
		$this->grammer->wheres[] = $this->grammer->column.' '. $operator.' :'.$column;

		$this->grammer->binds[$column] = $value;

		return $this->grammer;
	}

	public function orderBy($column, $pos="DESC")
	{
		$this->grammer->order_by  = $column. ' '.$pos;

		return $this->grammer;
	}





	/**
	  * Method compiles our query and returns an assoc array  
	  *
	  * @access public
	  * @return associativeArray. 
	  */
	public function get()
	{

		$this->grammer = new selectGrammer(); 
		$this->grammer->setSelectProperties($this->active);
					
		return $this->active->query->getAssoc($this->active->query_builder->compileSelect($this->grammer), $this->grammer->binds); 

	}

	public function insert($values) 
	{ 
 
 		$this->grammer = new insertGrammer(); 
		$this->grammer->setInsertProperties($values); 		

	 	return $this->query->insert($this->active->query_builder->compileInsert($this->grammer), $values); 

	}

	public function Update($values, $limit)
	{
		$this->grammer = new updateGrammer(); 
		$this->grammer->setUpdateProperties($values, $limit); 

		return $this->query->insert($this->active->query_builder->compileUpdate($this->grammer), $values); 
	}

}


?> 