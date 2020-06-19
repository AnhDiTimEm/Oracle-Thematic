<?php 

	$conn=oci_connect("system","Iamonmyway1999","localhost/orcl");
	If (!$conn)
		echo 'Failed to connect to Oracle';
	else 
		echo 'Succesfully connected with Oracle DB';

	oci_close($conn);
	class DBConnection {
		// Mysqli Object
		private $conn;
	
		// Default Constructor function
		public function __construct() {
			
			$this->conn =oci_connect("system","Iamonmyway1999","localhost/orcl");
			If (!$this->conn)
				echo 'Failed to connect to Oracle';
			else 
				echo 'Succesfully connected with Oracle DB';

			oci_close($this->conn);
		}
	
		protected function runQuery(string $sql) {
			  return	$result = $this->conn->query($sql);
		}
	
	  }
	
?>