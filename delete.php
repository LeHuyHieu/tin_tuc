<?php
require_once('db.php');
$id = $_GET['id'];
if(isset($id[0]) && strpos($id[0], ",")){
    $id = $id[0];
    $sql = "DELETE FROM news WHERE id In ($id)";
    $result = $conn->query($sql);
    header('location:index_admin.php');
}
$sql = "DELETE FROM news WHERE id = $id";
$result = $conn->query($sql);
header('location:index_admin.php');
?>