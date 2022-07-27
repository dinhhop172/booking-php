<?php 
function show_all_booking_of_user($id, $conn){
    $sql = "SELECT * FROM `booking` WHERE account_id = $id";
    $pre = $conn->prepare($sql);
    $pre->execute();
    $result = $pre->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function cancel_booking($id, $conn){
    $sql = "DELETE FROM booking WHERE id = $id";
    $pre = $conn->prepare($sql);
    $pre->execute();
    return $pre;
}
function update_status_room_when_cancel_booking($id, $conn){
    $sql = "UPDATE room SET status = 1 WHERE id = $id";
    $pre = $conn->prepare($sql);
    $pre->execute();
    return $pre;
}
function get_date_booking_of_user($id, $conn){
    $sql = "SELECT id, check_in, check_out FROM booking WHERE id = :id";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':id', $id, PDO::PARAM_INT);
    $pre->execute();
    $result = $pre->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function update_order_booking($check_in, $check_out, $id, $conn){
    $sql = "UPDATE booking SET check_in = '${check_in}', check_out = '${check_out}' WHERE ('${check_in}' >= CURRENT_DATE) AND ('${check_out}' > '${check_in}') AND id = '{$id}'";
    $pre = $conn->prepare($sql);
    $pre->execute();
    return $pre;
}
function get_price_room($id, $conn){
    $sql = "SELECT price FROM room WHERE id = :id";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':id', $id, PDO::PARAM_INT);
    $pre->execute();
    $result = $pre->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function update_order_booking_two($total_day, $total_price, $id, $conn){
    $sql = "UPDATE booking SET total_day = '${total_day}', total_price = '${total_price}' WHERE id = $id";
    $pre = $conn->prepare($sql);
    $pre->execute();
    return $pre;
}
?>