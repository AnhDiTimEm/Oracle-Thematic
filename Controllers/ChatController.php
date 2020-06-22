<?php
    require_once SITE_ROOT."/Daos/RoomDao.php";

    $dao = new UserDao();
    $friendDao = new FriendDao();

    if(($_SESSION['user']) == null){
        header("Location:?signin");
    }
    else if (isset($_GET['account']))
    {
        if ($_GET['account'] === 'avatar')
        {
            $avatar = './Resources/images/avatar'.$_GET['num'].'.jpg';
            $dao->UpdateAvatarUser($_SESSION['user'], $avatar);
            echo "Cập nhật ảnh đại diện thành công! <a href='javascript: history.go(-1)'>Trở lại</a>";
        }
        else if ($_GET['account'] === 'update')
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
    else if (isset($_GET['friend']))
    {
        if ($_GET['friend'] == 'add' && isset($_POST['phoneFriend']))
        {
            $listt = $dao->getAllUserr();
            $phone_B = $_POST['phoneFriend'];
            $phone_A = $_SESSION['user'];
            $check = false;
            if ($phone_A == $phone_B) 
            {
                echo "Không thể tự kết bạn chính mình! <a href='javascript: history.go(-1)'>Trở lại</a>";
            }
            else
            {
                foreach ($listt as $userr)
                {
                    if ($phone_B == $userr->getPhone())
                    {
                        require_once SITE_ROOT."/Entities/Friend.php";
                        $listFriend = $friendDao->GetAllFriend();
                        foreach ($listFriend as $friend)
                        {
                            if ($phone_A == $friend->getPhone_a() && $phone_B == $friend->getPhone_b())
                            {
                                if ($friend->getStatus() == 'accept')
                                {
                                    echo "Đã có trong danh sách bạn bè, không cần thêm bạn lại! <a href='javascript: history.go(-1)'>Trở lại</a>";
                                    $check = true;
                                }
                                else if ($friend->getStatus() == 'waitting')
                                {
                                    echo "Đã gửi lời mời rồi, chờ đối phương trả lời! <a href='javascript: history.go(-1)'>Trở lại</a>";
                                    $check = true;
                                }
                                else if ($friend->getStatus() == 'request' || $friend->getStatus() == 'seen')
                                {   
                                    $friendDao->updateStatusFriend(new Friend($phone_A, $phone_B, 'accept'));
                                    $friendDao->updateStatusFriend(new Friend($phone_B, $phone_A, 'accept'));
                                    echo "Đã chấp nhận kết bạn! <a href='javascript: history.go(-1)'>Trở về trang chủ</a>";
                                    $check = true;
                                }
                                else if ($friend->getStatus() == 'delete')
                                {
                                    $friendDao->updateStatusFriend(new Friend($phone_A, $phone_B, 'waitting'));
                                    $friendDao->updateStatusFriend(new Friend($phone_B, $phone_A, 'request'));
                                    echo "Gửi lời mời thành công! <a href='javascript: history.go(-1)'>Trở về trang chủ</a>";
                                    $check = true;
                                }
                            }
                        }
                        if ($check == false)
                        {
                            $friendDao->AddFriend(new Friend($phone_A, $phone_B, ' '));
                            echo "Gửi lời mời thành công! <a href='javascript: history.go(-1)'>Trở về trang chủ</a>";
                            $check = true;
                        }
                    }
                }
                if ($check == false)
                {
                    echo "Số điện thoại chưa được tạo tài khoản, không thể kết bạn! <a href='javascript: history.go(-1)'>Trở lại</a>";
                    $check = true;
                }
            }
        }
        else if ($_GET['friend'] == 'request')
        {
            if (isset($_POST['accept']))
            {
                $friendDao->updateStatusFriend(new Friend($_SESSION['user'], $_POST['phone_B'], 'accept'));
                $friendDao->updateStatusFriend(new Friend($_POST['phone_B'], $_SESSION['user'], 'accept'));
                echo "Đã chấp nhận kết bạn! <a href='javascript: history.go(-1)'>Trở về trang chủ</a>";
            }
            else if (isset($_POST['cancel']))
            {
                $friendDao->updateStatusFriend(new Friend($_SESSION['user'], $_POST['phone_B'], 'delete'));
                $friendDao->updateStatusFriend(new Friend($_POST['phone_B'], $_SESSION['user'], 'delete'));
                echo "Đã hủy lời mời kết bạn! <a href='javascript: history.go(-1)'>Trở về trang chủ</a>";
            }
        }
    }
    else
    {
        $roomDao = new RoomDao();
        $allRoom = $roomDao->GetAllRoomByPhone($_SESSION['user']);
        $friendDao = new FriendDao();
        $listFriend = $friendDao->GetAllFriend($_SESSION['user']);
        // foreach($listFriend as $f){
        //     echo $f->getStatus();
        // }
        $dao->UpdateStatusUser($_SESSION['user'], 'online');
        $user = $dao->GetUserByPhone($_SESSION['user']);
        $listNotificationForRequest = $friendDao->GetNotificationForRequest($_SESSION['user']);
        require_once SITE_ROOT."/Views/chat.php";
    }
?>