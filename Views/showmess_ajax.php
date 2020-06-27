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

if( $_SESSION['user'] != null)
{
    $allRoom = $roomDao->GetAllRoomByPhone($_SESSION['user']);
    $listNotificationForRequest = $friendDao->GetNotificationForRequest($_SESSION['user']);
    $active=" active show";
    $flagFocus = '1';
    $id_RoomActive = $_POST['id'];
    $index =0;

    foreach ($allRoom as $key) 
    {
        $typeRoom = $roomDao->GetTypeOfRoom($key);
        $memberList = $roomDao->GetAllMemberOfRoom($key);
        $allMess = $roomDao->GetAllMessByRoom($key);
        $headerName="";
        $avatar="";
        if($key==$id_RoomActive || ($id_RoomActive=="" && $index==0)){
            $active=" active show";
        }
        else{
            $active="";
        }
        $status="";
        $isAdminPhone="";
        if($typeRoom=="friend"){
            foreach($memberList as $m){
                if($m!=$_SESSION['user']){
                    $friend_Phone=$m;
                }
            }
            $friend = $dao->GetUserByPhone($friend_Phone);
            $headerName=$friend->getName();
            $avatar = $friend->getAvatar();
            if($friend_Phone!="1122334455" && $friend_Phone!="2233445566"){
                $status=$friend->getStatus();
            }
            else{
                $status="online";
            }
        }
        else if($typeRoom=="group"){
            $status="online";
            $avatar="./Resources/images/group.jpg";
            $headerName=$roomDao->GetPassWordOfRoom($key);
        }
        // if($key== $id_RoomActive){
        //     require SITE_ROOT."/Views/layout/chat-active.php";
        // }
        require SITE_ROOT."/Views/layout/chat-active.php";
        //$active="";
        $index++;
        $flagFocus='0';
    }
    echo '
    <div class="babble tab-pane fade" id="list-request-1122334455" role="tabpanel" aria-labelledby="list-request-list">
        <!-- Start of Chat -->
        <div class="chat" id="1122334455">
            <div class="top">
                <div class="container">
                    <div class="col-md-12">
                        <div class="inside">
                            <a href="#" onclick="return false;"><img class="avatar-md" src="./Resources/images/avatar19.jpg" data-toggle="tooltip" data-placement="top" title="ADMIN 1" alt="avatar"></a>
                            <div class="status">
                                <i class="material-icons online">fiber_manual_record</i>
                            </div>
                            <div class="data">
                                <h5><a href="#" onclick="return false;">ADMIN 1</a></h5>
                                <span>online</span>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="content empty">
                <div class="container">
                    <div class="col-md-12">
                        <div class="no-messages request">
                            <a href="#" onclick="return false;"><img class="avatar-xl" src="./Resources/images/avatar19.jpg" data-toggle="tooltip" data-placement="top" title="ADMIN 1" alt="avatar"></a>
                            <h5>ADMIN 1 would like to add you as a contact. <span>Hi, I would like to add you as a contact.</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Chat -->
    </div>

    <div class="babble tab-pane fade" id="list-request-2233445566" role="tabpanel" aria-labelledby="list-request-list">
        <!-- Start of Chat -->
        <div class="chat" id="2233445566">
            <div class="top">
                <div class="container">
                    <div class="col-md-12">
                        <div class="inside">
                            <a href="#" onclick="return false;"><img class="avatar-md" src="./Resources/images/avatar18.jpg" data-toggle="tooltip" data-placement="top" title="ADMIN 2" alt="avatar"></a>
                            <div class="status">
                                <i class="material-icons online">fiber_manual_record</i>
                            </div>
                            <div class="data">
                                <h5><a href="#" onclick="return false;">ADMIN 2</a></h5>
                                <span>online</span>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="content empty">
                <div class="container">
                    <div class="col-md-12">
                        <div class="no-messages request">
                            <a href="#" onclick="return false;"><img class="avatar-xl" src="./Resources/images/avatar18.jpg" data-toggle="tooltip" data-placement="top" title="ADMIN 2" alt="avatar"></a>
                            <h5>ADMIN 2 would like to add you as a contact. <span>Hi, I would like to add you as a contact.</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Chat -->
    </div>
    ';

    foreach ($listNotificationForRequest as $noti) 
        {
            require SITE_ROOT."/Views/layout/chat-request.php";
        }
}
?>
