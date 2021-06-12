<?php
if ($type == 'index') {
    session_start();
    if (isset($_SESSION['sort'])) {
        if (isset($_GET['sort_book'])) {
            if (($_SESSION['sort'] == 'DESC') && ($_GET['sort_book'] == 2))
                $_SESSION['sort'] = 'ASC';
            else if (($_SESSION['sort'] == 'ASC') && ($_GET['sort_book'] == 1))
                $_SESSION['sort'] = 'DESC';
        }
    } else
        $_SESSION['sort'] = 'ASC';
?>
    <!--Navbar for index.php-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo.jpg" alt="" width="35" height="35" class="d-inline-block align-top rounded-circle" />
                E-library
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse m-1" id="navbarScroll">
                <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;" id="listItem">
                    <li class="nav-item mx-1" id="marginAdd">
                        <a href="form.php"><button class="btn btn-outline-primary">Add Book</button></a>
                        <a href="?sort_book=<?php
                                            $temp1 = ($_SESSION['sort'] == 'ASC') ? 1 : 2;
                                            echo $temp1; ?>&pageno=<?php
                                                                                            $temp = isset($_GET['pageno']) ? $_GET['pageno'] : 1;
                                                                                            echo $temp;
                                                                                            if (isset($_GET['book_search'])) echo "&book_search=" . $_GET['book_search']; ?>"><button class="btn btn-outline-primary">
                                <?php if (isset($_GET['sort_book']) && ($_GET['sort_book'] == 1)) { ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 14 14">
                                        <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z" />
                                        <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z" />
                                    </svg>
                                <?php } else { ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-down-alt" viewBox="0 0 14 14">
                                        <path d="M12.96 7H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V7z" />
                                        <path fill-rule="evenodd" d="M10.082 12.629 9.664 14H8.598l1.789-5.332h1.234L13.402 14h-1.12l-.419-1.371h-1.781zm1.57-.785L11 9.688h-.047l-.652 2.156h1.351z" />
                                        <path d="M4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z" />
                                    </svg>
                                <?php } ?>
                            </button></a>
                    </li>
                    <li class="nav-item mx-1">
                    <form class="d-flex" action="" method="GET">
                    <input class="form-control me-1" type="search" name="book_search" placeholder="Search Book" aria-label="Search" value="<?php
                                                                                                                                            if (isset($_GET['book_search']))
                                                                                                                                                echo $_GET['book_search']; ?>">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php } else if ($type == 'detail') { ?>
    <!--Navbar for detail.php-->
    <nav class="navbar navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo.jpg" alt="logo" width="35" height="35" class="d-inline-block align-top rounded-circle" />
                E-library
            </a>
            <a href="form.php">
                <button class="btn btn-outline-primary">Add Book</button>
            </a>
        </div>
    </nav>
<?php } else { ?>
    <!--Navbar for form.php and edit.php-->
    <nav class="navbar navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo.jpg" alt="logo" width="35" height="35" class="d-inline-block align-top rounded-circle" />
                E-library
            </a>
        </div>
    </nav>
<?php } ?>



<script>
    var element = document.getElementById('marginAdd');
    var width = window.innerWidth;
    if(width < 990) {
        element.classList.add('m-1');
        element.classList.remove('mx-1');
    }
</script>