<?php
require_once('db.php');
$parent_id = $_POST['parent_id'];
$name = $_POST['name'];

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "UPDATE categories set name = '$name', parent_id = $parent_id where id = $id";
} else {
    $sql = "INSERT INTO categories (name, parent_id,created_at,updated_at) VALUES ('$name', $parent_id,NOW(),NOW())";
}
if ($conn->query($sql) === TRUE) {
    header('location:index_category_user.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
