<!DOCTYPE html>
<html lang="en">

<head>
    <!--  meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="CSS/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="CSS/custom.css" rel="stylesheet" type="text/css" />

    <title>Add Book</title>
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    ?>
        <!-- Navbar -->
        <nav class="navbar navbar-light bg-light sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="images/logo.jpg" alt="logo" width="35" height="35" class="d-inline-block align-top rounded-circle" />
                    E-library
                </a>
            </div>
        </nav>
        <!-- Form -->
        <?php
        require_once __DIR__ . '\connection\connect.php';
        $sql = "SELECT name,author,cover_img_url,description FROM books WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        ?>
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
                <label for="Name" class="col-sm-2 col-form-label">Name (*)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="Author" class="col-sm-2 col-form-label">Author Name (*)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="author" value="<?php echo $row['author']; ?>" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="Cover Img Url" class="col-sm-2 col-form-label">Cover Img Url (*)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="coverimg" value="<?php echo $row['cover_img_url']; ?>" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="Description" class="col-sm-2 col-form-label">Description (*)</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="description" rows="5"><?php echo $row['description']; ?></textarea>
                </div>
            </div>
            <div class="d-grid gap-2">
                <input class="btn btn-primary" type="submit" value="UPDATE" />
            </div>
        </form>
    <?php
    } else {
        header('Location: index.php');
        exit();
    }
    ?>
    <!--  Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>