<?php
require_once('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- font font-awesome -->
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>" />
</head>

<body>
    <div class="content-login-form">
        <form id="form-register" class="form-login px-3 py-4" action="register_submit.php" method="post">

            <h1 class="title-login text-center text-uppercase position-relative pb-4">
                Register
                <?php
                if (isset($_GET['ton_tai']) && $_GET['ton_tai'] == 1) {
                    echo '<span class="error-text fs-6">Tài khoản đã tồn tại!!</span>';
                }
                ?>
            </h1>

            <div class="user-name mb-3">
                <label for="">User Name</label>
                <input class="data-login data-name" type="text" name="name" value="">
            </div>
            <div class="user-email mb-3">
                <label for="">Email</label>
                <input class="data-login data-name" type="email" name="email" value="">
            </div>
            <div class="user-password mb-3">
                <label for="">Password</label>
                <input class="data-login data-password" id="input-password" type="password" name="password" value="">
                <span class="eye" onclick="myFunction()">
                    <i class="fas fa-eye eye__1"></i>
                    <i class="fas fa-eye-slash eye__2 d-none"></i>
                </span>
            </div>
            <div class="user-password mb-3">
                <label for="">Re-Password</label>
                <input class="data-login data-re-password" id="re-password" type="password" name="re-password" value="">
                <span class="eye2" onclick="myFunction2()">
                    <i class="fas fa-eye re-eye__1"></i>
                    <i class="fas fa-eye-slash re-eye__2 d-none"></i>
                </span>
            </div>

            <button class="btn btn-register" name="register" type="submit">Register <i class="fas fa-sign-in-alt"></i></button>

            <div class="text-login my-3 text-center">
                <span class="text-login-account px-2">Register with social accounts</span>
            </div>

            <div class="d-flex justify-content-center">
                <a href="#" class="login-social-network login-fb">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="login-social-network login-google">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#" class="login-social-network login-github">
                    <i class="fab fa-github"></i>
                </a>
            </div>

            <div class="not-account text-center">
                <span class="text-not-account">
                    Don't have an account?
                    <a href="login.php" class="sing-up"> Log-in</a>
                </span>
            </div>
        </form>
    </div>

    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="js/app.js?v=<?php echo time(); ?>"></script>
</body>

</html>