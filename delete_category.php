<?php
require_once('db.php');
$id = $_GET['id'];
if(isset($id[0]) && strpos($id[0], ",")){
    $id = $id[0];
    $sql = "DELETE FROM categories WHERE id In ($id)";
    $result = $conn->query($sql);

    $sql2 = "DELETE FROM categories WHERE parent_id In ($id)";
    $result2 = $conn->query($sql2);
    header('location:index_category.php');
}
$sql = "DELETE FROM categories WHERE id = $id";
$result = $conn->query($sql);
$sql2 = "DELETE FROM categories WHERE parent_id = $id";
$result2 = $conn->query($sql2);
header('location:index_category.php');
?>