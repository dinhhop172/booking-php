<?php
include_once '../../connect.php';
include_once '../../models/auth/function.php';
session_start();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    if(delete_user($id, $conn)){
        $_SESSION['success'] = '<script>alert("Xóa thành công")</script>';
        return header('Location: ../../views/admin/users/index.php');
    }else{
        $_SESSION['error'] = '<script>alert("Xóa thất bại")</script>';
        return header('Location: ../../views/admin/users/index.php');
    }
}
?>