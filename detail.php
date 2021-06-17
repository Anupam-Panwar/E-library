<!DOCTYPE html>
<html lang="en">

<head>
    <?php require __DIR__ . "/utility/head_info.php"; ?>
    <title>Book Detail</title>
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
    ?>
        <!--Navbar-->
        <?php 
        $type='detail';
        require __DIR__ . '/utility/header.php'; 
        if (isset($_GET['msg'])) {
        ?>
            <div class="alert alert-primary alert-dismissible fade show m-2" role="alert">
                <strong><?php echo $_GET['msg'] ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <!-- Book Details -->
        <div class="container p-2 my-4 book">
            <?php
            require_once __DIR__ . '/connection/connect.php';
            $id = $_GET['id'];
            $sql = "SELECT name,author,cover_img_url,description FROM books WHERE id=" . $id;
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            ?>
            <div class="row align-items-center">
                <div class="col-lg-5 d-lg-block p-3">
                    <div class="banner-img">
                        <img src="<?php echo $row['cover_img_url']; ?>" alt="cover image" class="img-fluid w-100 bookcover" id="img" />
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 justify-content-center p-3">
                    <div class="main-banner">
                        <h1 class="mb-2"><?php echo $row['name']; ?></h1>

                        <p class="lead"><?php echo $row['author']; ?></p>
                        <div class="d-grid gap-2 d-md-block">
                            <a href="edit.php?id=<?php echo $id; ?>" class="nodecoration">
                            <button class="btn btn-primary" type="button">     
                                    Edit Book      
                            </button>
                            </a>
                            <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Delete Book
                            </button>
                        </div>

                    </div>
                    <div class="mb-3 mt-4 overflow-auto description">
                        <?php echo $row['description']; ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        <?php
        require_once __DIR__ . '/connection/connect.php';
        require __DIR__ . "/utility/foot_info.php";
        ?>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Proceed">
                            Do you want to proceed
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <a href="delete.php?id=<?php echo $id; ?>">
                            <button type="button" class="btn btn-danger">Yes</button>
                        </a>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                            No
                        </button>
                    </div>
                </div>
            </div>

        <?php
    } else {
        header('Location: index.php');
        exit();
    }
        ?>
</body>

</html>