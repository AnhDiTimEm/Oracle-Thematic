<?php

class Friend
	{
        private $phone_a;
        private $phone_b;
		private $status;

		public function __construct($Phone_a, $Phone_b, $Status)
		{
			$this->phone_a = $Phone_a;
            $this->phone_b = $Phone_b;
            $this->status = $Status;
		}

		public function getPhone_a()
		{
			return $this->phone_a;
		}

		public function setPhone_a($Phone_a)
		{
			$this->phone_a = $Phone_a;
        }
        
        public function getPhone_b()
		{
			return $this->phone_b;
		}

		public function setPhone_b($Phone_b)
		{
			$this->phone_b = $Phone_b;
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