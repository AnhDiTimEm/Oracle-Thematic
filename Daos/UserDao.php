<?php
    require_once SITE_ROOT."/Config/DBCon.php";
    require_once SITE_ROOT."/Entities/Userr.php";

    class UserDao extends DBConnection
{
	public function __construct() 
	{
		parent::__construct();
	}

	public function InsertUser($user)
	{
		return $this->RunQuery(
			"INSERT INTO USERR(PHONE, PASSWORD) 
			VALUES (
				'{$user->getPhone()}',
				'{$user->getPassword()}'
			)"
		);
		// $row = oci_fetch_array($result);
		// if($row==false){
		// 	return 0;
		// }
		// else return 1;
	}

	public function GetAllUserr()
	{
		$result = $this->RunQuery("SELECT *	FROM Userr");
		$userList = array();
		while ($row = oci_fetch_assoc($result))
		{
			$userr = new Userr(
				$row['PHONE'],
				$row['PASSWORD'],
				$row['EMAIL'],
				$row['NAME'],
				$row['AVATAR'],
				$row['STATUS'],
				$row['TIMEOFF']

			);
			array_push($userList, $userr);
		}
		oci_free_statement($result);

		return $userList;
	}

	public function GetUserByPhone($phone){

		$result = $this->RunQuery("SELECT * FROM Userr WHERE phone='{$phone}'");

		if (!$result) 
		{
			//$result = "f";
			return $result;
		}

		$row = oci_fetch_array($result);
		return new Userr(
			$row['PHONE'],
			$row['PASSWORD'],
			$row['EMAIL'],
			$row['NAME'],
			$row['AVATAR'],
			$row['STATUS'],
			$row['TIMEOFF']
		);

	}
}

?>