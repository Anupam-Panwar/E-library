<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . '\connection\connect.php';
    function validate($data)
    {
        require __DIR__ . '\connection\connect.php';
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = $conn->real_escape_string($data);
        return $data;
    }
    $id = validate($_GET['id']);
    $name = validate($_POST['name']);
    $author = validate($_POST['author']);
    $image = validate($_POST['coverimg']);
    $des = validate($_POST['description']);
    $sql = "UPDATE books SET name='$name',author='$author',cover_img_url='$image',description='$des' WHERE id=" . $id;
    if ($conn->query($sql) === TRUE) 
    {
        header("Location: detail.php?id='$id'");
        exit();
    }
    else
    {
        header('Location: detail.php?error=ERROR OCCURED');
        exit();
    }
}
else
{
    header('Location: detail.php');
    exit();
}
