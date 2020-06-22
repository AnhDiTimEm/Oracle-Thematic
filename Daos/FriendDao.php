<?php
    require_once SITE_ROOT."/Config/DBCon.php";
    require_once SITE_ROOT."/Entities/Friend.php";
    require_once SITE_ROOT."/Entities/Userr.php";
    require_once SITE_ROOT."/Daos/UserDao.php";

    class FriendDao extends DBConnection
	{
		public function __construct() 
		{
            parent::__construct();
		}

        public function AddFriend($friend)
		{
			$this->RunQuery(
				"INSERT INTO FRIEND(PHONE_A, PHONE_B, STATUS) 
				VALUES (
					'{$friend->getPhone_a()}',
					'{$friend->getPhone_b()}',
					'waitting'
				)"
            );

            $this->RunQuery(
				"INSERT INTO FRIEND(PHONE_A, PHONE_B, STATUS) 
				VALUES (
					'{$friend->getPhone_b()}',
					'{$friend->getPhone_a()}',
					'request'
				)"
            );
        }
        
        public function UpdateStatusFriend($friend)
        {
            return $this->RunQuery(
				"UPDATE FRIEND 
				SET	STATUS = '{$friend->getStatus()}'
				WHERE PHONE_A = '{$friend->getPhone_a()}' AND PHONE_B = '{$friend->getPhone_b()}'"
			);
        }

        public function GetNotificationForRequest($phone)
        {
            $userDao = new UserDao();
            $result = $this->RunQuery("SELECT PHONE_B FROM Friend Where PHONE_A = '{$phone}' AND STATUS = 'request'");

            $friendList = array();
            
			while ($row = oci_fetch_assoc($result))
			{
                $friend = $userDao->GetUSerByPhone($row['PHONE_B']);

                $userr = new Userr($row['PHONE_B'],null);
                $userr->addAll(
					$friend->getPhone(),
                    $friend->getPassword(),
                    $friend->getEmail(),
                    $friend->getName(),
                    $friend->getAvatar(),
                    $friend->getStatus(),
                    $friend->getTimeoff()
                );
                   
				array_push($friendList, $userr);
			}
			oci_free_statement($result);
            return $friendList;
        }

        public function GetNotificationForSeen($phone)
        {
            $userDao = new UserDao();
            $result = $this->RunQuery("SELECT PHONE_B FROM Friend Where PHONE_A = '{$phone}' AND STATUS = 'seen'");

            $friendList = array();
            
			while ($row = oci_fetch_assoc($result))
			{
                $friend = $userDao->GetUSerByPhone($row['PHONE_B']);

                $userr = new Userr($row['PHONE_B'],null);
                $userr->addAll(
					$friend->getPhone(),
                    $friend->getPassword(),
                    $friend->getEmail(),
                    $friend->getName(),
                    $friend->getAvatar(),
                    $friend->getStatus(),
                    $friend->getTimeoff()
                );
                   
				array_push($friendList, $userr);
			}
			oci_free_statement($result);
            return $friendList;
        }

		public function GetAllFriendByPhone($phone)
		{
            $userDao = new UserDao();
            $result = $this->RunQuery("SELECT PHONE_B FROM Friend Where PHONE_A='{$phone}' AND STATUS='accept'");

            $friendList = array();
            
			while ($row = oci_fetch_assoc($result))
			{
                $friend = $userDao->GetUSerByPhone($row['PHONE_B']);

                $userr = new Userr($row['PHONE_B'],null);
                $userr->addAll(
					$friend->getPhone(),
                    $friend->getPassword(),
                    $friend->getEmail(),
                    $friend->getName(),
                    $friend->getAvatar(),
                    $friend->getStatus(),
                    $friend->getTimeoff()
                );
                   
				array_push($friendList, $userr);
			}
			oci_free_statement($result);
            return $friendList;
        }
        
        public function GetAllFriend()
        {
            $result = $this->RunQuery("SELECT * FROM FRIEND");
            $friendList = array();
			while ($row = oci_fetch_assoc($result))
			{
                $friend = new Friend(
					$row['PHONE_A'],
					$row['PHONE_B'],
					$row['STATUS']
                );  
				array_push($friendList, $friend);
			}
			oci_free_statement($result);
            return $friendList;
        }
	}
?>