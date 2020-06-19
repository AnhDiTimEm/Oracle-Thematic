<?php
    require_once("Config/Config.php");
    if (isset($_GET['chatpage'])){
        if ($_GET['chatpage'] == '1') require_once SITE_ROOT."/Controllers/ChatController.php";
        else require_once SITE_ROOT."/Controllers/ChatController_2.php";
    }
    else if(isset($_GET['signup'])){
        if($_GET['signup']==1){ // đã ấn nút dky sau khi nhập phone,pass
            if(isset($_POST['inputPhone']) && isset($_POST['inputPassword'])){
                $phone = $_POST['inputPhone'];
                $pass= $_POST['inputPassword'];
                require_once SITE_ROOT."/Daos/UserDao.php";
                require_once SITE_ROOT."/Config/DBCon.php";
                $userDao = new UserDao();
                $db = new DBConnection();
                $conn = $db->conn;
                $s = ociparse($conn,"insert into USerr(phone,password) values('123','123')");

                if (!$s) {
                    $error = oci_error($conn);
                    echo "Parse ERROR: (" . $error['message'] . ")";
                } else
                    echo "NO ERROR";
                
                $r = ociexecute($s);
                if (!$r) {
                    $error = oci_error($s);
                    echo "Execution ERROR: (" . $error['message'] . ")";
                } else
                    echo "NO ERROR";
            }
            else{
                echo("UnsetPhone");
            }
        }
        require_once SITE_ROOT."/Controllers/SignupController.php";
    }
    else if (isset($_GET['signin'])){
        //require_once SITE_ROOT."/Daos/UserDao";
        require_once SITE_ROOT."/Controllers/SigninController.php";

    }
    else{
        require_once SITE_ROOT."/Views/sign-in.php";
    }
?>