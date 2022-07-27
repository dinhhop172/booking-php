<?php session_start();
include_once '../../connect.php';
include_once '../../models/booking/function.php';

if(isset($_POST['account_id']) && isset($_POST['room_id'])){
    $data['account_id'] = $_POST['account_id'];
    $data['room_id'] = $_POST['room_id'];
    if(isset($_POST['book_now'])){
        $data['check_in'] = isset($_POST['check_in']) ? check_data($_POST['check_in']) : '';
        $data['check_out'] = isset($_POST['check_out']) ? check_data($_POST['check_out']) : '';
        (int)$price = isset($_POST['price']) ? check_data($_POST['price']) : null;
        
        $datetime1 = strtotime($data['check_in']);
        $datetime2 = strtotime($data['check_out']);
        
        $secs = $datetime2 - $datetime1;
        $data['total_day'] = $secs / 86400;
        $data['total_price'] = $data['total_day'] * $price;
        if (empty($data['check_in'])){
            $error['check_in'] = 'Bạn chưa chon check_in';
        }
        if (empty($data['check_out'])){
            $error['check_out'] = 'Bạn chưa chon check_out';
        }
        if(!$error){
            if(book_now($data, $conn)){
                if(change_status_room_when_booking($data['room_id'], $conn)){
                    echo '<script>alert("Đặt phòng thành công")</script>';
                    echo '<script>window.location.href = "../../index.php"</script>';
                }
                
            }else{
                echo '<script>alert("Đặt phòng thất bại")</script>';
                echo '<script>window.location.href = "../../index.php"</script>';
            }
        }
    }else{
        echo 'not button booking';
    }
}else{
    echo 'ko co user_id va room_id';
}

?>