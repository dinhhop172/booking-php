<?php 
    include_once '../../../connect.php';

    //show all users
    function show_all_users(){
        global $conn;
        $sql = "SELECT * FROM account WHERE roles = 'user' OR roles = 'staff'";
        $pre = $conn->prepare($sql);
        $pre->execute();
        $result = $pre->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function edit_user($id){
        global $conn;
        $sql = "SELECT * FROM account WHERE id = :id AND (roles = 'user' OR roles = 'staff')";
        $pre = $conn->prepare($sql);
        $pre->bindParam(':id', $id, PDO::PARAM_INT);
        $pre->execute();
        $result = $pre->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function check_user_exist(){
        global $conn;
        $sql = "SELECT * FROM account WHERE ";
        $pre = $conn->prepare($sql);
        $pre->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $pre->execute();
        $result = $pre->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function get_role_by_id($id){
        global $conn;
        $sql = "SELECT * FROM account ac WHERE ac.id = :id";
        $pre = $conn->prepare($sql);
        $pre->bindParam(':id', $id, PDO::PARAM_INT);
        $pre->execute();
        $result = $pre->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    
?>