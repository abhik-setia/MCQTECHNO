<?php
	require_once("db_config.php");
	
		class DB_CONNECT {
			private $connection;
		// default is private here
		
		// constructor
		function __construct() {
			// connecting to database
			$this->connect();
		}
	 
		// destructor
		function __destruct() {
			// closing db connection
			$this->close();
		}
	 
		/**
		 * Function to connect with database
		 */
		function connect() {
			// Connecting to mysql database
			$this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysql_error());
	 
			// Selecing database
			$db = mysqli_select_db($this->connection,DB_DATABASE) or die(mysql_error()) or die(mysql_error());			
		}
	 
		/**
		 * Function to close db connection
		 */
		function close() {
			// closing db connection
			mysqli_close($this->connection);
		}
		
		// Removing the SQL injections from the query..
		public function mysql_prep($value){
			$magic_quotes_active = get_magic_quotes_gpc();
			$new_enough_php = function_exists("mysql_real_escape_string");
			
			if($new_enough_php){
				if($magic_quotes_active){ $value = stripslashes($value); }
				$value = mysqli_real_escape_string($this->connection,$value);
			}else{
				if(!$magic_quotes_active){ $value = addslashes($value); }
			}
			return $value;
		}
		
		// querying in the database 
		public function query_database($query_string,$use_sql_prep=0){			
			$result = mysqli_query($this->connection,$query_string);
			//$this->confirm_query($result);
			//Uncomment this to see the errors in the queries
			if(!$result){
				echo "Query has failed : ";
				echo mysqli_error();
				return NULL;
			}
			return $result;
		}
		
		// Confirming the query..
		private function confirm_query($result){
			if(!$result){
				die("Query has failed : " . mysql_error());
			}
		}
		
		// for number of rows
		function number_of_rows($result){
			return mysqli_num_rows($result);
		}
		
		function fetch_array($result){
			return mysqli_fetch_array($result);
		}
		
		function rows_affected(){
			return mysqli_affected_rows($this->connection);
		}		
	}
	$db = new DB_CONNECT();	
?>