
<?php session_start(); ?>
<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
<link href='' rel='stylesheet'>

<style>
/* body {
    background-image: linear-gradient(to right, #7B1FA2, #E91E63) */
/* } */

.section {
    position: relative;
    height: 100vh;
}

.section .section-center {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
}

#booking {
    font-family: 'Raleway', sans-serif;
}

.booking-form {
    position: relative;
    max-width: 642px;
    width: 100%;
    margin: auto;
    padding: 40px;
    overflow: hidden;
    background-image: url('https://noithatmanhhe.vn/media/20558/4-noi-that-phong-ngu-be-trai-mau-xanh-noi-that-manh-he.jpg?width=700&height=560');
    background-size: cover;
    border-radius: 5px;
    z-index: 20;
}

.booking-form::before {
    content: '';
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    top: 0;
    background: rgba(0, 0, 0, 0.7);
    z-index: -1;
}

.booking-form .form-header {
    text-align: center;
    position: relative;
    margin-bottom: 30px;
}

.booking-form .form-header h1 {
    font-weight: 700;
    text-transform: capitalize;
    font-size: 42px;
    margin: 0px;
    color: #c39000;
}

.booking-form .form-group {
    position: relative;
    margin-bottom: 30px;
}

.booking-form .form-control {
    background-color: rgba(255, 255, 255, 0.2);
    height: 60px;
    padding: 0px 25px;
    border: none;
    border-radius: 40px;
    color: #fff;
    -webkit-box-shadow: 0px 0px 0px 2px transparent;
    box-shadow: 0px 0px 0px 2px transparent;
    -webkit-transition: 0.2s;
    transition: 0.2s;
}

.booking-form .form-control::-webkit-input-placeholder {
    color: rgba(255, 255, 255, 0.5);
}

.booking-form .form-control:-ms-input-placeholder {
    color: rgba(255, 255, 255, 0.5);
}

.booking-form .form-control::placeholder {
    color: rgba(255, 255, 255, 0.5);
}

.booking-form .form-control:focus {
    -webkit-box-shadow: 0px 0px 0px 2px #ff8846;
    box-shadow: 0px 0px 0px 2px #ff8846;
}

.booking-form input[type="date"].form-control {
    padding-top: 16px;
}

.booking-form input[type="date"].form-control:invalid {
    color: rgba(255, 255, 255, 0.5);
}

.booking-form input[type="date"].form-control+.form-label {
    opacity: 1;
    top: 10px;
}

.booking-form select.form-control {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}

.booking-form select.form-control:invalid {
    color: rgba(255, 255, 255, 0.5);
}

.booking-form select.form-control+.select-arrow {
    position: absolute;
    right: 15px;
    top: 50%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    width: 32px;
    line-height: 32px;
    height: 32px;
    text-align: center;
    pointer-events: none;
    color: rgba(255, 255, 255, 0.5);
    font-size: 14px;
}

.booking-form select.form-control+.select-arrow:after {
    content: '\279C';
    display: block;
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
}

.booking-form select.form-control option {
    color: #000;
}

.booking-form .form-label {
    position: absolute;
    top: -10px;
    left: 25px;
    opacity: 0;
    color: #000000;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.3px;
    height: 15px;
    line-height: 15px;
    -webkit-transition: 0.2s all;
    transition: 0.2s all;
}

.booking-form .form-group.input-not-empty .form-control {
    padding-top: 16px;
}

.booking-form .form-group.input-not-empty .form-label {
    opacity: 1;
    top: 10px;
}

.booking-form .submit-btn {
    color: #fff;
    background-color: #1c2f4a;
    font-weight: 700;
    height: 60px;
    padding: 10px 30px;
    width: 100%;
    border-radius: 40px;
    border: none;
    text-transform: uppercase;
    font-size: 16px;
    letter-spacing: 1.3px;
    -webkit-transition: 0.2s all;
    transition: 0.2s all;
    text-align: center;
}

.booking-form .submit-btn:hover,
.booking-form .submit-btn:focus {
    opacity: 0.9;
}
</style>
<?php 
    include_once 'connect.php';
    include_once 'models/rooms/function.php';
?>

<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
<script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js'></script>
<?php 
if(isset($_SESSION['user'])){
        if(isset($_GET['room_id']) && isset($_GET['user_id'])){
            $user_id = $_GET['user_id'];
            // var_dump((get_user_by_id($user_id, $conn)));exit;
            if((get_user_by_id($user_id, $conn)['id']) == $_SESSION['user']['id']){
                $id = $_GET['room_id'];
                $room = get_room_by_id($id, $conn);
                if($room && $room['status'] == 1){
?>
<div id="booking" class="section">
    <div class="section-center">
        <div class="container">
            <div class="row">
                <div class="booking-form">
                    <div class="form-header">
                        <h1>Make your reservation</h1>
                    </div>
                    <form action="controllers/booking/booking.php" method="POST">
                        <input type="hidden" name="room_id" value="<?= $room['id'] ?>">
                        <input type="hidden" name="account_id" value="<?= $_SESSION['user']['id'] ?>">
                        <div class="form-group">
                            <input class="form-control" name="username" disabled value="<?= isset($_SESSION['user']) ? $_SESSION['user']['username'] : '' ?>" type="text" placeholder="User">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" disabled name="name" value="<?= $room['name'] ?>" type="text" placeholder="Room">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" name="price" value="<?= $room['price'] ?>" type="text" placeholder="Price">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" name="check_in" type="date" required>
                                    <span class="form-label">Check In</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" name="check_out" type="date" required>
                                    <span class="form-label">Check out</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" disabled value="<?= isset($_SESSION['user']) ? $_SESSION['user']['email'] : '' ?>" type="email" placeholder="Enter your Email">
                                    <span class="form-label">Email</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" disabled value="<?= isset($_SESSION['user']) ? $_SESSION['user']['phone_number'] : '' ?>" type="tel" placeholder="Enter you Phone">
                                    <span class="form-label">Phone</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-btn">
                            <input class="submit-btn" name="book_now" type="submit" value="Book Now"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
<?php }else{
    echo '<script>alert("Phòng không tồn tại hoặc đã được book")</script>';
    echo '<script>window.location.href = "index.php"</script>';
}}else{
    echo '<script>alert("Người dùng không chính xác")</script>';
    echo '<script>window.location.href = "index.php"</script>';
}}else{
    echo '<script>alert("Phòng không tồn tại hoặc đã được book")</script>';
    echo '<script>window.location.href = "index.php"</script>';
}}else{
    echo '<script>alert("Vui lòng đăng nhập để booking")</script>';
    echo '<script>window.location.href = "index.php"</script>';
} ?>
<!-- <a target="_blank" href="https://gosnippets.com" class="white-mode">MORE</a> -->