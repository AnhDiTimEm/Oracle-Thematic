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
            $friend_Phone="";
            $allMess = $roomDao->GetAllMessByRoom($key);
            $lastContent="";
            $lastMemChat="";
            if($allMess!=null){
               $lastContent= end($allMess)->getContent();
               $lastmem = $dao->getUSerByPhone(end($allMess)->getPhone_user());
               $lastMemChat=$lastmem->getName();
            }
            if($typeRoom =="friend"){
                foreach($memberList as $m){
                    if($m!=$_SESSION['user']){
                        $friend_Phone=$m;
                    }
                }
                $friend = $dao->GetUserByPhone($friend_Phone);

                if($friend_Phone=="1122334455" || $friend_Phone=="2233445566"){
                    $friend->setStatus("online");
                }
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
                    ';
                    if($allMess!=null){
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        // get thời gian chat ( date - now)
                        $date1 = strtotime(end($allMess)->getTime()); // time chat
                        $date2= time(); // now
                        $TimeShow="";
                        $diff = abs($date1 - $date2);  

                        $years = floor($diff / (365*60*60*24));  

                        $months = floor(($diff - $years * 365*60*60*24) 
                                                    / (30*60*60*24));  

                        $days = floor(($diff - $years * 365*60*60*24 -  
                                    $months*30*60*60*24)/ (60*60*24)); 
                        
                        $hours = floor(($diff - $years * 365*60*60*24  
                            - $months*30*60*60*24 - $days*60*60*24) 
                                                        / (60*60));  
                    
                        $minutes = floor(($diff - $years * 365*60*60*24  
                                - $months*30*60*60*24 - $days*60*60*24  
                                                - $hours*60*60)/ 60);
                        if($months==0){
                            if($days==0){
                                if($hours==0){
                                    if($minutes==0){
                                        $TimeShow="Just Now";
                                    }
                                    else{
                                        if($minutes==1){
                                            $TimeShow=$minutes.' minute ago';
                                        }
                                        else{
                                            $TimeShow=$minutes.' minutes ago';
                                        }
                                    }
                                }
                                else{
                                    if($hours==1){
                                        $TimeShow=$hours.' hour ago';
                                    }
                                    else{
                                        $TimeShow=$hours.' hours ago';
                                    }
                                }
                            }
                            else{
                                if($days==1){
                                    $TimeShow=$days.' day ago';
                                }
                                else{
                                    $TimeShow=$days.' days ago';
                                }
                            }
                        }
                        else{
                            if($months==1){
                                $TimeShow=$months.' month ago';
                            }
                            else{
                                $TimeShow=$months.' months ago';
                            }
                        }
                        
                        echo'
                        <span>'.$TimeShow.'</span>
                        <p>'.$lastMemChat.' : '.$lastContent.'</p>';
                    }
                    else{
                        echo'
                        <p>Lets Talk Together</p>';
                    }
                    echo'
                </div>';
            }
            else if($typeRoom == "group"){
                $name = $roomDao->GetPassWordOfRoom($key);
                echo'
                <a href="#list-chat-'.$key.'" class="filterDiscussions all unread single" id="list-chat-list" data-toggle="list" role="tab">
                    <img class="avatar-md" src="./Resources/images/group.jpg" data-toggle="tooltip" data-placement="top" title="'.$name.'" alt="avatar">
                    <div class="status">
                        <i class="material-icons online">fiber_manual_record</i>
                    </div>';
                echo'
                <div class="data">
                    <h5>'.'Group : '.$name.'</h5>';
                    if($allMess!=null){
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        // get thời gian chat ( date - now)
                        $date1 = strtotime(end($allMess)->getTime()); // time chat
                        $date2= time(); // now
                        $TimeShow="";
                        $diff = abs($date1 - $date2);  

                        $years = floor($diff / (365*60*60*24));  

                        $months = floor(($diff - $years * 365*60*60*24) 
                                                    / (30*60*60*24));  

                        $days = floor(($diff - $years * 365*60*60*24 -  
                                    $months*30*60*60*24)/ (60*60*24)); 
                        
                        $hours = floor(($diff - $years * 365*60*60*24  
                            - $months*30*60*60*24 - $days*60*60*24) 
                                                        / (60*60));  
                    
                        $minutes = floor(($diff - $years * 365*60*60*24  
                                - $months*30*60*60*24 - $days*60*60*24  
                                                - $hours*60*60)/ 60);
                        if($months==0){
                            if($days==0){
                                if($hours==0){
                                    if($minutes==0){
                                        $TimeShow="Just Now";
                                    }
                                    else{
                                        if($minutes==1){
                                            $TimeShow=$minutes.' minute ago';
                                        }
                                        else{
                                            $TimeShow=$minutes.' minutes ago';
                                        }
                                    }
                                }
                                else{
                                    if($hours==1){
                                        $TimeShow=$hours.' hour ago';
                                    }
                                    else{
                                        $TimeShow=$hours.' hours ago';
                                    }
                                }
                            }
                            else{
                                if($days==1){
                                    $TimeShow=$days.' day ago';
                                }
                                else{
                                    $TimeShow=$days.' days ago';
                                }
                            }
                        }
                        else{
                            if($months==1){
                                $TimeShow=$months.' month ago';
                            }
                            else{
                                $TimeShow=$months.' months ago';
                            }
                        }
                        
                        echo'
                        <span>'.$TimeShow.'</span>
                        <p>'.$lastMemChat.' : '.$lastContent.'</p>';
                    }
                    else{
                        echo'
                        <p>Lets Talk Together</p>';
                    }
                    echo'
                </div>';
            }
            echo'
            </a>
        ';
        };
    echo'</div>';
}
?>
