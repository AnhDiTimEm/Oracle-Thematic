<?php
    require_once SITE_ROOT."/Daos/UserDao";
    require_once SITE_ROOT."/Entities/Userr";

    class UserService 
    {
        private $UerDao;
        private $Userr;

        public function __construct() 
	    {
		    $this->UserDao = new UserDao();
            $this->Userr = new Userr();
	    }

        //ACCOUNT FUNCTION

        public function GetAllUser()
        {
            return $this->UserDao->GetAllAccount();
        }
        public function InsertUser(){
            return $this->UserDao->InsertUser();
        }

?>