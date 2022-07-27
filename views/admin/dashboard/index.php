<?php 
include_once '../../../connect.php';
include_once '../../../models/auth/function.php';
session_start();

if(isset($_SESSION['admin'])){
    if((check_verify_null($_SESSION['admin']['email'], $conn) != null) && $_SESSION['admin']['email_verified_at'] != null){
        include_once '../../../models/dashboard/function.php';
        include_once '../../front_admin/header.php';
        include_once '../../front_admin/sidebar.php';
        include_once '../../front_admin/main-content.php';
        include_once '../../front_admin/footer.php';
    
    }else{
        return header('Location: ../../../controllers/auth/email_verification_admin.php?email='.$_SESSION['admin']['email']);
    }
}elseif(isset($_SESSION['staff'])){
    include_once '../../../models/dashboard/function.php';
    include_once '../../front_admin/header.php';
    include_once '../../front_admin/sidebar.php';
    include_once '../../front_admin/main-content.php';
    include_once '../../front_admin/footer.php';
}else{
    header('Location: ../../../index.php');
}
// if(isset($_SESSION['staff'])){
//     include_once '../../../models/dashboard/function.php';
//     include_once '../../front_admin/header.php';
//     include_once '../../front_admin/sidebar.php';
//     include_once '../../front_admin/main-content.php';
//     include_once '../../front_admin/footer.php';
// }else{
//     header('Location: ../../../index.php');
// }
?>
<!-- || isset($_SESSION['staff']) -->

