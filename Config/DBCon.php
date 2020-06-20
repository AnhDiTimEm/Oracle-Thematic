<?php 
	class DBConnection {
		// Mysqli Object
		public $conn;
	
		// Default Constructor function
		public function __construct() {
			
			// $this->conn = oci_connect("hr","hr","localhost/orcl");
			// If (!$this->conn)
			// 	echo 'Failed to connect to Oracle';
			// else 
			// 	echo 'Succesfully connected with Oracle DB';

			// oci_close($this->conn);
		}
		 function InsertQuery(string $sql) {

			 $conn = oci_connect("hr","hr","localhost/orcl");
			 if(!$conn){
				 echo("connect Fail");
			 }
			 else{
				 echo("connect success");
			 }
			$stid = oci_parse($conn,$sql);
			$result = oci_execute($stid);
			return $result;
		}
		function RunQuery(string $sql){
			$conn = oci_connect("hr","hr","localhost/orcl");
			if(!$conn){
				echo("connect Fail");
			}
			else{
				echo("connect success");
			}
		   $stid = oci_parse($conn,$sql);
		   $result = oci_execute($stid);
		   return $stid;
		}
	  }
	
?>