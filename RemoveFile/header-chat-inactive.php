<!-------------------------------- File ko dung toi -->
<!-- ------------------------------------------------------------- -->
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
                <button class="dropdown-item"><i class="material-icons">person_add</i>Add Contact</button>
                ';
            }
            echo "wtf";
        ?>
    </div>
</div>