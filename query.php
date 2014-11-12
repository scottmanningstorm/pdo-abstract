<?php 

require_once('connect.php'); 

class Query
{
	/**
     * Holds our database object. 
     * @var string
     */
	private $db;  

	/**
     * Constructor, creates or gets our singleton database obj.  
     * @access public 
     * 
     */
	public function __construct() 
	{
		$this->db = Connnect::getInstance("localhost", "pdo", "root", "root"); 
	}


	 /**
	  * Method takes query, to query our database with and returns an assoc array. 
	  *
	  * @access public
	  * @param optinal $query
	  * @param string $bind
	  * @return associativeArray. 
	  */
	public function getAssoc($query, $binds = array())  
	{		
		if ($query === "") {
			throw new Exception("Error - No query passed in!");
			 
		}

		$statment = $this->process($query, $binds);
		 
		return $statment->fetchAll(); 
	}	

	 /**
	  * Method takes query, to query our database with and returns an Object. 
	  *
	  * @access public
	  * @param optinal $query
	  * @param string $bind
	  * @return Object. 
	  */
	public function getObj($query, $binds = array())  
	{		
		if ($query === "") {
			throw new Exception("Error - No query passed in!");
			 
		}

		$statment = $this->process($query, $binds);
		
		return $statment->fetch( PDO::FETCH_OBJ); 
	}	

	 /**
	  * Method takes an array of parameters and creates a query string to execute. 
	  *
	  * @access public
	  * @param array $bind
	  * @return String $lastInsertId  
	  */
	public function insert($binds=array())
	{
		$output = $this->process($binds);

		if ($output) {
			return $this->db->lastInsertId();
		} else {
			return false;
		}
	} 

	 /**
	  *  Method processes a query string, binds any optinal parameters to the query and executes the query.  
	  *
	  * @access protected
	  * @param string $query
	  * @param array $binds
	  * @return String $statment  
	  */ 
	protected function process($query, $binds = array()) 
	{ 
		try { 

			$statment = $this->db->prepare($query); 

			$statment = $this->bind($binds, $statment);

			$statment->execute(); 

			return $statment;

		} catch (PDOException $e) { 
			die($e->getMesssage()); 
		}
	}	

	 /**
	  * Method binds any params to this object's query and returns the query as string.  	  
	  *
	  * @access public
	  * @param string $statment
	  * @param array $binds
	  * @return bool $statment  
	  */ 
	public function bind($binds, $statment)
	{
		foreach($binds as $bind => $value) {
			$statment->bindParam(":$bind", $value, PDO::PARAM_STR); 
		}

		return $statment;
	}



	

}

?>

