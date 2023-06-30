<?php
require_once('db.php');
$category_id = $_POST['category_id'];
$title = $_POST['title'];
$desc = addslashes($_POST['desc']);
$content = addslashes($_POST['content']);
$target_dir = "images/";
$err = [];
$is_hot = 0;
$is_paid = 0;
if(isset($_POST['is_hot']) && $_POST['is_hot'] == 1 ){
    $is_hot = 1;
}
if(isset($_POST['is_paid']) && $_POST['is_paid'] == 1 ){
    $is_paid = 1;
}
if(!isset($_POST['title']) || $_POST['title'] == "" ){
    $err['title'] = "Title is required";
    setcookie("error", json_encode(($err)), time()+1, "/","", 0);
    header('location:form_user.php?err=1');
}

if(isset($_FILES['image']["tmp_name"]) && $_FILES["image"]["tmp_name"]){
    $image = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $image);
}else{
    $image = '';
}
if(isset($_POST['id'])){
    $id = $_POST['id'];
    if(strlen($image)){
        $sql = "UPDATE news set title = '$title', category_id = $category_id, image = '$image', description ='$desc', content = '$content', is_hot =$is_hot, is_paid=$is_paid where id = $id";
    }else{
        $sql = "UPDATE news set title = '$title', category_id = $category_id, description ='$desc', content = '$content', is_hot =$is_hot, is_paid=$is_paid where id = $id";
    }
}else{
    $sql = "INSERT INTO news (title, category_id, image, description,content,created_at,updated_at,is_hot,is_paid) VALUES ('$title', $category_id, '$image','$desc','$content',NOW(),NOW(),$is_hot,$is_paid)";
}
if ($conn->query($sql) === TRUE) {
    header('location:user.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>