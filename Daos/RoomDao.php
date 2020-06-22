<?php
    require_once SITE_ROOT."/Config/DBCon.php";
    require_once SITE_ROOT."/Entities/Room.php";
    require_once SITE_ROOT."/Entities/Room_Mess.php";

    class RoomDao extends DBConnection
	{
		public function __construct() 
		{
            parent::__construct();
		}

		public function GetAllRoomByPhone($phone) // get all id_room where user has join
		{
            $result = $this->RunQuery("SELECT ID_ROOM FROM ROOM_DETAIL Where PHONE_USER='{$phone}'");

            $listRoom = array();
            
			while ($row = oci_fetch_assoc($result))
			{
                //$id_Room = $row['ID_ROOM'];
				array_push($listRoom, $row['ID_ROOM']);
			}
			oci_free_statement($result);
            return $listRoom;
        }

        // get all messenger in room
        public function GetAllMessByRoom($id_Room){
            $result = $this->RunQuery("SELECT ID,ID_ROOM,PHONE_USER,TO_CHAR(TIME,'dd-mon-yyyy hh24:mi:ss'),CONTENT FROM ROOM_MESS WHERE ID_ROOM='{$id_Room}'");
            $allMess = array();

            while($row = oci_fetch_assoc($result))
            {
                $mess = new Room_Mess(
                    $row['ID'],
                    $row['ID_ROOM'],
                    $row['PHONE_USER'],
                    $row["TO_CHAR(TIME,'DD-MON-YYYYHH24:MI:SS')"],
                    $row['CONTENT']
                );
                array_push($allMess,$mess);
            }
            oci_free_statement($result);
            return $allMess;
        }

        //get loại room
        public function GetTypeOfRoom($id_Room){
            $result = $this->RunQuery("SELECT * FROM ROOM WHERE ID_ROOM ='{$id_Room}'");

            while($row = oci_fetch_assoc($result))
            {
                return $row['TYPE'];
            }
            return null;
        }

        // get tất cả các thành viên trong chat room
        public function GetAllMemberOfRoom($id_Room){

            $result = $this->RunQuery("SELECT PHONE_USER FROM ROOM_DETAIL Where ID_ROOM='{$id_Room}'");

            $memberList = array();

            while ($row = oci_fetch_assoc($result))
            {
                array_push($memberList,$row['PHONE_USER']);
            }
            oci_free_statement($result);
            return $memberList;
        }

	}
?>