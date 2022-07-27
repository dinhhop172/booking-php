<?php
    include_once '../../connect.php';
    include_once '../../models/auth/function.php';
    session_start();

    if(!empty($_GET['email']) && !empty($_GET['token'])){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $now = strtotime(date('Y-m-d H:i:s'));
        $code = $_GET['token'];
        $token = pack("H*",($code));
        $data = explode('_', $token);
        $data['email'] = isset($_GET['email']) ? check_data($_GET['email']) : '';
        $data['verification_code'] = isset($_GET['token']) ? check_data($_GET['token']) : '';
        $expire = $data[1] + 86400;
        if($now < $expire){
            if(verify_email_user($data, $conn)){
                $_SESSION['success'] = '<script>alert("Email đã được xác thực")</script>';
                return header('Location: ../../views/auth/login.php');
            }
        }else{
            die('Het thoi gian xac thuc email');
        }
    }
?>