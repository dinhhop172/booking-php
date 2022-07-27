<?php 
    include_once '../../connect.php';   
    include_once '../../models/booking/function.php';
    session_start();

    if(isset($_POST['updateBooking'])){
        $data['id'] = isset($_POST['id_booking']) ? check_data($_POST['id_booking']) : '';
        $data['account_id'] = isset($_POST['account_id']) ? check_data($_POST['account_id']) : '';
        $data['room_id'] = isset($_POST['room_id']) ? check_data($_POST['room_id']) : '';
        $data['check_in'] = isset($_POST['check_in']) ? check_data($_POST['check_in']) : '';
        $data['check_out'] = isset($_POST['check_out']) ? check_data($_POST['check_out']) : '';
        $data['total_day'] = isset($_POST['total_day']) ? check_data($_POST['total_day']) : '';
        $data['total_price'] = isset($_POST['total_price']) ? check_data($_POST['total_price']) : '';
        $data['status'] = isset($_POST['status']) ? check_data($_POST['status']) : '';
        if (empty($data['account_id'])){
            $error['account_id'] = 'Bạn chưa chon user';
        }
        if (empty($data['room_id'])){
            $error['room_id'] = 'Bạn chưa nhập phong';
        }
        if (empty($data['check_in'])){
            $error['check_in'] = 'Bạn chưa chon check_in';
        }
        if (empty($data['check_out'])){
            $error['check_out'] = 'Bạn chưa chon check_out';
        }
        if (empty($data['total_day'])){
            $error['total_day'] = 'Bạn chưa chon total_day';
        }
        if (empty($data['total_price'])){
            $error['total_price'] = 'Bạn chưa chon total_price';
        }
        if (empty($data['status'])){
            $error['status'] = 'Bạn chưa chon status';
        }
        if(!$error){
            if(update_booking($data, $conn)){
                $_SESSION['success'] = '<script>alert("Cập nhật thành công")</script>';
                header('location: ../../../views/admin/booking/index.php');
            }else{
                $_SESSION['error'] = '<script>alert("Cập nhật thất bại")</script>';
                header('location: ../../../views/admin/booking/index.php');
            }
        }else{
            $_SESSION['error'] = $error;
            $_SESSION['data'] = $data;
            return header('Location: ../../views/admin/booking/edit.php?id='.$data['id']);
        }
    }else{
        die('update room error');
    }
?>