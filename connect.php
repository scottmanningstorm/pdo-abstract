<?php   

	
class Connnect 
 {
    /**
     * Holds name of database. 
     * @var string
     */
	private $database; 

	/**
     * Holds username for database
     * @var string
     */
	private $username; 

	/**
     * Holds password to log into database
     * @var string
     */
	private $password; 

	/**
     * Holds host name and database name . 
     * @var string
     */
	private $dsn; 

	/**
     * Holds our singleton instance of this object. 
     * @var Object
     */
	protected static $instance = NULL;

	/**
	 *  Method returns singleton instance of PDO object
	 *
	 *  @access public
	 *  @param string $hostname
	 *  @param string $database
	 *  @param string $username
	 *  @param string $password
	 * 	@return object
	 */
	public static function getInstance($hostname, $database, $username, $password) 
	{
		$instance = NULL;
 			
		if ($instance === null) {		
		
			try {
			 
				$dsn = "mysql:host=$hostname;dbname=$database"; 
				self::$instance = new PDO($dsn, $username, $password); 
				echo "connected to Databse";
			}

			catch(PDOException $e ) {
				echo "Can not connect to host:";
				die( $e->getMessage()); 
			}
			
			
		}

		return self::$instance;
		 
	}

	

	

}
