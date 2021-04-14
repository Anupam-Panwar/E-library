<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . '/connection/connect.php';
    function validate($data)
    {
        require __DIR__ . '/connection/connect.php';
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
    if (empty($name)) {
        header('Location: edit.php?id='.$id.'&msg=Name of Book is required');
        exit();
    }
    if (empty($author)) {
        header('Location: edit.php?id='.$id.'&msg=Author is required');
        exit();
    }
    if (!preg_match("/^[a-zA-Z-' ]*$/", $author)) {
        header('Location: edit.php?id='.$id.'&msg=Enter valid Author Name');
        exit();
    }
    if (empty($image)) {
        header('Location: edit.php?id='.$id.'&msg=Cover Image of Book is required');
        exit();
    }
    function validImage($file)
    {
        $size = getimagesize($file);
        return (strtolower(substr($size['mime'], 0, 5)) == 'image' ? true : false);
    }
    if (!validImage($image)) {
        header('Location: edit.php?id='.$id.'&msg=Enter valid Cover Image URL');
        exit();
    }
    if (empty($des)) {
        header('Location: edit.php?id='.$id.'&msg=Description of Book is required');
        exit();
    }
    $sql = "UPDATE books SET name='$name',author='$author',cover_img_url='$image',description='$des' WHERE id=" . $id;
    if ($conn->query($sql) === TRUE) {
        header("Location: detail.php?id=".$id."&msg=UPDATED SUCCESSFULLY");
        exit();
    } else {
        header("Location: detail.php?id=".$id."&msg=ERROR UPDATING RECORD");
        exit();
    }
    require_once __DIR__ . '/connection/disconnect.php';
} else {
    $id = validate($_GET['id']);
    header('Location: index.php?msg=ERROR OCCURED');
    exit();
}
