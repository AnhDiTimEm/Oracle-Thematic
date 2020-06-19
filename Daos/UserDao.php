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
		return $this->runQuery(
			"INSERT INTO Userr(phone, password) 
			VALUE (
				'{$user->getPhone()}',
				'{$user->getPassword()}'
			)"
		);
	}

	public function GetAllUserr()
	{
		$result = $this->runQuery("SELECT *	FROM Userr");
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
}

?>