<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="CSS/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="CSS/custom.css" rel="stylesheet" type="text/css">

    <title>E-library</title>
</head>

<body>
    <!--Navbar-->
    <nav class="navbar navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo.jpg" alt="" width="35" height="35" class="d-inline-block align-top rounded-circle" />
                E-library
            </a>
            <a href="form.php">
                <button type="button" class="btn btn-primary">Add book</button>
            </a>
        </div>
    </nav>

    <!-- Grid View -->
    <div class="row row-cols-1 row-cols-md-3 g-5 m-2">
        <?php
        require_once __DIR__ . '\connection\connect.php';
        $sql = "SELECT id,name,author,cover_img_url FROM books";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
        ?>
            <div class="col">
                <a href="detail.php?id=<?php echo $row['id']; ?>" style="text-decoration: none">
                    <div class="card h-100">
                        <img src="<?php echo $row['cover_img_url']; ?>" class="card-img-top" alt="cover image" />
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="card-text">
                            <?php echo $row['author']; ?>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        <?php
        }
        require_once __DIR__ . '\connection\disconnect.php';
        ?>
    </div>

    <!-- pagination -->
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>