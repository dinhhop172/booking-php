<?php session_start();
    include_once '../../connect.php';   
    include_once '../../models/auth/function.php';
    include_once 'sendmail.php';
    
    $verification_code = 'user';
    if(isset($_POST['register'])) {

            $data['username'] =  check_data($_POST['username']);
            $data['email'] = isset($_POST['email']) ? check_data($_POST['email']) : $_SESSION['error']['email'] = 'Email khong hop le';
            $data['password'] = isset($_POST['password']) ? check_data($_POST['password']) : '';
            $data['phone_number'] = check_data($_POST['phone_number']);
            $data['sex'] = check_data($_POST['sex']);
            $data['address'] = check_data($_POST['address']);
            $token = md5($data['email']).rand(10,9999);
            $_COOKIE[$verification_code] = $token;
            $data['verification_code'] = $_COOKIE[$verification_code];

            if (empty($data['username'])){
                $error['username'] = 'Bạn chưa nhập tên';
            }
            if (empty($data['email'])){
                $error['email'] = 'Bạn chưa nhập email';
            }elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $error['email'] = 'Email không hợp lệ';
            }
            if (empty($data['password'])){
                $error['password'] = 'Bạn chưa nhập password';
            }
            if (empty($data['phone_number'])){
                $error['phone_number'] = 'Bạn chưa nhập so dien thoai';
            }elseif(!preg_match('/^[0-9]{10}+$/', $data['phone_number'])) {
                $error['phone_number'] = 'Số điện thoại không hợp lệ';
            }
            if (empty($data['sex'])){
                $error['sex'] = 'Bạn chưa nhập sex';
            }
            if (empty($data['address'])){
                $error['address'] = 'Bạn chưa nhập address';
            }
            
            if (!$error){
                if(!check_user_exist($data['email'], $conn)){
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    if(regester($data, $conn)){
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $now = date("Y-m-d H:i:s");
                        $number_time_now = strtotime($now);
                        $last_id = $conn->lastInsertId();
                        $code = bin2hex($last_id . '_' . $number_time_now);
                        $body = '<p>Vui lòng click vào <a href="http://ql-booking.com/controllers/auth/email_verification_user.php?email='.$data['email'].'&token='.$code.'">đây</a> để xác thực, email này chỉ có giá trị đến 24 tiếng sau.</p>';
                        
                        $send = new Sendmail();
                        $send->sendtoemail($data['email'], $data['username'], $body);

                        $_SESSION['success'] = '<script>alert("Đăng ký thành công, vui lòng kiểm tra email để xác thực")</script>';
                                
                        return header('Location: ../../views/auth/login.php');
                    }else{
                        $_SESSION['error']['error'] = 'Dang ky that bai';
                        return header('Location: ../../views/auth/register.php');
                    }
                }else{
                    $_SESSION['error']['email'] = 'Email da ton tai';
                    $_SESSION['data'] = $data;
                    return header('Location: ../../views/auth/register.php');
                }
            } else {
                $_SESSION['error'] = $error;
                $_SESSION['data'] = $data;
                return header('Location: ../../views/auth/register.php');
            }
    }else{
        $_SESSION['error']['post'] = 'Không thể đăng ký, vui lòng thử lại sau';
    }

   
?>