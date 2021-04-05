<?php
require_once __DIR__ . '\connection\connect.php';
$name=$_POST['name'];
$author=$_POST['author'];
$image=$_POST['coverimg'];
$des=$_POST['description'];
$sql = "INSERT INTO books (id, name, author, cover_img_url, description) VALUES (NULL,'$name','$author','$image','$des')";
$result = $conn->query($sql);
// $sql = "SELCT id FROM books WHERE name='$name' AND author='$author'";
// $result = $conn->query($sql);
// $row=$result->fetch_assoc();
// $id=$row['id'];
// header('Location: detail.php?id=$id');
// exit();
header('Location: index.php');
exit();
?>