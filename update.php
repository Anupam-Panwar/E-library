<?php
require_once __DIR__ . '\connection\connect.php';
$id=$_GET['id'];
$name=$_POST['name'];
$author=$_POST['author'];
$image=$_POST['coverimg'];
$des=$_POST['description'];
$sql = "UPDATE books SET name='$name',author='$author',cover_img_url='$image',description='$des' WHERE id=$id";
$conn->query($sql);
// $sql = "SELCT id FROM books WHERE name='$name' AND author='$author'";
// $result = $conn->query($sql);
// $row=$result->fetch_assoc();
// $id=$row['id'];
// header('Location: detail.php?id=$id');
// exit();
header('Location: index.php');
exit();
?>