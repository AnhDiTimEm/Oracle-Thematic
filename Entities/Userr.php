<?php

class Userr
	{
        private $phone;
        private $password;
		private $email;
        private $name;
        private $avatar;
        private $status;
        private $timeoff;

        // public function _construct($Phone){
        //     $this->phone=$Phone;
        //     $this->password = null;
        //     $this->email = null;
        //     $this->name = null;
        //     $this->avatar = null;
        //     $this->status = null;
        //     $this->timeoff = null;
        // }
		public function __construct($Phone, $Password, $Email, $Name, $Avatar, $Status, $Timeoff)
		{
			$this->phone = $Phone;
			$this->password = $Password;
            $this->email = $Email;
            $this->name = $Name;
            $this->avatar = $Avatar;
            $this->status = $Status;
            $this->timeoff = $Timeoff;
		}
		public function getPhone()
		{
			return $this->phone;
		}

		public function setPhone($Phone)
		{
			$this->phone = $Phone;
		}

		public function getPassword()
		{
			return $this->password;
		}

		public function setPassword($Password)
		{
			$this->password = $Password;
		}

		public function getEmail()
		{
			return $this->email;
		}

		public function setEmail($Email)
		{
			$this->email = $Email;
        }
        
        public function getName()
        {
            return $this->name;
        }

        public function setName($Name)
        {
            $this->name = $Name;
        }

        public function getAvatar()
        {
            return $this->avatar;
        }

        public function setAvatar($Avatar)
        {
            $this->avatar = $Avatar;
        }

        public function getStatus()
        {
            return $this->status;
        }

        public function setStatus($Status)
        {
            $this->status = $Status;
        }

        public function getTimeoff()
        {
            return $this->timeoff;
        }

        public function setTimeoff($Timeoff)
        {
            $this->timeoff = $Timeoff;
        }

	}

?>