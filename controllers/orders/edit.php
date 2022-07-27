<?php
include_once '../../connect.php';
include_once '../../models/orders/function.php';
include_once '../../models/booking/function.php';

    if(isset($_POST['update_booking_user'])){
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $check_in = isset($_POST['check_in']) ? $_POST['check_in'] : '';
        $check_out = isset($_POST['check_out']) ? $_POST['check_out'] : '';

        if(update_order_booking($check_in, $check_out, $id, $conn)){
            $data_by_id = edit_booking($id, $conn);
            
            $data['check_in'] = strtotime($data_by_id['check_in']);
            $data['check_out'] = strtotime($data_by_id['check_out']);
            (int)$data['price'] = get_price_room($data_by_id['room_id'], $conn)['price'];
            
            $secs = $data['check_out'] - $data['check_in'];
            $data['total_day'] = $secs / 86400;
            $data['total_price'] = $data['total_day'] * $data['price'];
            // var_dump($data);exit;
            if(update_order_booking_two($data['total_day'], $data['total_price'], $id, $conn)){
                echo '<script>alert("Update thanh cong")</script>';
                echo '<script>window.location.href = "../../views/user/order/index.php"</script>';
            }

        }else{
            echo '<script>alert("Update that bai")</script>';
            echo '<script>window.location.href = "../../views/user/order/index.php"</script>';
        }
        
    }
?>