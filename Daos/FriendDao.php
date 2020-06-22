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

		public function GetAllFriend($phone)
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

	}
?>