<?php 
function check_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function regester($data, $conn) {
    $sql = "INSERT INTO account (username, password, email, phone_number, sex, address, verification_code, status) VALUES (:username, :password, :email, :phone_number, :sex, :address, :verification_code, 0)";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':username', $data['username'], PDO::PARAM_STR);
    $pre->bindParam(':password', $data['password'], PDO::PARAM_STR);
    $pre->bindParam(':email', $data['email'], PDO::PARAM_STR);
    $pre->bindParam(':phone_number', $data['phone_number'], PDO::PARAM_INT);
    $pre->bindParam(':sex', $data['sex'], PDO::PARAM_STR);
    $pre->bindParam(':address', $data['address'], PDO::PARAM_STR);
    $pre->bindParam(':verification_code', $data['verification_code'], PDO::PARAM_STR);
    return $pre->execute();
}
function check_user_exist($email, $conn){
    $sql = "SELECT * FROM account WHERE email = ?";
    $pre = $conn->prepare($sql);
    $pre->bindParam('1', $email, PDO::PARAM_STR);
    $pre->execute();
    $result = $pre->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function set_verify_code_admin($data, $conn){
    $sql = "UPDATE account SET verification_code = :verification_code WHERE email = :email";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':email', $data['email'], PDO::PARAM_STR);
    $pre->bindParam(':verification_code', $data['verification_code'], PDO::PARAM_STR);
    return $pre->execute();
}
function verify_email($mail, $code, $conn){
    $sql = "UPDATE account SET email_verified_at = NOW(), status = 1 WHERE email = '${mail}' AND verification_code = ${code}";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':email', $mail, PDO::PARAM_STR);
    $pre->bindParam(':verification_code', $code, PDO::PARAM_STR);
    return $pre->execute();
}
function delete_verified_at($email, $conn){
    $sql = "UPDATE account SET email_verified_at = NULL WHERE email = '${email}'";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':email', $email, PDO::PARAM_STR);
    return $pre->execute();

}
function check_verify_null($email, $conn){
    $sql = "SELECT account.email_verified_at FROM account WHERE email = '${email}'";
    $pre = $conn->prepare($sql);
    $pre->execute();
    $result = $pre->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_data_now($email, $conn){
    $sql = "SELECT * FROM account WHERE email = '${email}'";
    $pre = $conn->prepare($sql);
    $pre->execute();
    $result = $pre->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function check_verify_email($data, $conn){
    $sql = "SELECT * FROM account WHERE email = :email AND verification_code = :verification_code";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':email', $data['email'], PDO::PARAM_STR);
    $pre->bindParam(':verification_code', $data['verification_code'], PDO::PARAM_STR);
    $pre->execute();
    $result = $pre->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function verify_email_user($data, $conn){
    $sql = "UPDATE account SET email_verified_at = NOW(), status = 1 WHERE email = :email";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':email', $data['email'], PDO::PARAM_STR);
    // $pre->bindParam(':verification_code', $data['verification_code'], PDO::PARAM_STR);
    return $pre->execute();
}
function update_user($data, $conn){
    $sql = "UPDATE account SET username = :username, email = :email, password = :password, phone_number = :phone_number, sex = :sex, address = :address, roles = :roles WHERE id = :id AND (roles= 'user' OR roles = 'staff')";
    $pre = $conn->prepare($sql);
    $pre->bindParam(':username', $data['username'], PDO::PARAM_STR);
    $pre->bindParam(':email', $data['email'], PDO::PARAM_STR);
    $pre->bindParam(':password', $data['password'], PDO::PARAM_STR);
    $pre->bindParam(':phone_number', $data['phone_number'], PDO::PARAM_STR);
    $pre->bindParam(':sex', $data['sex'], PDO::PARAM_STR);
    $pre->bindParam(':address', $data['address'], PDO::PARAM_STR);
    $pre->bindParam(':roles', $data['roles'], PDO::PARAM_STR);
    $pre->bindParam(':id', $data['id'], PDO::PARAM_INT);
    return $pre->execute();
}
function delete_user($id, $conn){
    $sql = "DELETE FROM account WHERE id = :id";
    $pre = $conn->prepare($sql);
    $pre->bindParam(":id", $id);
    return $pre->execute();
}
function create_new_user($data,  $conn){
    $verification_code = md5($data['email']).rand(10,9999);
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $current_time = date("Y-m-d H:i:s");
    $sql ="INSERT INTO `account` (`username`, `password`, `email`, `phone_number`, `sex`, `address`, `roles`, `verification_code`, `email_verified_at`, `status`) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $pre = $conn->prepare($sql);
    return $pre->execute([$data['username'], $data['password'], $data['email'],$data['phone_number'],$data['sex'], $data['address'], $data['roles'], $verification_code, $current_time, 1]);
}
?>