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
		return $this->InsertQuery(
			"INSERT INTO USERR(PHONE, PASSWORD) 
			VALUES (
				'{$user->getPhone()}',
				'{$user->getPassword()}'
			)"
		);
	}

	public function GetAllUserr()
	{
		$result = $this->runQuery("SELECT *	FROM Userr");
		return $result;
		$userList = array();
		while ($row = $result->fetch_assoc())
		{
			$userr = new Userr(
				$row['phone'],
				$row['password'],
				$row['email'],
				$row['avatar'],
				$row['status'],
				$row['timeoff'],

			);
			array_push($userList, $userr);
		}
		$result->free();

		return $userList;
	}
	public function GetUserByPhone($phone){
		$result = $this->RunQuery("Select * from Userr Where phone='{$phone}'");
		
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