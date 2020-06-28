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
				"INSERT INTO USERR(PHONE, PASSWORD, EMAIL, NAME, AVATAR, STATUS) 
				VALUES (
					'{$user->getPhone()}',
					'{$user->getPassword()}',
					'{$user->getEmail()}',
					'{$user->getName()}',
					'{$user->getAvatar()}',
					'{$user->getStatus()}'
				)"
			);
		}

		public function UpdateStatusUser($Phone, $Status)
		{
			return $this->RunQuery(
				"UPDATE USERR 
				SET	STATUS = '{$Status}',
					TIMEOFF = SYSTIMESTAMP
				WHERE PHONE = '{$Phone}'"
			);
		}

		public function UpdateAvatarUser($Phone, $Avatar)
		{
			return $this->RunQuery(
				"UPDATE USERR 
				SET	AVATAR = '{$Avatar}'
				WHERE PHONE = '{$Phone}'"
			);
		}

		public function UpdateUser($User)
		{
			return $this->RunQuery(
				"UPDATE USERR 
				SET	PASSWORD = '{$User->getPassword()}',
					NAME = '{$User->getName()}',
					EMAIL = '{$User->getEmail()}'
				WHERE PHONE = '{$User->getPhone()}'"
			);
		}

		public function GetAllUserr()
		{
			$result = $this->RunQuery("SELECT PHONE,PASSWORD,EMAIL,NAME,AVATAR,STATUS,TO_CHAR(TIMEOFF,'dd-mon-yyyy hh24:mi:ss') FROM Userr");
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
					$row["TO_CHAR(TIMEOFF,'DD-MON-YYYYHH24:MI:SS')"]

				);
				array_push($userList, $userr);
			}
			oci_free_statement($result);
			return $userList;
		}

		public function GetUserByPhone($phone)
		{
			$result = $this->RunQuery("SELECT * FROM Userr WHERE phone='{$phone}'");
			$row = oci_fetch_array($result);
			$user = new Userr($phone, null);
			$user->addAll(
				$row['PHONE'],
				$row['PASSWORD'],
				$row['EMAIL'],
				$row['NAME'],
				$row['AVATAR'],
				$row['STATUS'],
				$row['TIMEOFF']
			);
			return $user;
		}

	}
?>