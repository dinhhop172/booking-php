<?php 
session_start();
if(isset($_SESSION['admin']) || isset($_SESSION['staff'])){
    include_once '../../front_admin/header.php';
    include_once '../../front_admin/sidebar.php';
    include_once '../../front_admin/footer.php';
    include_once '../../../models/users/function.php';
        
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Create new user</h4>
                            <p class="card-title-desc"></p>
                            <form class="custom-validation" method="POST" action="../../../controllers/users/create.php"> 
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" value="<?= isset($_SESSION['data']['username']) ? $_SESSION['data']['username'] : '' ?>" name="username" class="form-control" required placeholder="Type something" />
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <div>
                                        <input type="password" name="password" class="form-control" required placeholder="Password" />
                                    </div>
                                    <?php if(isset($_SESSION['error']['password'])) {?>
                                        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            </button>
                                            <?= $_SESSION['error']['password'] ?>
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <div>
                                        <input type="email" name="email" value="<?= isset($_SESSION['data']['email']) ? $_SESSION['data']['email'] : '' ?>" class="form-control" required parsley-type="email" placeholder="Enter a valid e-mail" />
                                    </div>
                                    <?php if(isset($_SESSION['error']['email'])) {?>
                                        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            </button>
                                            <?= $_SESSION['error']['email'] ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Phone number</label>
                                    <div>
                                        <input value="<?= isset($_SESSION['data']['phone_number']) ? $_SESSION['data']['phone_number'] : '' ?>" type="number" name="phone_number" class="form-control" required placeholder="Phone" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <input type="radio" name="sex" value="male" <?= isset($_SESSION['data']['sex']) == 'male' ? 'checked' : '' ?>> Male &emsp;
                                    <input type="radio" name="sex" value="female" <?= isset($_SESSION['data']['sex']) == 'female' ? 'checked' : '' ?>> Female;
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <div>
                                        <input value="<?= isset($_SESSION['data']['address']) ? $_SESSION['data']['address'] : '' ?>" name="address" type="text" class="form-control" required placeholder="Enter only numbers" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="userpassword">Role</label><br>
                                    <input type="radio" name="roles" value="admin" <?= isset($_SESSION['data']['roles']) == 'admin' ? 'checked' : '' ?>> Admin &emsp;
                                    <input type="radio" name="roles" value="staff" <?= isset($_SESSION['data']['roles']) == 'staff' ? 'checked' : '' ?>> Staff &emsp;
                                    <input type="radio" name="roles" value="user" <?= isset($_SESSION['data']['roles']) == 'user' ? 'checked' : '' ?>> User
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Add" name="createUser" class="form-control" required placeholder="Enter only digits" />
                                </div>
                            </form>
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