<?php 
function check_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function show_all_booking($conn){
    $sql = "SELECT b.id, b.account_id, b.room_id, b.check_in, b.check_out, b.total_day, b.total_price, b.status FROM booking b JOIN account a ON b.account_id = a.id WHERE a.roles = 'user'";
    $pre = $conn->prepare($sql);
    $pre->execute();
    $result = $pre->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function get_account_booking($id, $conn){
    $sql = "SELECT * FROM account WHERE id = :account_id";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':account_id', $id, PDO::PARAM_INT);
    $pre->execute();
    $result = $pre->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_room_account_booking($id, $conn){
    $sql = "SELECT * FROM room WHERE id = :room_id";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':room_id', $id, PDO::PARAM_INT);
    $pre->execute();
    $result = $pre->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function edit_booking($id, $conn){
    $sql = "SELECT * FROM booking WHERE id = :id";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':id', $id, PDO::PARAM_INT);
    $pre->execute();
    $result = $pre->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_all_account($conn){
    $sql = "SELECT * FROM account WHERE roles = 'user'";
    $pre = $conn->prepare($sql);
    $pre->execute();
    $result = $pre->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function get_all_room($conn){
    $sql = "SELECT * FROM room";
    $pre = $conn->prepare($sql);
    $pre->execute();
    $result = $pre->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function update_booking($data, $conn){
    $sql = "UPDATE booking SET account_id = :account_id, room_id = :room_id, check_in = :check_in, check_out = :check_out, total_day = :total_day, total_price = :total_price, status = :status WHERE id = :id";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':account_id', $data['account_id'], PDO::PARAM_INT);
    $pre->bindParam(':room_id', $data['room_id'], PDO::PARAM_INT);
    $pre->bindParam(':check_in', $data['check_in'], PDO::PARAM_STR);
    $pre->bindParam(':check_out', $data['check_out'], PDO::PARAM_STR);
    $pre->bindParam(':total_day', $data['total_day'], PDO::PARAM_STR);
    $pre->bindParam(':total_price', $data['total_price'], PDO::PARAM_STR);
    $pre->bindParam(':status', $data['status'], PDO::PARAM_INT);
    $pre->bindParam(':id', $data['id'], PDO::PARAM_INT);
    $pre->execute();
    return $pre;
}
function delete_booking($id, $conn){
    $sql = "DELETE FROM booking WHERE id = :id";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':id', $id, PDO::PARAM_INT);
    $pre->execute();
    return $pre;
}
function book_now($data, $conn){
    $sql = "INSERT INTO `booking`(`account_id`, `room_id`, `check_in`, `check_out`, `total_day`, `total_price`, `status`) VALUES (:account_id, :room_id, :check_in, :check_out, :total_day, :total_price, 1)";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':account_id', $data['account_id'], PDO::PARAM_INT);
    $pre->bindParam(':room_id', $data['room_id'], PDO::PARAM_INT);
    $pre->bindParam(':check_in', $data['check_in'], PDO::PARAM_STR);
    $pre->bindParam(':check_out', $data['check_out'], PDO::PARAM_STR);
    $pre->bindParam(':total_day', $data['total_day'], PDO::PARAM_STR);
    $pre->bindParam(':total_price', $data['total_price'], PDO::PARAM_STR);
    $pre->execute();
    return $pre;
}
function change_status_room($id, $conn){
    $sql = "UPDATE room r JOIN booking bk ON r.id = bk.room_id SET r.status = 1  WHERE bk.id = :id";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':id', $id, PDO::PARAM_INT);
    $pre->execute();
    return $pre;
}
function change_status_room_when_booking($id, $conn){
    $sql = "UPDATE room SET status = 2 WHERE id = :id";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':id', $id, PDO::PARAM_INT);
    $pre->execute();
    return $pre;
}
?>