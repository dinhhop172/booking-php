<?php
function check_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function show_all_rooms($conn){
    $sql = "SELECT * FROM room";
    $pre = $conn->prepare($sql);
    $pre->execute();
    $result = $pre->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function edit_room($id, $conn){
    $sql = "SELECT * FROM room WHERE id = :id";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':id', $id, PDO::PARAM_INT);
    $pre->execute();
    $result = $pre->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function update_room($data, $conn){
    $sql = "UPDATE room SET name = :name, price = :price WHERE id = :id";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':name', $data['name'], PDO::PARAM_STR);
    $pre->bindParam(':price', $data['price'], PDO::PARAM_INT);
    $pre->bindParam(':id', $data['id'], PDO::PARAM_INT);
    $pre->execute();
    return $pre;
}
function delete_room($id, $conn){
    $sql = "DELETE FROM room WHERE id = :id";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':id', $id, PDO::PARAM_INT);
    $pre->execute();
    return $pre;
}
function create_room($data, $conn){
    $sql = "INSERT INTO room (name, price, status) VALUES (:name, :price, 1)";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':name', $data['name'], PDO::PARAM_STR);
    $pre->bindParam(':price', $data['price'], PDO::PARAM_INT);
    $pre->execute();
    return $pre;
}
function get_room_by_id($id, $conn){
    $sql = "SELECT * FROM room WHERE id = :id";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':id', $id, PDO::PARAM_INT);
    $pre->execute();
    $result = $pre->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_user_by_id($id, $conn){
    $sql = "SELECT account.id FROM account WHERE id = :id";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':id', $id, PDO::PARAM_INT);
    $pre->execute();
    $result = $pre->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function check_name_exist_update($name, $id, $conn){
    $sql = "SELECT * FROM room WHERE name = :name AND id != :id";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':name', $name, PDO::PARAM_STR);
    $pre->bindParam(':id', $id, PDO::PARAM_INT);
    $pre->execute();
    $result = $pre->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function check_name_exist_create($name, $conn){
    $sql = "SELECT * FROM room WHERE name = :name";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':name', $name, PDO::PARAM_STR);
    $pre->execute();
    $result = $pre->fetch(PDO::FETCH_ASSOC);
    return $result;
}

?>