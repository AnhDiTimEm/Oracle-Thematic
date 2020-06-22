<!-------------------------------- File ko dung toi -->
<!-- ------------------------------------------------------------- -->

<div class="babble tab-pane fade" id="list-chat-<?php echo $key?>" role="tabpanel" aria-labelledby="list-chat-list">
    <!-- Start of Chat -->
    <div class="chat" id="1">
        <div class="top">
            <div class="container">
                <div class="col-md-12">
                    <div class="inside">
                        <a href="#"><img class="avatar-md" src="<?php echo $avatar;?>" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar"></a>
                        <div class="status">
                            <i class="material-icons online">fiber_manual_record</i>
                        </div>
                        <div class="data">
                            <h5><a href="#" ><?php echo $headerName?></a></h5>
                            <span>Active now</span>
                        </div>
                        
                        <!-- START header chat -->
                        <?php require_once SITE_ROOT."/Views/layout/header-chat-inactive.php"; ?>
                        <!-- END header chat -->

                    </div>
                </div>
            </div>
        </div>
        <div class="content" id="content">
            <div class="container">
                <div class="col-md-12">
                    <div class="date">
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
                    </div>
                    <div class="message">
                        <img class="avatar-md" src="./asset/img/avatars/avatar-female-5.jpg" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
                        <div class="text-main">
                            <div class="text-group">
                                <div class="text">
                                    <p>Coming along nicely, we've got a draft for the client quarries completed.</p>
                                </div>
                            </div>
                            <span>02:56 PM</span>
                        </div>
                    </div>
                    <div class="message me">
                        <div class="text-main">
                            <div class="text-group me">
                                <div class="text me">
                                    <p>Roger that boss!</p>
                                </div>
                            </div>
                            <div class="text-group me">
                                <div class="text me">
                                    <p>I have already started gathering some stuff for the mood boards, excited to start!</p>
                                </div>
                            </div>
                            <span>10:21 PM</span>
                        </div>
                    </div>
                    <div class="message">
                        <img class="avatar-md" src="./asset/img/avatars/avatar-female-5.jpg" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
                        <div class="text-main">
                            <div class="text-group">
                                <div class="text">
                                    <p>Great start guys, I've added some notes to the task. We may need to make some adjustments to the last couple of items - but no biggie!</p>
                                </div>
                            </div>
                            <span>11:07 PM</span>
                        </div>
                    </div>
                    <div class="date">
                        <hr>
                        <span>Today</span>
                        <hr>
                    </div>
                    <div class="message me">
                        <div class="text-main">
                            <div class="text-group me">
                                <div class="text me">
                                    <p>Well done all. See you all at 2 for the kick-off meeting.</p>
                                </div>
                            </div>
                            <span>10:21 PM</span>
                        </div>
                    </div>
                    <div class="message">
                        <img class="avatar-md" src="./asset/img/avatars/avatar-female-5.jpg" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
                        <div class="text-main">
                            <div class="text-group">
                                <div class="text">
                                    <div class="attachment">
                                        <button class="btn attach"><i class="material-icons md-18">insert_drive_file</i></button>
                                        <div class="file">
                                            <h5><a href="#">Tenacy Agreement.pdf</a></h5>
                                            <span>24kb Document</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span>11:07 PM</span>
                        </div>
                    </div>
                    <div class="message me">
                        <div class="text-main">
                            <div class="text-group me">
                                <div class="text me">
                                    <p>Hope you're all ready to tackle this great project. Let's smash some Brand Concept & Design!</p>
                                </div>
                            </div>
                            <span><i class="material-icons">check</i>10:21 PM</span>
                        </div>
                    </div>
                    <div class="message">
                        <img class="avatar-md" src="./asset/img/avatars/avatar-female-5.jpg" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
                        <div class="text-main">
                            <div class="text-group">
                                <div class="text typing">
                                    <div class="wave">
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-md-12">
                <div class="bottom">
                    <form class="position-relative w-100">
                        <textarea class="form-control" placeholder="Start typing for reply..." rows="1"></textarea>
                        <button class="btn emoticons"><i class="material-icons">insert_emoticon</i></button>
                        <button type="submit" class="btn send"><i class="material-icons">send</i></button>
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
    <div class="call" id="call1">
        <div class="content">
            <div class="container">
                <div class="col-md-12">
                    <div class="inside">
                        <div class="panel">
                            <div class="participant">
                                <img class="avatar-xxl" src="./asset/img/avatars/avatar-female-5.jpg" alt="avatar">
                                <span>Connecting</span>
                            </div>							
                            <div class="options">
                                <button class="btn option"><i class="material-icons md-30">mic</i></button>
                                <button class="btn option"><i class="material-icons md-30">videocam</i></button>
                                <button class="btn option call-end"><i class="material-icons md-30">call_end</i></button>
                                <button class="btn option"><i class="material-icons md-30">person_add</i></button>
                                <button class="btn option"><i class="material-icons md-30">volume_up</i></button>
                            </div>
                            <button class="btn back" name="1"><i class="material-icons md-24">chat</i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Call -->
</div>