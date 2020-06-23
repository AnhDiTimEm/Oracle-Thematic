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
			if (!$conn) {
				$m = oci_error();
				throw new \Exception('Cannot connect to database: ' . $m['message']);
			}
		   $stid = oci_parse($conn,$sql);

		   if(!$stid){
				$e = oci_error($conn);  // For oci_parse errors pass the connection handle
				header("Location:./Views/error.php");
		   }

		   $result = oci_execute($stid);
		   if(!$result){
				$e = oci_error($conn);  // For oci_parse errors pass the connection handle
				header("Location:./Views/error.php");
		   }
		   oci_close($conn);
		   return $stid;
		}
	}
	
?>