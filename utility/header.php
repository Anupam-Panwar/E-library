<?php
if ($type == 'index') { 
    session_start();
    if(isset($_SESSION['sort']))
    {
        if(isset($_GET['sort_book']))
        {
            if(($_SESSION['sort']=='DESC')&&($_GET['sort_book']==2))
            $_SESSION['sort']='ASC';
            else if(($_SESSION['sort']=='ASC')&&($_GET['sort_book']==1))
            $_SESSION['sort']='DESC';
        }
    }  
    else
    $_SESSION['sort']='ASC';
    ?>
    <!--Navbar for index.php-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo.jpg" alt="" width="35" height="35" class="d-inline-block align-top rounded-circle" />
                E-library
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse m-1" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="form.php" style="text-decoration: none;">Add book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="?sort_book=<?php
                         $temp1=($_SESSION['sort']=='ASC')? 1 : 2; echo $temp1; ?>&pageno=<?php 
                         $temp=isset($_GET['pageno'])?$_GET['pageno']:1; echo $temp; 
                         if(isset($_GET['book_search'])) echo "&book_search=".$_GET['book_search'];?>">Sort <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-up" viewBox="0 0 16 16">
                                <path d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                            </svg></a>
                    </li>
                </ul>
                <form class="d-flex" action="" method="GET">
                    <input class="form-control me-1" type="search" name="book_search" placeholder="Search Book" aria-label="Search" value="<?php 
                    if(isset($_GET['book_search'])) 
                    echo $_GET['book_search']; ?>" >
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
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