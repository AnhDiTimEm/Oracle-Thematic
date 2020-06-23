<?php
 // mai làm
include("../Config/config.php");
require_once SITE_ROOT."/Daos/MessDao.php";

$content = $_POST['Content'];
$idRoom = $_POST['IdRoom'];
session_start();
// require_once SITE_ROOT."/Daos/FriendDao.php";
if( $_SESSION['user'] != null){
    $messDao = new MessDao();
    if($messDao->InsertMess($idRoom,$_SESSION['user'],$content)){
        //echo " ok";
    }
}
?>