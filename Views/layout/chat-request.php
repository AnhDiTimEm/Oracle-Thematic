<div class="babble tab-pane fade" id="list-request-<?php echo $noti->getPhone(); ?>" role="tabpanel" aria-labelledby="list-request-list">
    <!-- Start of Chat -->
    <div class="chat" id="<?php echo $noti->getPhone(); ?>">
        <div class="top">
            <div class="container">
                <div class="col-md-12">
                    <div class="inside">
                        <a href="#" onclick="return false;"><img class="avatar-md" src="<?php echo $noti->getAvatar(); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo $noti->getName(); ?>" alt="avatar"></a>
                        <div class="status">
                            <?php
                                if ($noti->getStatus() == 'online') 
                                {
                                    echo '<i class="material-icons online">fiber_manual_record</i>';
                                }
                                else echo '<i class="material-icons">fiber_manual_record</i>';
                            ?>
                            
                        </div>
                        <div class="data">
                            <h5><a href="#" onclick="return false;"><?php echo $noti->getName(); ?></a></h5>
                            <span><?php echo $noti->getStatus(); ?></span>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="content empty">
            <div class="container">
                <div class="col-md-12">
                    <div class="no-messages request">
                        <a href="#" onclick="return false;"><img class="avatar-xl" src="./asset/img/avatars/avatar-female-6.jpg" data-toggle="tooltip" data-placement="top" title="Louis" alt="avatar"></a>
                        <h5><?php echo $noti->getName(); ?> would like to add you as a contact. <span>Hi, I'd like to add you as a contact.</span></h5>
                        <form action="?chatpage=1&friend=request" method="post">
                            <div class="options">
                                <button type="submit" class="btn button" name="accept"><i class="material-icons">check</i></button>
                                <button type="submit" class="btn button" name="cancel"><i class="material-icons">close</i></button>
                                <button type="submit" class="btn button" name="seen" style="background-color: orange;"><i class="material-icons">visibility_off</i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="container">
            <div class="col-md-12">
                <div class="bottom">
                    <form class="position-relative w-100">
                        <textarea class="form-control" placeholder="Messaging unavailable" rows="1" disabled></textarea>
                        <button class="btn emoticons disabled" disabled><i class="material-icons">insert_emoticon</i></button>
                        <button class="btn send disabled" disabled><i class="material-icons">send</i></button>
                    </form>
                    <label>
                        <input type="file" disabled>
                        <span class="btn attach disabled d-sm-block d-none"><i class="material-icons">attach_file</i></span>
                    </label> 
                </div>
            </div>
        </div> -->
    </div>
    <!-- End of Chat -->
</div>