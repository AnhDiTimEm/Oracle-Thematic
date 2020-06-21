<?php
//header('Content-Type: application/json');
include("../Config/config.php");
require_once SITE_ROOT."/Daos/FriendDao.php";
session_start();
// require_once SITE_ROOT."/Daos/FriendDao.php";
if( $_SESSION['user'] != null){
    $onlineFriend = array();
    $friendDao = new FriendDao();
    $output= '<div class="list-group" id="contacts" role="tablist" name="contacts">';
    $listFriend = $friendDao->GetAllFriend($_SESSION['user']);

    foreach($listFriend as $f){
        $output.= '<a href="#listempty"';
        if($f->getStatus()=="offline"){
            $output.=' class="filterMembers all offline contact" data-toggle="list">
            <img class="avatar-md" src="'.$f->getAvatar().'" data-toggle="tooltip" data-placement="top" title="Michael" alt="avatar">
            <div class="status">
                <i class="material-icons offline">fiber_manual_record</i>
            </div>';
            
        }
        else if($f->getStatus()=="online"){
            $output.=' class="filterMembers all online contact" data-toggle="list">
            <img class="avatar-md" src="'.$f->getAvatar().'" data-toggle="tooltip" data-placement="top" title="Michael" alt="avatar">
            <div class="status">
                <i class="material-icons online">fiber_manual_record</i>
            </div>';
            
        }
        $output.='<div class="data">
                <h5>'.$f->getName().'</h5>
                <p>'.$f->getPhone().'</p>
            </div>
            <div class="person-add">
                <i class="material-icons">person</i>
            </div>
        </a>';
        }
        $output.='</div>';
        echo $output;
}
?>
