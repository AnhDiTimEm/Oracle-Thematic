<?php

class Read_Mess
	{
        private $id_mess;
        private $phone_user;
		private $status;

		public function __construct($Id_mess, $Phone_user, $Status)
		{
			$this->id_mess = $Id_mess;
            $this->phone_user = $Phone_user;
            $this->status = $Status;
		}

		public function getId_mess()
		{
			return $this->id_mess;
		}

		public function setId_mess($Id_mess)
		{
			$this->id_mess = $Id_mess;
        }
        
        public function getPhone_user()
		{
			return $this->phone_user;
		}

		public function setPhone_user($Phone_user)
		{
			$this->phone_user = $Phone_user;
		}

        public function getStatus()
        {
            return $this->status;
        }

        public function setStatus($Status)
        {
            $this->status = $Status;
        }

	}

?>