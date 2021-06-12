<!DOCTYPE html>
<html lang="en">

<head>
    <?php require __DIR__ ."/utility/head_info.php"; ?> 

    <title>Edit Book</title>
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    ?>
        <!-- Navbar -->
        <?php $type='form';
         require __DIR__.'/utility/header.php'; ?>
        <!-- Form -->
        <?php
        require_once __DIR__ . '/connection/connect.php';
        $sql = "SELECT name,author,cover_img_url,description FROM books WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        ?>
        <div class="form">
        <form class="mx-4 m-3 p-3 customform" action="update.php?id=<?php echo $id ?>" method="post">
        <?php
        if (isset($_GET['msg'])) {
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?php echo $_GET['msg'] ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
            <div class="row mb-3">
                <label for="Name" class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>"  required/>
                </div>
            </div>
            <div class="row mb-3">
                <label for="Author" class="col-sm-2 col-form-label">Author Name <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="author" value="<?php echo $row['author']; ?>"  required/>
                </div>
            </div>
            <div class="row mb-3">
                <label for="Cover Img Url" class="col-sm-2 col-form-label">Cover Img Url <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="coverimg" value="<?php echo $row['cover_img_url']; ?>"  required/>
                </div>
            </div>
            <div class="row mb-3">
                <label for="Description" class="col-sm-2 col-form-label">Description <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="description" rows="5" required><?php echo $row['description']; ?></textarea>
                </div>
            </div>
            <div class="d-grid gap-2">
                <input class="btn btn-primary" type="submit" value="UPDATE" />
            </div>
        </form>
        </div>
    <?php
    } else {
        header('Location: index.php');
        exit();
    }
    ?>
   <?php 
   require_once __DIR__ . '/connection/disconnect.php';
   require __DIR__ ."/utility/foot_info.php";
    ?>
</body>

</html>