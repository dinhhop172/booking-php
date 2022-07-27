<?php
    include_once '../../connect.php';
    include_once '../../models/auth/function.php';

    session_start();
    // if((check_verify_null($_SESSION['admin']['email'], $conn) == null)){
        if(isset($_POST['verify_email'])){
            $data['email'] = isset($_POST['email']) ? check_data($_POST['email']) : '';
            $data['verification_code'] = isset($_POST['verification_code']) ? check_data($_POST['verification_code']) : '';

            if(verify_email($data['email'], $data['verification_code'], $conn)){
                $_SESSION['admin'] = get_data_now($data['email'], $conn);
                return header('Location: ../../views/admin/dashboard/index.php');
            }else{
                return header('Location: email_verification_admin.php?email='.$data['email']);
            }
        }
?>
<form action="" method="POST">
    <input type="hidden" name="email" value="<?= $_GET['email']; ?>" required>
    <input type="text" name="verification_code" placeholder="Enter verification code" required>
    <input type="submit" name="verify_email" value="Verify Email">
</form>
