<?php 
	class DBConnection {
		// Mysqli Object
		public $conn;
	
		// Default Constructor function
		public function __construct() {
			
			$this->conn =oci_connect("hr","hr","localhost/orcl");
			If (!$this->conn)
				echo 'Failed to connect to Oracle';
			else 
				echo 'Succesfully connected with Oracle DB';

			oci_close($this->conn);
		}
		
		protected function parse($query) {

			$response = oci_parse($this->conn, $query);
			return $response;
	  }
		protected function runQuery(string $sql) {
			//$stid = oci_parse($this->conn,$sql);
			$stid=oci_parse("insert into Userr(phone,password)
			values('123','123')");
			oci_execute($stid);
		}
		// function select_data(string $sql){
		// 	$stmt = oci_parse($conn,$sql);
		// 	oci_execute($stmt, OCI_DEFAULT);

		// }
	
	  }
	
?>