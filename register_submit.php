<?php
require_once('db.php');
if (isset($_POST['register']) && $_POST['name'] != '' && $_POST['email'] != '' && $_POST['password'] != '' && $_POST['re-password'] != '') {
    //thực hiện xử lý khi người dùng ấn submit và điền đầy đủ thông tin
    $userName = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re-password'];
    $leves = 0;

    if ($password != $re_password) {
        header('location:register.php');
    }

    $sql = "SELECT * FROM users WHERE email = '$email'";
    //mã hóa password
    $password = md5($password);
    $old = mysqli_query($conn, $sql);

    if (mysqli_num_rows($old) > 0) {
        header('location:register.php?ton_tai=1');
        exit;
    }

    $sql = "INSERT INTO users (username,email,password,leves) VALUES ('$userName','$email','$password','$leves')";
    mysqli_query($conn, $sql);
    header('location:login.php?thanh_cong=1');
    exit;
} else {
    header('location:register.php');
    exit;
}
