<?php
 // ajax cho online offline status o trang discussion

include("../Config/config.php");
require_once SITE_ROOT."/Daos/RoomDao.php";
require_once SITE_ROOT."/Daos/UserDao.php";
require_once SITE_ROOT."/Daos/FriendDao.php";

$roomDao = new RoomDao();
$dao = new UserDao();
$friendDao = new FriendDao();

session_start();

if( $_SESSION['user'] != null){
    $allRoom = $roomDao->GetAllRoomByPhone($_SESSION['user']);
    $listNotificationForRequest = $friendDao->GetNotificationForRequest($_SESSION['user']);
    $active=" active show";
    // echo'<div class="tab-content" id="nav-tabContent">';
    foreach ($allRoom as $key) 
    {
        $typeRoom = $roomDao->GetTypeOfRoom($key);
        $memberList = $roomDao->GetAllMemberOfRoom($key);
        $allMess = $roomDao->GetAllMessByRoom($key);
        $headerName;
        $avatar;
        $status;
        if($typeRoom=="friend"){
            foreach($memberList as $m){
                if($m!=$_SESSION['user']){
                    $friend_Phone=$m;
                }
            }
            $friend = $dao->GetUserByPhone($friend_Phone);

            $headerName=$friend->getName();
            $avatar = $friend->getAvatar();
            $status=$friend->getStatus();
        }
        else if($typeRoom=="group"){
            $status="online";
            $avatar="./Resources/images/group.jpg";
            $headerName="Group code: ".$key;
        }
        require SITE_ROOT."/Views/layout/chat-active.php";
        $active="";
    }

    foreach ($listNotificationForRequest as $noti) 
        {
            require SITE_ROOT."/Views/layout/chat-request.php";
        }

    // echo'</div>';
    // echo"wtf";
}
?>
