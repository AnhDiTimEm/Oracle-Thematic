<?php 
	$conn=oci_connect("system","Iamonmyway1999","localhost/orcl");
	If (!$conn)
		echo 'Failed to connect to Oracle';
	else 
		echo 'Succesfully connected with Oracle DB';

oci_close($conn);
?>