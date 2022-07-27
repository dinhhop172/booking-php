<?php session_start(); ?>
<?php 
    include_once __DIR__.'/../../../connect.php';
    include_once __DIR__.'/../../../models/orders/function.php';
    include_once __DIR__.'/../../../models/booking/function.php';
?>
<?php if(isset($_SESSION['user'])){ ?>
    <?php if(isset($_SESSION['success'])) {echo $_SESSION['success'];} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Booking of {<?= $_SESSION['user']['username'] ?>} has email: {<?= $_SESSION['user']['email'] ?>}</h4>
        <a href="../../../index.php">Back</a>
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Room</th>
                        <th>Check in</th>
                        <th>Check out</th>
                        <th>Total day</th>
                        <th>Total price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                        if(isset($_SESSION['user']['id'])){
                            foreach(show_all_booking_of_user($_SESSION['user']['id'], $conn) as $value){
                    ?>
                    <tr>
                        <th scope="row"><?= $i++ ?></th>
                        <td><?= get_room_account_booking($value['room_id'], $conn)['name'] ?></td>
                        <td><?= $value['check_in'] ?></td>
                        <td><?= $value['check_out'] ?></td>
                        <td><?= $value['total_day'] ?></td>
                        <td><?= $value['total_price'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $value['id'] ?>" class="btn btn-info waves-effect waves-light">Edit</a>
                            <a href="../../../controllers/orders/cancel.php?id_booking=<?= $value['id'] ?>&id_room=<?= $value['room_id'] ?>" class="btn btn-danger waves-effect waves-light">Cancel</a>
                        </td>
                    </tr>
                    <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>
<?php if(isset($_SESSION['success'])){ unset($_SESSION['success']) ;} ?>
<?php } ?>