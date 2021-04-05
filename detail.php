<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="CSS/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="CSS/custom.css" rel="stylesheet" type="text/css" />

    <title>Book Detial</title>
  </head>
  <body>

    <!--Navbar-->
    <nav class="navbar navbar-light bg-light sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">
            <img
              src="images/logo.jpg"
              alt="logo"
              width="35"
              height="35"
              class="d-inline-block align-top rounded-circle"
            />
            E-library
          </a>
          <a href="form.php">
            <button type="button" class="btn btn-primary">Add book</button>
          </a>
        </div>
      </nav>

    <!-- Book Details -->
    <div class="container p-2 my-4 book">
    <?php
        require_once __DIR__ . '\connection\connect.php';
        $id=$_GET['id'];
        $sql = "SELECT name,author,cover_img_url,description FROM books WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        ?>
      <div class="row align-items-center">
        <div class="col-lg-5 d-lg-block p-3">
          <div class="banner-img">
            <img
                src="<?php echo $row['cover_img_url']; ?>"
              alt="cover image"
              class="img-fluid w-100 bookcover"
              id="img"
            />
          </div>
        </div>
        <div class="col-lg-7 col-md-12 justify-content-center p-3">
          <div class="main-banner">
            <h1 class="mb-2"><?php echo $row['name']; ?></h1>

            <p class="lead"><?php echo $row['author']; ?></p>
            <div class="d-grid gap-2 d-md-block">
              <button
                class="btn btn-primary"
                type="button"
                onclick="location.href='edit.php?id=<?php echo $id ?>'"
              >
                Edit Book
              </button>
              <button
                class="btn btn-danger"
                type="button"
                data-bs-toggle="modal"
                data-bs-target="#exampleModal"
              >
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

     <!-- Modal -->
     <div
     class="modal fade"
     id="exampleModal"
     tabindex="-1"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true"
   >
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="Proceed">
             Do you want to proceed
           </h5>
           <button
             type="button"
             class="btn-close"
             data-bs-dismiss="modal"
             aria-label="Close"
           ></button>
         </div>
         <div class="modal-footer">
           <a href="delete.php?id=<?php echo $id ?>">
             <button type="button" class="btn btn-danger">Yes</button>
           </a>
           <button
             type="button"
             class="btn btn-primary"
             data-bs-dismiss="modal"
           >
             No
           </button>
         </div>
       </div>
     </div>

    <!--Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
