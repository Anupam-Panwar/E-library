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
    $name = validate($_POST['name']);
    $author = validate($_POST['author']);
    $image = validate($_POST['coverimg']);
    $des = validate($_POST['description']);
    if (empty($name)) {
        header('Location: form.php?msg=Name of Book is required');
        exit();
    }
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        header('Location: form.php?msg=Enter valid Book Name');
        exit();
    }
    if (empty($author)) {
        header('Location: form.php?msg=Author is required');
        exit();
    }
    if (!preg_match("/^[a-zA-Z-' ]*$/", $author)) {
        header('Location: form.php?msg=Enter valid Author Name');
        exit();
    }
    if (empty($image)) {
        header('Location: form.php?msg=Cover Image of Book is required');
        exit();
    }
    function validImage($file) {
        $size = getimagesize($file);
        return (strtolower(substr($size['mime'], 0, 5)) == 'image' ? true : false);  
     }
    if (!validImage($image)) {
        header('Location: form.php?msg=Enter valid Cover Image URL');
        exit();
    }
    if (empty($des)) {
        header('Location: form.php?msg=Description of Book is required');
        exit();
    }
    $sql = "SELECT id FROM books WHERE name='$name' AND author='$author'";
    $result = $conn->query($sql);
    if($result->num_rows==1)
    {
       $row = $result->fetch_assoc();
       $ide = $row['id'];
       header("Location: detail.php?id=".$ide."&msg=Book Already Present");
       exit();
    }
    $sql = "INSERT INTO books (id,name,author,cover_img_url,description) VALUES (NULL,'$name','$author','$image','$des')";
    if ($conn->query($sql) === TRUE) {
        $sql = "SELECT id FROM books WHERE name='$name' AND author='$author'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $id = $row['id'];
        require_once __DIR__ . '\connection\disconnect.php';
        header("Location: detail.php?id=".$id."&msg=Book Added Successfully");
        exit();
    } else {
        header('Location: form.php?msg=Unable to add book');
        exit();
    }
} else {
    header('Location: form.php?msg=Unable to add book');
    exit();
}
