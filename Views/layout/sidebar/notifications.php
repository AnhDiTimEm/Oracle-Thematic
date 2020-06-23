<div id="notifications" class="tab-pane fade">
    <div class="search">
        <form class="form-inline position-relative">
            <input type="search" class="form-control" id="notice" placeholder="Filter notifications...">
            <button type="button" class="btn btn-link loop"><i class="material-icons filter-list">filter_list</i></button>
        </form>
    </div>
    <div class="list-group sort">
        <!-- <button class="btn filterNotificationsBtn active show" data-toggle="list" data-filter="all">All</button>
        <button class="btn filterNotificationsBtn" data-toggle="list" data-filter="latest">Latest</button>
        <button class="btn filterNotificationsBtn" data-toggle="list" data-filter="oldest">Oldest</button> -->
    </div>						
    <div class="notifications">
        <h1>Notifications</h1>
        <div class="list-group" id="alerts" role="tablist">

        <!-- Auto add 2 notification of ADMIN -->

        <a href="#list-request-1122334455" class="filterNotifications all latest notification" data-toggle="list">
            <img class="avatar-md" src="./Resources/images/avatar19.jpg" data-toggle="tooltip" data-placement="top" title="ADMIN 1" alt="avatar">
            <div class="status">
                <i class="material-icons online">fiber_manual_record</i>
            </div>
            <div class="data">
                <p>You have become friend with the ADMIN 1 of our website.</p>
                <span><?php echo(date("F d, Y h:i:s", time())); ?></span>
            </div>
        </a>

        <a href="#list-request-2233445566" class="filterNotifications all latest notification" data-toggle="list">
            <img class="avatar-md" src="./Resources/images/avatar18.jpg" data-toggle="tooltip" data-placement="top" title="ADMIN 2" alt="avatar">
            <div class="status">
                <i class="material-icons online">fiber_manual_record</i>
            </div>
            <div class="data">
                <p>You have become friend with the ADMIN 2 of our website.</p>
                <span><?php echo(date("F d, Y h:i:s", time())); ?></span>
            </div>
        </a>

        <!-- END OF -->

        <?php 
            foreach ($listNotificationForRequest as $noti1) 
            {
        ?>
            <a href="#list-request-<?php echo $noti1->getPhone(); ?>" class="filterNotifications all latest notification" data-toggle="list">
                <img class="avatar-md" src="<?php echo $noti1->getAvatar(); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo $noti1->getName(); ?>" alt="avatar">
                <div class="status">
                    <i class="material-icons <?php if ($noti1->getStatus() == 'online') echo 'online'; else echo 'offline'; ?>">fiber_manual_record</i>
                </div>
                <div class="data">
                    <p><?php echo $noti1->getName(); ?> has sent you a friend request today.</p>
                    <span><?php echo(date("F d, Y h:i:s", time())); ?></span>
                </div>
            </a>
        <?php } ?>

        </div>
    </div>
</div>