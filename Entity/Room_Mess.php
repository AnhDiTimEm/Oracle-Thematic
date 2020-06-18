<?php

class Room_Mess
	{
        private $id;
        private $id_room;
		private $phone_user;
		private $time;
		private $content;

		public function __construct($Id, $Id_room, $Phone_user, $Time, $Content)
		{
			$this->id = $Id;
            $this->id_room = $Id_room;
			$this->phone_user = $Phone_user;
			$this->time = $Time;
			$this->content = $Content;
		}

		public function getId()
		{
			return $this->id;
		}

		public function setId($Id)
		{
			$this->id = $Id;
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

		public function getTime()
		{
			return $this->time;
		}

		public function setTime($Time)
		{
			$this->time = $Time;
		}

		public function getContent()
		{
			return $this->content;
		}

		public function setContent($Content)
		{
			$this->content = $Content;
		}

	}

?>