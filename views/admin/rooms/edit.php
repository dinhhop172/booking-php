<?php 
session_start();
if(isset($_SESSION['admin']) || isset($_SESSION['staff'])){
    include_once '../../../connect.php';
    include_once '../../front_admin/header.php';
    include_once '../../front_admin/sidebar.php';
    include_once '../../front_admin/footer.php';
    include_once '../../../models/rooms/function.php';


    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $room = edit_room($id, $conn);
        
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit user</h4>
                            <p class="card-title-desc"></p>
                            <?php if($room){ ?>
                            <form class="custom-validation" method="POST" action="../../../controllers/rooms/update.php">
                                <input type="hidden" name="id_room" value="<?= $room['id'] ?>">    
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" value="<?= $room['name'] ?>" name="name" class="form-control" required placeholder="Type something" />
                                    <?php if(isset($_SESSION['error']['name'])){ ?>
                                    <div class="alert alert-danger mb-0" role="alert">
                                        <?= $_SESSION['error']['name'] ?>
                                    </div>  
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <div>
                                        <input value="<?= $room['price'] ?>" name="price" type="text" class="form-control" required placeholder="Enter only numbers" />
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Status</label><br>
                                    <input type="radio" name="status" value="1" <?= ($room['status'] == 1) ? 'checked' : '' ?>> Empty room &emsp;
                                    <input type="radio" name="status" value="2" <?= ($room['status'] == 2) ? 'checked' : '' ?>> Room booked
                                </div> -->
                                <div class="form-group">
                                    <input type="submit" value="Update" name="updateRoom" class="form-control" required placeholder="Enter only digits" />
                                </div>
                            </form>
                            <?php }else{ ?>
                            <div class="alert alert-danger">
                                <strong>Error!</strong> Room not found.
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(isset($_SESSION['error'])){ unset($_SESSION['error']) ;} ?>
<?php if(isset($_SESSION['data'])){ unset($_SESSION['data']) ;} ?>
<?php } ?>
<?php }else{
    header('Location: ../../../index.php');
} ?>