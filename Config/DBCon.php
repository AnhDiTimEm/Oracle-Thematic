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
		//  function InsertQuery(string $sql) {

		// 	 $conn = oci_connect("hr","hr","localhost/orcl");
		// 	 if(!$conn){
		// 		 echo("connect Fail");
		// 	 }
		// 	 else{
		// 		 echo("connect success");
		// 	 }
		// 	$stid = oci_parse($conn,$sql);
		// 	$result = oci_execute($stid);
		// 	oci_close($conn);
		// 	return $result;
		// }
		function RunQuery(string $sql){
			$conn = oci_connect("hr","hr","localhost/orcl");
			if(!$conn){
				echo("connect Fail");
			}
			else{
				echo("connect success");
			}
		   $stid = oci_parse($conn,$sql);
		   if(!$stid){
			   $err = oci_error();
			   return 0;
		   }
		   $result = oci_execute($stid);
		   if(!$result){
				$err = oci_error();
			   return 0;
		   }
		   oci_close($conn);
		   return $stid;
		}
	  }
	
?>