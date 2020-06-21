<?php
    $dao = new UserDao();
    if(($_SESSION['user']) == null){
        header("Location:?signin");
    }
    else if (isset($_GET['account']))
    {
        if ($_GET['account'] === 'update')
        {
            require_once SITE_ROOT."/Entities/Userr.php";
            $USER = new Userr($_SESSION['user'], null);
            $USER->addAll($_SESSION['user'], $_POST['password'], $_POST['email'], $_POST['lastName'], null, null, null);
            $dao->UpdateUser($USER);
            header("Location:?chatpage=1");
        }
        else if ($_GET['account'] === 'delete')
        {
            $dao->UpdateStatusUser($_SESSION['user'], 'delete');
            header("Location:?signin");
        }
    }
    else{
        $dao->UpdateStatusUser($_SESSION['user'], 'online');
        $user = $dao->GetUserByPhone($_SESSION['user']);
        require_once SITE_ROOT."/Views/chat.php";
    }
?>