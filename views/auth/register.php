<?php session_start(); ?>
<?php 
if(isset($_SESSION['admin']) || isset($_SESSION['staff'])){ 
    header('Location: ../admin/dashboard/index.php');
}else{ 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Register | Lexa - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico"> 
    
    <!-- Bootstrap Css -->
    <link href="../../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="../../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="../../assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <h3 class="text-center mt-4">
                                <a href="index.html" class="logo logo-admin"><img src="../../assets/images/logo-dark.png"
                                        height="30" alt="logo"></a>
                            </h3>
                            <div class="p-3">
                                <h4 class="text-muted font-size-18 mb-1 text-center">Free Register</h4>
                                <p class="text-muted text-center">Get your free Lexa account now.</p>
                                <form class="form-horizontal mt-4" action="../../controllers/auth/handleRegister.php" method="post">

                                    <div class="form-group">
                                        <label for="useremail">Email</label>
                                        <input type="text" name="email" class="form-control" value="<?= isset($_SESSION['data']['email']) ? $_SESSION['data']['email'] : ''; ?>" placeholder="Enter email">
                                        <?php if(isset($_SESSION['error']['email'])) {?>
                                        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <?= $_SESSION['error']['email'] ?>
                                        </div>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control" value="<?= isset($_SESSION['data']['username']) ? $_SESSION['data']['username'] : ''; ?>" placeholder="Enter username">
                                        <?php if(isset($_SESSION['error']['username'])) {?>
                                        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <?= $_SESSION['error']['username'] ?>
                                        </div>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Enter password">
                                        <?php if(isset($_SESSION['error']['password'])) {?>
                                        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <?= $_SESSION['error']['password'] ?>
                                        </div>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">Phone number</label>
                                        <input type="number" name="phone_number" class="form-control" value="<?= isset($_SESSION['data']['phone_number']) ? $_SESSION['data']['phone_number'] : ''; ?>" placeholder="Enter phone number">
                                        <?php if(isset($_SESSION['error']['phone_number'])) {?>
                                        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <?= $_SESSION['error']['phone_number'] ?>
                                        </div>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">Gender</label><br>
                                        <input type="radio" name="sex" value="male" checked/>Male
                                        <input type="radio" name="sex" value="female"/>Female
                                        <?php if(isset($_SESSION['error']['sex'])) {?>
                                        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <?= $_SESSION['error']['sex'] ?>
                                        </div>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">Address</label>
                                        <input type="text" name="address" class="form-control" value="<?= isset($_SESSION['data']['address']) ? $_SESSION['data']['address'] : ''; ?>" placeholder="Enter address">
                                        <?php if(isset($_SESSION['error']['address'])) {?>
                                        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <?= $_SESSION['error']['address'] ?>
                                        </div>
                                        <?php } ?>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <div class="col-12 text-right">
                                            <input class="btn btn-primary w-md waves-effect waves-light" value="Register" name="register" type="submit" />
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-4">
                                            <p class="text-muted mb-0 font-size-14">By registering you agree to the Lexa <a href="#" class="text-primary">Terms of Use</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Already have an account ? <a href="./login.php" class="text-primary"> Login </a> </p>
                        <p>© 2018 - 2020 Lexa. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="../../assets/libs/jquery/jquery.min.js"></script>
    <script src="../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="../../assets/libs/simplebar/simplebar.min.js"></script>
    <script src="../../assets/libs/node-waves/waves.min.js"></script>
    <script src="../../assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- App js -->
    <script src="../../assets/js/app.js"></script>
</body>

</html>
<?php if(isset($_SESSION['error'])){ unset($_SESSION['error']) ;} ?>
<?php if(isset($_SESSION['data'])){ unset($_SESSION['data']) ;} ?>
<?php } ?>