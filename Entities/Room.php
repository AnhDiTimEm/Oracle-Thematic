<?php

class Room
	{
        private $id;
        private $password;
		private $type;

		public function __construct($Id, $Password, $Type)
		{
			$this->id = $Id;
            $this->password = $Password;
            $this->type = $Type;
		}

		public function getId()
		{
			return $this->id;
		}

		public function setId($Id)
		{
			$this->id = $Id;
        }
        
        public function getPassword()
		{
			return $this->password;
		}

		public function setPassword($Password)
		{
			$this->password = $Password;
		}

        public function getType()
        {
            return $this->type;
        }

        public function setType($Type)
        {
            $this->type = $Type;
        }

	}

?>