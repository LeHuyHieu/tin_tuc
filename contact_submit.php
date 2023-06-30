<?php 
require_once('db.php');

if(isset($_POST['send_the_contact']) && $_POST['full_name'] != '' && $_POST['address_email'] != '' && $_POST['phone_number'] != '' && $_POST['title_contact'] != '' && $_POST['content_contact'] != '') {
    $full_name = $_POST['full_name'];
    $address_email = $_POST['address_email'];
    $phone_number = $_POST['phone_number'];
    $title_contact = $_POST['title_contact'];
    $content_contact = $_POST['content_contact'];

    $sql = "SELECT * FROM contact";
    $sql = "INSERT INTO contact (full_name, address_email, phone_number, title_contact, content_contact) VALUES ('$full_name', '$address_email', '$phone_number', '$title_contact', '$content_contact')";
    //Hàm mysqli_query được sử dụng để thực thi các truy vấn SQL 
    //dùng để thực thi các kiểu truy vấn như insert, update, delete, select
    // echo $sql;die;
    mysqli_query($conn, $sql);
    header('location:contact.php?thanh_cong=1');
    exit;
}else {
    header('location:contact.php');
    exit;
}

?>