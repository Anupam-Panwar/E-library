<!DOCTYPE html>
<html lang="en">

<head>
    <?php require __DIR__ . "/utility/head_info.php"; ?>

    <title>E-library</title>
</head>

<body>
    <!--Navbar-->
    <?php 
    $type='index';
    require __DIR__."/utility/header.php"; ?>
    <!-- Grid View -->
    <?php
    if (isset($_GET['msg'])) {
    ?>
        <div class="alert alert-primary alert-dismissible fade show m-2" role="alert">
            <strong><?php echo $_GET['msg'] ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>
    <?php
    require 'book.php';
    ?>
    <?php require __DIR__ . "/utility/foot_info.php"; ?>
</body>

</html>