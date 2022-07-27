<?php 
    include_once '../../connect.php';   
    include_once '../../models/rooms/function.php';
    session_start();

    if(isset($_POST['createRoom'])){
        $data['name'] = isset($_POST['name']) ? check_data($_POST['name']) : '';
        $data['price'] = isset($_POST['price']) ? check_data($_POST['price']) : '';

        if (empty($data['name'])){
            $error['name'] = "Bạn chưa nhập name";
        }else{
            $check_name = check_name_exist_create($data['name'], $conn);
            if($check_name){
                $error['name'] = "Tên phòng đã tồn tại";
            }
        }
        if (empty($data['price'])){
            $error['price'] = 'Bạn chưa nhập price';
        }
        if(!$error){
            if(create_room($data, $conn)){
                $_SESSION['success'] = '<script>alert("Tao room thành công")</script>';
                header('location: ../../../views/admin/rooms/index.php');
            }else{
                $_SESSION['error'] = '<script>alert("Tao room thất bại")</script>';
                header('location: ../../../views/admin/rooms/index.php');
            }
        }else{
            $_SESSION['error'] = $error;
            $_SESSION['data'] = $data;
            return header('Location: ../../views/admin/rooms/create.php');
        }
    }else{
        die('Create room error');
    }
?>