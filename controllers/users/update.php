<?php 
    include_once '../../connect.php';   
    include_once '../../models/auth/function.php';
    session_start();

    if(isset($_POST['updateUser'])){
        $data['id'] = isset($_POST['id_user']) ? check_data($_POST['id_user']) : '';
        $data['username'] = isset($_POST['username']) ? check_data($_POST['username']) : '';
        $data['email'] = isset($_POST['email']) ? check_data($_POST['email']) : '';
        $data['password'] = isset($_POST['password']) ? check_data($_POST['password']) : '';
        $data['phone_number'] = isset($_POST['phone_number']) ? check_data($_POST['phone_number']) : '';
        $data['sex'] = isset($_POST['sex']) ? check_data($_POST['sex']) : '';
        $data['address'] = isset($_POST['address']) ? check_data($_POST['address']) : '';
        $data['roles'] = isset($_POST['roles']) ? check_data($_POST['roles']) : '';

        if (empty($data['email'])){
            $error['email'] = 'Bạn chưa nhập email';
        }elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            $error['email'] = 'Email không hợp lệ';
        }
        // elseif(check_user_exist($data['email'], $conn)){
        //     $error['email'] = 'Email đã tồn tại';
        // }
        if (empty($data['password'])){
            $error['password'] = 'Bạn chưa nhập password';
        }elseif($data['password'] != $_POST['re-password']){
            $error['password'] = 'Password không trùng nhau';
        }else{
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        if (empty($data['phone_number'])){
            $error['phone_number'] = 'Bạn chưa nhập so dien thoai';
        }elseif(!preg_match('/^[0-9]{10}+$/', $data['phone_number'])) {
            $error['phone_number'] = 'Số điện thoại không hợp lệ';
        }
        if(!$error){
            if(update_user($data, $conn)){
                $_SESSION['success'] = '<script>alert("Cập nhật thành công")</script>';
                header('location: ../../../views/admin/users/index.php');
            }else{
                $_SESSION['error'] = '<script>alert("Cập nhật thất bại")</script>';
                header('location: ../../../views/admin/users/index.php');
            }
        }else{
            $_SESSION['error'] = $error;
            $_SESSION['data'] = $data;
            return header('Location: ../../views/admin/users/edit.php?id='.$data['id']);
        }
    }else{
        echo 'ko';
    }
?>