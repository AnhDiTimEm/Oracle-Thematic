<?php
    require_once SITE_ROOT."/Config/DBCon.php";
    require_once SITE_ROOT."/Entities/Room.php";
    require_once SITE_ROOT."/Entities/Room_Mess.php";
    require_once SITE_ROOT."/Entities/Room_Detail.php";

    class RoomDao extends DBConnection
	{
		public function __construct() 
		{
            parent::__construct();
        }
        
        // public function generate_string($input, $strength)
        // {
        //     $input_length = strlen($input);
        //     $random_string = '';
        //     for($i = 0; $i < $strength; $i++)
        //     {
        //         $random_character = $input[mt_rand(0, $input_length - 1)];
        //         $random_string .= $random_character;
        //     }
        //     return $random_string;
        // }

        public function DeleteRoom($Id)
        {
            $this->RunQuery("DELETE FROM ROOM_DETAIL WHERE ID_ROOM = '{$Id}'");
        }

        public function InsertRoom($Phone_A, $Phone_B)
        {
            $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

            $input_length = strlen($input);
            $random_string = '';
            for($i = 0; $i < 20; $i++)
            {
                $random_character = $input[mt_rand(0, $input_length - 1)];
                $random_string .= $random_character;
            }
            $Id = $random_string;

            //$Id = generate_string($permitted_chars, 20);
            $this->RunQuery("INSERT INTO ROOM(ID_ROOM, PASSWORD, TYPE) VALUES ('{$Id}', null, 'friend')");
            $this->RunQuery("INSERT INTO ROOM_DETAIL(ID_ROOM, PHONE_USER) VALUES ('{$Id}', '{$Phone_A}')");
            $this->RunQuery("INSERT INTO ROOM_DETAIL(ID_ROOM, PHONE_USER) VALUES ('{$Id}', '{$Phone_B}')");
        }
        public function InsertMemberToGroupChat($memberPhone,$room){
            return $this->RunQuery("INSERT INTO ROOM_DETAIL(ID_ROOM, PHONE_USER) VALUES ('{$room}', '{$memberPhone}')");
        }

        public function CreateGroupChat($admin,$password){
            $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

            $input_length = strlen($input);
            $random_string = '';
            for($i = 0; $i < 20; $i++)
            {
                $random_character = $input[mt_rand(0, $input_length - 1)];
                $random_string .= $random_character;
            }
            $Id = $random_string;
            $this->RunQuery("INSERT INTO ROOM(ID_ROOM, PASSWORD, TYPE) VALUES ('{$Id}','{$password}', 'group')");
            $this->RunQuery("INSERT INTO ROOM_DETAIL(ID_ROOM, PHONE_USER) VALUES ('{$Id}', '{$admin}')");
        }
        public function GetAllRoomDetailByPhone($phone)
        {
            $result = $this->RunQuery("SELECT * FROM ROOM_DETAIL Where PHONE_USER='{$phone}'");

            $listRoom = array();
            
			while ($row = oci_fetch_assoc($result))
			{
                $id_Room = new Room_Detail($row['ID_ROOM'], $row['PHONE_USER']);
                
				array_push($listRoom, $id_Room);
			}
			oci_free_statement($result);
            return $listRoom;
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
            $result = $this->RunQuery("SELECT ID,ID_ROOM,PHONE_USER,TO_CHAR(TIME,'dd-mon-yyyy hh24:mi:ss'),CONTENT FROM ROOM_MESS WHERE ID_ROOM='{$id_Room}' ORDER BY TIME");
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
        //get Password of Room as Name of Group chat

        public function GetPassWordOfRoom($id_Room){
            $result = $this->RunQuery("SELECT * FROM ROOM WHERE ID_ROOM ='{$id_Room}'");

            while($row = oci_fetch_assoc($result))
            {
                return $row['PASSWORD'];
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

        public function ClearHistoryRoom($id_Room){

        }
        public function LeaveGroup($id_Room){
            return $this->RunQuery("DELETE FROM ROOM_DETAIL WHERE ID_ROOM='{$id_Room}' AND PHONE_USER='{$_SESSION['user']}'");
        }
	}
?>