<?php
    require_once SITE_ROOT."/Daos/RoomDao.php";

    $dao = new UserDao();
    $friendDao = new FriendDao();
    $roomDao = new RoomDao();

    if(($_SESSION['user']) == null){
        header("Location:?signin");
    }
    else if (isset($_GET['account']))
    {
        if ($_GET['account'] === 'avatar')
        {
            $avatar = './Resources/images/avatar'.$_GET['num'].'.jpg';
            $dao->UpdateAvatarUser($_SESSION['user'], $avatar);
            //echo "Cập nhật ảnh đại diện thành công! <a href='javascript: history.go(-1)'>Trở lại</a>";
            echo "Update your avatar success! <a href='javascript: history.go(-1)'>Go back</a>";
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
                //echo "Không thể tự kết bạn chính mình! <a href='javascript: history.go(-1)'>Trở lại</a>";
                echo "You can not add your self as friend! <a href='javascript: history.go(-1)'>Go back</a>";
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
                                    //echo "Đã có trong danh sách bạn bè, không cần thêm bạn lại! <a href='javascript: history.go(-1)'>Trở lại</a>";
                                    echo "This user has your friend already! <a href='javascript: history.go(-1)'>Go back</a>";
                                    $check = true;
                                }
                                else if ($friend->getStatus() == 'waitting')
                                {
                                    //echo "Đã gửi lời mời rồi, chờ đối phương trả lời! <a href='javascript: history.go(-1)'>Trở lại</a>";
                                    echo "You have sent request to this user alrady, just waiting! <a href='javascript: history.go(-1)'>Go back</a>";
                                    $check = true;
                                }
                                else if ($friend->getStatus() == 'request' || $friend->getStatus() == 'seen')
                                {   
                                    $friendDao->updateStatusFriend(new Friend($phone_A, $phone_B, 'accept'));
                                    $friendDao->updateStatusFriend(new Friend($phone_B, $phone_A, 'accept'));
                                    //echo "Đã chấp nhận kết bạn! <a href='javascript: history.go(-1)'>Trở về trang chủ</a>";
                                    echo "Make friend success! <a href='javascript: history.go(-1)'>Go back</a>";
                                    $check = true;
                                }
                                else if ($friend->getStatus() == 'delete')
                                {
                                    $friendDao->updateStatusFriend(new Friend($phone_A, $phone_B, 'waitting'));
                                    $friendDao->updateStatusFriend(new Friend($phone_B, $phone_A, 'request'));
                                    //echo "Gửi lời mời thành công! <a href='javascript: history.go(-1)'>Trở về trang chủ</a>";
                                    echo "Send request success! <a href='javascript: history.go(-1)'>Go back</a>";
                                    $check = true;
                                }
                            }
                        }
                        if ($check == false)
                        {
                            $friendDao->AddFriend(new Friend($phone_A, $phone_B, ' '));
                            //echo "Gửi lời mời thành công! <a href='javascript: history.go(-1)'>Trở về trang chủ</a>";
                            echo "Send request success! <a href='javascript: history.go(-1)'>Go back</a>";
                            $check = true;
                        }
                    }
                }
                if ($check == false)
                {
                    //echo "Số điện thoại chưa được tạo tài khoản, không thể kết bạn! <a href='javascript: history.go(-1)'>Trở lại</a>";
                    echo "Ivalid phone number, cant send request! <a href='javascript: history.go(-1)'>Go back</a>";
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
                $roomDao->InsertRoom($_SESSION['user'], $_POST['phone_B']);
                //echo "Đã chấp nhận kết bạn! <a href='javascript: history.go(-1)'>Trở về trang chủ</a>";
                echo "Make friend success! <a href='javascript: history.go(-1)'>Go back</a>";
            }
            else if (isset($_POST['cancel']))
            {
                $friendDao->updateStatusFriend(new Friend($_SESSION['user'], $_POST['phone_B'], 'delete'));
                $friendDao->updateStatusFriend(new Friend($_POST['phone_B'], $_SESSION['user'], 'delete'));
                //echo "Đã hủy lời mời kết bạn! <a href='javascript: history.go(-1)'>Trở về trang chủ</a>";
                echo "You just decline the friend request! <a href='javascript: history.go(-1)'>Go back</a>";
            }
        }
        else if ($_GET['friend'] == 'action')
        {
            if (isset($_POST['clear-history']))
            {
                // $friendDao->updateStatusFriend(new Friend($_SESSION['user'], $_POST['phone_B'], 'accept'));
                // $friendDao->updateStatusFriend(new Friend($_POST['phone_B'], $_SESSION['user'], 'accept'));
                // $roomDao->InsertRoom($_SESSION['user'], $_POST['phone_B']);
                if(isset($_GET['room'])){
                    if($_GET['room']!=""){

                    }
                }
                //echo "Đã xóa lịch sử hội thoại! <a href='javascript: history.go(-1)'>Trở về trang chủ</a>";
                echo "History of this chat has been delete! <a href='javascript: history.go(-1)'>Go back</a>";
            }
            else if (isset($_POST['delete']))
            {
                $friendDao->updateStatusFriend(new Friend($_SESSION['user'], $_GET['phone'], 'delete'));
                $friendDao->updateStatusFriend(new Friend($_GET['phone'], $_SESSION['user'], 'delete'));
                $roomDao->DeleteRoom($_GET['chatpage']);
                // $l1 = $roomDao->GetAllRoomDetailByPhone($_SESSION['user']);
                // $l2 = $roomDao->GetAllRoomDetailByPhone($_GET['phone']);
                // $test = false;
                // foreach ($l1 as $r1)
                // {
                //     foreach ($l2 as $r2)
                //     {
                //         if ($r1->getId_room() == $r2->getId_room())
                //         {
                //             $roomDao->DeleteRoom($r1->getId_room());
                //             $test = true;
                //             break;
                //         }
                //     }
                //     if ($test = true) break;
                // }
                echo "Unfriend Success!! <a href='javascript: history.go(-1)'>Back</a>";
            }
        }
    }
    else if(isset($_GET['create'])){
        if(isset($_POST['password'])){
            $roomDao->CreateGroupChat($_SESSION['user'],$_POST['password']);
            echo " Create Group Chat Success <a href='javascript: history.go(-1)'>Go To Chat</a>";
        }
    }
    else if(isset($_GET['addtogroup'])){
        if(isset($_POST['sel1'])){
            $addPhone= $_POST['sel1'];
            $group = $_GET['addtogroup'];
            $memberList = $roomDao->GetAllMemberOfRoom($group);
            $fl = true;
            foreach($memberList as $mem){
                if($mem==$addPhone){
                    $fl=false;
                break;
                }
            }
            if($fl){
                if($roomDao->InsertMemberToGroupChat($addPhone,$group)){
                    echo "Success! <a href='javascript: history.go(-1)'>Back</a>";
                }
                else{
                    echo " Fail to Add Member<a href='javascript: history.go(-1)'>Back</a>";
                }
            }
            else{
                echo " This User has in this group already <a href='javascript: history.go(-1)'>Back</a>";
            }
        }
        else{
            echo " Fail to Add Member <a href='javascript: history.go(-1)'>Back</a>";
        }
    }
    else if(isset($_GET['group'])){
        if(isset($_POST['clear-history'])){
            echo "clear history";
        }
        else if(isset($_POST['leave-group'])){
            $roomDao->LeaveGroup($_GET['group']);
            echo "Leave group success! <a href='javascript: history.go(-1)'>Back</a>";
        }
        else{
            header("Location:./Views/error.php");
        }
    }
    else
    {
        $allRoom = $roomDao->GetAllRoomByPhone($_SESSION['user']);
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