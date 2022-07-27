<?php 
session_start();
if(isset($_SESSION['admin']) || isset($_SESSION['staff'])){
    include_once '../../front_admin/header.php';
    include_once '../../front_admin/sidebar.php';
    include_once '../../front_admin/footer.php';
    include_once '../../../models/users/function.php';


    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $user = edit_user($id);
        
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
                            <?php if($user){ ?>
                            <form class="custom-validation" method="POST" action="../../../controllers/users/update.php">
                                <input type="hidden" name="id_user" value="<?= $user['id'] ?>">    
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" value="<?= $user['username'] ?>" name = "username" class="form-control" required placeholder="Type something" />
                                </div>

                                <div class="form-group">
                                    <label>Equal To</label>
                                    <div>
                                        <input type="password" id="pass2" name="password" class="form-control" required placeholder="Password" />
                                    </div>
                                    <div class="mt-2">
                                        <input type="password" name="re-password" class="form-control" required data-parsley-equalto="#pass2" placeholder="Re-Type Password" />
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
                                        <input type="email" name="email" value="<?= isset($_SESSION['data']['email']) ? $_SESSION['data']['email'] : $user['email'] ?>" class="form-control" required parsley-type="email" placeholder="Enter a valid e-mail" />
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
                                        <input value="<?= isset($_SESSION['data']['phone_number']) ? $_SESSION['data']['phone_number'] : $user['phone_number'] ?>" type="number" name="phone_number" class="form-control" required placeholder="Phone" />
                                    </div>
                                    <?php if(isset($_SESSION['error']['phone_number'])) {?>
                                        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            </button>
                                            <?= $_SESSION['error']['phone_number'] ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <input type="radio" name="sex" value="male" <?= (get_role_by_id($id)['sex'] == 'male' ? 'checked' : '') ?>> Male &emsp;
                                    <input type="radio" name="sex" value="female" <?= (get_role_by_id($id)['sex'] == 'female' ? 'checked' : '') ?>> Female;
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <div>
                                        <input value="<?= $user['address'] ?>" name="address" type="text" class="form-control" required placeholder="Enter only numbers" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="userpassword">Role</label><br>
                                    <input type="radio" name="roles" value="admin" <?= (get_role_by_id($id)['roles'] == 'admin' ? 'checked' : '') ?>> Admin &emsp;
                                    <input type="radio" name="roles" value="staff" <?= (get_role_by_id($id)['roles'] == 'staff' ? 'checked' : '') ?>> Staff &emsp;
                                    <input type="radio" name="roles" value="user" <?= (get_role_by_id($id)['roles'] == 'user' ? 'checked' : '') ?>> User
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Update" name="updateUser" class="form-control" required placeholder="Enter only digits" />
                                </div>
                            </form>
                            <?php }else{ ?>
                            <div class="alert alert-danger">
                                <strong>Error!</strong> User not found.
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