<?php 
session_start();
if(isset($_SESSION['admin']) || isset($_SESSION['staff'])){
    include_once '../../../connect.php';
    include_once '../../front_admin/header.php';
    include_once '../../front_admin/sidebar.php';
    include_once '../../front_admin/footer.php';
    include_once '../../../models/booking/function.php';


    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $booking = edit_booking($id, $conn);
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit booking</h4>
                            <p class="card-title-desc"></p>
                            <?php if($booking){ ?>
                            <form class="custom-validation" method="POST" action="../../../controllers/booking/update.php">
                                <input type="hidden" name="id_booking" value="<?= $booking['id'] ?>">    
                                <div class="form-group">
                                    <label>Account</label>
                                    <select class="form-control" name="account_id">
                                        <option value="">-----Choose a account-----</option>
                                        <?php foreach(get_all_account($conn) as $value) {?>
                                        <option value="<?= $value['id'] ?>" <?= ($value['id'] == $booking['account_id'] ? 'selected' : '') ?>><?= $value['email'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Room</label>
                                    <select class="form-control" name="room_id">
                                        <option value="">-----Choose a room-----</option>
                                        <?php foreach(get_all_room($conn) as $value) {?>
                                        <option value="<?= $value['id'] ?>" <?= ($value['id'] == $booking['room_id'] ? 'selected' : '') ?>><?= $value['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Date Range</label>
                                    <div>
                                        <div class="input-daterange input-group" id="date-range">
                                            <input type="date" value="<?= $booking['check_in'] ?>" class="form-control" name="check_in">
                                            <input type="date" value="<?= $booking['check_out'] ?>" class="form-control" name="check_out">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Total day</label>
                                    <div>
                                        <input value="<?= $booking['total_day'] ?>" name="total_day" type="text" class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Total price</label>
                                    <div>
                                        <input value="<?= $booking['total_price'] ?>" name="total_price" type="text" class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label><br>
                                    <input type="radio" name="status" value="1" <?= ($booking['status'] == 1) ? 'checked' : '' ?>> Schedule &emsp;
                                    <input type="radio" name="status" value="2" <?= ($booking['status'] == 2) ? 'checked' : '' ?>> Delivery &emsp;
                                    <input type="radio" name="status" value="3" <?= ($booking['status'] == 3) ? 'checked' : '' ?>> Done &emsp;
                                    <input type="radio" name="status" value="4" <?= ($booking['status'] == 4) ? 'checked' : '' ?>> Cancel
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Update" name="updateBooking" class="form-control" required placeholder="Enter only digits" />
                                </div>
                            </form>
                            <?php }else{ ?>
                            <div class="alert alert-danger">
                                <strong>Error!</strong> Booking not found.
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // console.log(document.getElementById('check_out').value - document.getElementById('check_in').value);
</script>
<?php if(isset($_SESSION['error'])){ unset($_SESSION['error']) ;} ?>
<?php if(isset($_SESSION['data'])){ unset($_SESSION['data']) ;} ?>
<?php } ?>
<?php }else{
    header('Location: ../../../index.php');
} ?>