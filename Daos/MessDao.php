<?php
    require_once SITE_ROOT."/Config/DBCon.php";
    require_once SITE_ROOT."/Entities/Room.php";
    require_once SITE_ROOT."/Entities/Room_Mess.php";

    class MessDao extends DBConnection
	{
		public function __construct() 
		{
            parent::__construct();
		}
        public function InsertMess($idRoom,$phone,$content){
            return $this->RunQuery("INSERT INTO ROOM_MESS(ID_ROOM,PHONE_USER,CONTENT,TIME) VALUES('{$idRoom}','{$phone}',SYSTIMESTAMP,'{$content}')");
        }

	}
?>