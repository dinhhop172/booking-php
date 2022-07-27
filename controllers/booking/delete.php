<?php
include_once '../../connect.php';
include_once '../../models/booking/function.php';
session_start();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    if(change_status_room($id, $conn)){
        if(delete_booking($id, $conn)){
            $_SESSION['success'] = '<script>alert("Xóa thành công")</script>';
            return header('Location: ../../views/admin/booking/index.php');
        }
    }else{
        $_SESSION['error'] = '<script>alert("Xóa thất bại")</script>';
        return header('Location: ../../views/admin/booking/index.php');
    }
}
?>