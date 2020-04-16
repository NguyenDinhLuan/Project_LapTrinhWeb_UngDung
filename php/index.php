<?php
    session_start();
    require_once 'db.php';
    $action = '';
    if(isset($_REQUEST['action']))
        $action = $_REQUEST['action'];
    
    if($action == 'onLogin'){
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        echo json_encode(Db::tonTai_ND($email, $pwd));
    }

    // Log Out
    if($action == 'LogOut'){
        // echo $_COOKIE['maTruyCap'];
        if($_SESSION['maTruyCap']){
            echo json_encode(Db::dangXuat($_SESSION['maTruyCap']));
            // setcookie('maTruyCap', '', time() - (86400 * 30), "/"); // 86400 = 1 day
            unset($_SESSION['maTruyCap']);
            
        }
    }

    if($action == 'danhGia'){
        echo json_encode(Db::danhGiaWebSite($_POST['doHaiLong'], $_POST['gopY'], $_POST['cauHoi'], $_POST['email_sdt_lienhe']));
    }
?>