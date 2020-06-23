<?php 

if($status=="offline"){
    echo'<div class="babble tab-pane fade active show" id="list-empty-'.$key.'" role="tabpanel" aria-labelledby="list-empty-list">';
}
else if($status=="online"){
    echo'<div class="babble tab-pane fade active show" id="list-chat-'.$key.'" role="tabpanel" aria-labelledby="list-chat-list">';
}

?>
    <!-- Start of Chat -->
    <div class="chat" id="1">
        <div class="top">
            <div class="container">
                <div class="col-md-12">
                    <div class="inside">
                        <a href="#"><img class="avatar-md" src="<?php echo $avatar;?>" data-toggle="tooltip" data-placement="top" title="Lean" alt="avatar"></a>
                        <div class="status">
                            <i class="material-icons <?php if($status=="offline"){echo'offline';}else{echo'online';}?>">fiber_manual_record</i>
                        </div>
                        <div class="data">
                            <h5><a href="#"><?php echo $headerName?></a></h5>
                            <span><?php if($status=="offline"){echo'Inactive';}else{echo'Active';}?></span>
                        </div>
                        
                        <!-- START header chat -->
                        <button class="btn connect d-md-block d-none" name="1"><i class="material-icons md-30">phone_in_talk</i></button>
                        <button class="btn connect d-md-block d-none" name="1"><i class="material-icons md-36">videocam</i></button>
                        <!-- <button class="btn d-md-block d-none"><i class="material-icons md-30">info</i></button> -->
                        <div class="dropdown">
                            <button class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons md-30">more_vert</i></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- <button class="dropdown-item connect" name="2"><i class="material-icons">phone_in_talk</i>Voice Call</button>
                                <button class="dropdown-item connect" name="2"><i class="material-icons">videocam</i>Video Call</button>
                                <hr> -->
                                <?php
                                    if($typeRoom=="group"){
                                    echo'
                                        <button class="dropdown-item"><i class="material-icons">person_add</i>Add Contact</button>
                                        <button class="dropdown-item"><i class="material-icons">clear</i>Clear History</button>
                                        <button class="dropdown-item"><i class="material-icons">exit_to_app</i>Leave Group</button>
                                        ';
                                    }
                                    else if($typeRoom=="friend"){
                                        echo'
                                        <button class="dropdown-item"><i class="material-icons">clear</i>Clear History</button>
                                        <button class="dropdown-item"><i class="material-icons">delete</i>Delete Contact</button>
                                        ';
                                    }
                                ?>
                            </div>
                        </div>
                        <!-- END header chat -->

                    </div>
                </div>
            </div>
        </div>

                            <?php if($allMess != null){?>
        <!-- div show discussion -->
        <div class="content" name="content">
            <div class="container">
                <div class="col-md-12">
                        <!-- load mess -->
                        <?php
                            foreach($allMess as $mess){
                                $sender = $dao->GetUserByPhone($mess->getPhone_user());
                                $d=strtotime($mess->getTime());
                                    //date("Y-m-d h:i:sa", $d);
                                if($mess->getPhone_user()!=$_SESSION['user']){
                                    echo'
                                    <div class="message">
                                    <img class="avatar-md" src="'.$sender->getAvatar().'" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
                                    <div class="text-main">
                                        <div class="text-group">
                                            <div class="text">
                                                <p>'.$mess->getContent().'</p>
                                            </div>
                                        </div>
                                        <span>'.date("d-m-y H:i:sa",$d).'</span>
                                    </div>
                                </div>
                                    ';
                                }
                                else{
                                    echo'
                                    <div class="message me">
                                    <div class="text-main">
                                        <div class="text-group me">
                                            <div class="text me">
                                                <p>'.$mess->getContent().'</p>
                                            </div>
                                        </div>
                                        <span>'.date("d-m-y H:i:sa",$d).'</span>
                                    </div>
                                </div>
                                    ';
                                }
                            }
                        ?>
                    <!-- <div class="date">
                        <hr>
                        <span>Yesterday</span>
                        <hr>
                    </div>
                    <div class="message">
                        <img class="avatar-md" src="./asset/img/avatars/avatar-female-5.jpg" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
                        <div class="text-main">
                            <div class="text-group">
                                <div class="text">
                                    <p>We've got some killer ideas kicking about already.</p>
                                </div>
                            </div>
                            <span>09:46 AM</span>
                        </div>
                    </div>
                    <div class="message me">
                        <div class="text-main">
                            <div class="text-group me">
                                <div class="text me">
                                    <p>Can't wait! How are we coming along with the client?</p>
                                </div>
                            </div>
                            <span>11:32 AM</span>
                        </div>
                    </div> -->
                    <!-- end load mess -->
                </div>
            </div>    
        </div>

                        <?php } else {?>
        <!-- div hiển thị nếu chưa có tin nhắn -->
        <div class="content empty">
            <div class="container">
                <div class="col-md-12">
                    <div class="no-messages">
                        <i class="material-icons md-48">forum</i>
                        <p>Seems people are shy to start the chat. Break the ice send the first message.</p>
                    </div>
                </div>
            </div>
        </div>
                        <?php }?>

        <!-- thanh Icon , input Text và Send -->
        <div class="container">
            <div class="col-md-12">
                <div class="bottom">
                    <form class="position-relative w-100">
                        <textarea class="form-control" placeholder="Start typing for reply..." rows="1" id='content_chat<?php echo $key?>'></textarea>
                        <button class="btn emoticons"><i class="material-icons">insert_emoticon</i></button>
                        <button type="button" name="send_chat"class="btn send" id="<?php echo $key?>"><i class="material-icons">send</i></button>
                    </form>
                    <label>
                        <input type="file">
                        <span class="btn attach d-sm-block d-none"><i class="material-icons">attach_file</i></span>
                    </label> 
                </div>
            </div>
        </div>
    </div>
    <!-- End of Chat -->
    <!-- Start of Call -->
    <div class="call" id="call2">
        <div class="content">
            <div class="container">
                <div class="col-md-12">
                    <div class="inside">
                        <div class="panel">
                            <div class="participant">
                                <img class="avatar-xxl" src="./asset/img/avatars/avatar-female-2.jpg" alt="avatar">
                                <span>Connecting</span>
                            </div>							
                            <div class="options">
                                <button class="btn option"><i class="material-icons md-30">mic</i></button>
                                <button class="btn option"><i class="material-icons md-30">videocam</i></button>
                                <button class="btn option call-end"><i class="material-icons md-30">call_end</i></button>
                                <button class="btn option"><i class="material-icons md-30">person_add</i></button>
                                <button class="btn option"><i class="material-icons md-30">volume_up</i></button>
                            </div>
                            <button class="btn back" name="2"><i class="material-icons md-24">chat</i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Call -->
</div>