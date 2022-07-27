<?php 
    include_once '../../../connect.php';

    function count_user(){
        global $conn;
        $sql = "SELECT * FROM account";
        $pre = $conn->prepare($sql);
        $pre->execute();
        $result = $pre->rowCount();
        return $result;
    }

    function tong_doanh_thu(){
        global $conn;
        $sql = "SELECT total_price FROM booking bk
        JOIN room r ON bk.room_id = r.id";
        $pre = $conn->prepare($sql);
        $pre->execute();
        $result = $pre->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function room_booked(){
        global $conn;
        $sql = "SELECT count(*) as sumroombooked FROM room WHERE status = 2";
        $pre = $conn->prepare($sql);
        $pre->execute();
        $result = $pre->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function room_available(){
        global $conn;
        $sql = "SELECT count(*) as sumroomavailable FROM room WHERE status = 1";
        $pre = $conn->prepare($sql);
        $pre->execute();
        $result = $pre->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function average_price(){
        global $conn;
        $sql = "SELECT AVG(total_price) as average_price FROM booking";
        $pre = $conn->prepare($sql);
        $pre->execute();
        $result = $pre->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
?>