<?php 
    include_once '../../connect.php';
    include_once '../../models/auth/function.php';
    session_start();
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
        return header('Location: ../../index.php');
    }elseif(isset($_SESSION['staff'])){
        unset($_SESSION['staff']);
        return header('Location: ../../index.php');
    }elseif(isset($_SESSION['admin'])){
        if(check_verify_null($_SESSION['admin']['email'],$conn)['email_verified_at'] != null){
            delete_verified_at($_SESSION['admin']['email'], $conn);
        }
        unset($_SESSION['admin']);
        return header('Location: ../../index.php');
        // var_dump(check_verify_null($_SESSION['admin']['email'], $conn)); exit;
        // echo check_verify_null($_SESSION['admin']['email'],$conn)['email_verified_at'] == null ? 'ok no nulkl' : 'no ko null';
       
    }
?>