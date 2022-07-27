<?php
include_once '../../connect.php';
include_once '../../models/orders/function.php';
session_start();
if(isset($_GET['id_booking']) && isset($_GET['id_room'])){
    $id_booking = $_GET['id_booking'];
    $id_room = $_GET['id_room'];
    if(update_status_room_when_cancel_booking($id_room, $conn)){
        if(cancel_booking($id_booking, $conn)){
            $_SESSION['success'] = '<script>alert("Xóa thành công")</script>';
            return header('Location: ../../views/user/order/index.php');
        }else{
            $_SESSION['error'] = '<script>alert("Xóa thất bại")</script>';
            return header('Location: ../../views/user/order/index.php');
        }
    }else{
        $_SESSION['error'] = '<script>alert("Xóa thất bại")</script>';
        return header('Location: ../../views/user/order/index.php');
    }
}
?>