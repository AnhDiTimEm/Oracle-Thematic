<?php

class Room_Detail
	{
        private $id_room;
        private $phone_user;

		public function __construct($Id_room, $Phone_user)
		{
			$this->id_room = $Id_room;
            $this->phone_user = $Phone_user;
		}

		public function getId_room()
		{
			return $this->id_room;
		}

		public function setId_room($Id_room)
		{
			$this->id_room = $Id_room;
        }
        
        public function getPhone_user()
		{
			return $this->phone_user;
		}

		public function setPhone_user($Phone_user)
		{
			$this->phone_user = $Phone_user;
		}

	}

?>