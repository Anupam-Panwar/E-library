<?php
if (isset($_GET['id'])) 
{
    $id = $_GET['id'];
    require_once __DIR__ . '\connection\connect.php';
    $sql = "DELETE FROM books WHERE id=".$id;
    $result = $conn->query($sql);
    require_once __DIR__ . '\connection\disconnect.php';
    header('Location: index.php');
    exit();
} 
else 
{
    header('Location: index.php');
    exit();
}
