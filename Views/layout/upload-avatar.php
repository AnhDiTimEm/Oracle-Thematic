<div class="modal fade" id="uploadAvatar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="requests">
            <div class="title">
                <h1>Choose Avatar</h1>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close"><i class="material-icons">close</i></button>
            </div>
            <div class="content">                
                <div class="form-group">
                    <?php 
                        for ($i = 1; $i <= 20; $i++)
                        {
                    ?>
                    <a href="?chatpage=1&account=avatar&num=<?php echo $i; ?>"><img class="avatar-sm" style="height: 70px; min-width: 70px; max-width: 70px; margin: 8px;" src="./Resources/images/avatar<?php echo $i; ?>.jpg" alt="avatar"></a>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>