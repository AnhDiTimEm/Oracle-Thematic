<?php
 // ajax cho online offline status o trang discussion

include("../Config/config.php");
require_once SITE_ROOT."/Daos/RoomDao.php";
require_once SITE_ROOT."/Daos/UserDao.php";
$roomDao = new RoomDao();
$dao = new UserDao();
session_start();
if ($_SESSION['user'] != null)
{
    $allRoom = $roomDao->GetAllRoomByPhone($_SESSION['user']);
    echo 
    '<div class="list-group" id="chats" role="tablist">';
        foreach ($allRoom as $key)
        {
            $typeRoom = $roomDao->GetTypeOfRoom($key);
            $memberList = $roomDao->GetAllMemberOfRoom($key);
            if($typeRoom =="friend"){
                foreach($memberList as $m){
                    if($m!=$_SESSION['user']){
                        $friend_Phone=$m;
                    }
                }
                $friend = $dao->GetUserByPhone($friend_Phone);
                echo'
                <a href="';
                if($friend->getStatus()=="offline")
                {
                    echo'#list-empty-'.$key.'';
                    echo'" class="filterDiscussions all unread single" id="list-empty-list" data-toggle="list" role="tab">';
                }
                else{
                    echo'#list-chat-'.$key.'';
                    echo'" class="filterDiscussions all unread single" id="list-chat-list" data-toggle="list" role="tab">';
                };
                echo'
                    <img class="avatar-md" src="'.$friend->getAvatar().'" data-toggle="tooltip" data-placement="top" title="'.$friend->getName().'" alt="avatar">
                    <div class="status">
                        <i class="material-icons ';
                if($friend->getStatus()=="offline")
                {
                    echo'offline';
                }else{
                    echo'online';
                };
                echo'">fiber_manual_record</i>
                    </div>';
                echo'
                <div class="data">
                    <h5>'.$friend->getName().'</h5>
                    <span>Sun</span>
                    <p>How can i improve my chances of getting a deposit?</p>
                </div>';
            }
            else if($typeRoom == "group"){
                echo'
                <a href="#list-chat-'.$key.'" class="filterDiscussions all unread single" id="list-chat-list" data-toggle="list" role="tab">
                    <img class="avatar-md" src="./Resources/images/group.jpg" data-toggle="tooltip" data-placement="top" title="'.$friend->getName().'" alt="avatar">
                    <div class="status">
                        <i class="material-icons online">fiber_manual_record</i>
                    </div>';
                echo'
                <div class="data">
                    <h5>'.'Group Code: '.$key.'</h5>
                    <span>Sun</span>
                    <p>How can i improve my chances of getting a deposit?</p>
                </div>';
            }
            echo'
            </a>
        ';
        };
    echo'</div>';
}
?>
