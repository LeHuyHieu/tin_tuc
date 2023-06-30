<?php
require_once('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <!-- font font-awesome -->
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>" />
</head>

<body>
    <div class="content-login-form">
        <?php
        session_start();

        if (isset($_SESSION['email'])) {
            header('location:index_admin.php');
        }

        if (isset($_POST['sing-in'])) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $leves = 1;
            $sql = "SELECT email,password,leves FROM users WHERE email = '$email' and password = '$password' and leves = '$leves'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0 && $leves == 1) {
                $_SESSION['email'] = $email;
                header('location:index_admin.php');
            } else {
                echo '<span class="error-text">Tài khoản hoặc mật khẩu sai!!!</span>';
            }
        }
        if (isset($_POST['sing-in'])) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $leves = 2;
            $sql = "SELECT email,password,leves FROM users WHERE email = '$email' and password = '$password' and leves = '$leves'";
            $result = mysqli_query($conn, $sql);
            // print_r($sql);die;

            if (mysqli_num_rows($result) > 0 && $leves == 2) {
                $_SESSION['email'] = $email;
                header('location:user.php');
            } else {
                echo '<span class="error-text">Tài khoản hoặc mật khẩu sai!!!</span>';
            }
        }
        if (isset($_POST['sing-in'])) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $leves = 0;
            $sql = "SELECT email,password,leves FROM users WHERE email = '$email' and password = '$password' and leves = '$leves'";
            $result = mysqli_query($conn, $sql);
            // print_r($sql);die;

            if (mysqli_num_rows($result) > 0 && $leves == 0) {
                $_SESSION['email'] = $email;
                header('location:index.php');
            } else {
                echo '<span class="error-text">Tài khoản hoặc mật khẩu sai!!!</span>';
            }
        }
        ?>
        <form id="form-login" class="form-login px-3 py-4" action="login.php" method="post">
            <h1 class="title-login text-center text-uppercase pb-4">
                Log In
            </h1>

            <div class="user-name mb-3">
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

            <button class="btn btn-login" name="sing-in" type="submit">Sing In <i class="fas fa-sign-in-alt"></i></button>

            <div class="text-login my-3 text-center">
                <span class="text-login-account px-2">Login with social accounts</span>
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
                    <a href="register.php" class="sing-up"> Sign up</a>
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