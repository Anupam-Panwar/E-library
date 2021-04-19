<?php
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 9;
$offset = ($pageno - 1) * $no_of_records_per_page;

require_once __DIR__ . '/connection/connect.php';
if (isset($_GET['book_search'])) {
    $sql="SELECT * FROM books WHERE name LIKE '%".$_GET['book_search']."%' OR author LIKE  '%".$_GET['book_search']."%'";
} else {
    $sql = "SELECT * FROM books";
}
$result = $conn->query($sql);
$total_rows = $result->num_rows;
if($total_rows==0)
{
    header('Location: index.php?msg=No result found');
    exit();
}
$total_pages = ceil($total_rows / $no_of_records_per_page);
$seq = $_SESSION['sort'];
if (isset($_GET['book_search'])) {
    $sql = "SELECT id,name,author,cover_img_url FROM books WHERE name LIKE '%".$_GET['book_search']."%' OR author LIKE  '%".$_GET['book_search']."%' ORDER BY name $seq LIMIT $offset, $no_of_records_per_page ";
} else {
    $sql = "SELECT id,name,author,cover_img_url FROM books ORDER BY name $seq LIMIT $offset, $no_of_records_per_page ";
}
$result = $conn->query($sql);
?>
<div class="row row-cols-1 row-cols-md-3 g-5 m-2">
    <?php
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
    ?>
</div>
<?php
require_once __DIR__ . '/connection/disconnect.php';
?>


<!-- pagination -->
<nav aria-label="Page navigation example" style="display:flex; justify-content:center">
    <ul class="pagination ">
        <li><a class="page-link" aria-label="First" href="?pageno=1<?php
        if (isset($_GET['book_search']))
        echo "&book_search=".$_GET['book_search'];
        ?>">
                <span aria-hidden="true"> &laquo;</span></a></li>
        <li class="<?php if ($pageno <= 1) {
                        echo 'disabled';
                    } ?> page-item">
            <a class="page-link" aria-label="Previous" href="<?php if ($pageno <= 1) {
                                                                    echo '#';
                                                                } else {
                                                                    echo "?pageno=" . ($pageno - 1);
                                                                } ?>">
                <span aria-hidden="true">&#139;</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="#"><?php echo $pageno; ?></a></li>
        <li class="<?php if ($pageno >= $total_pages) {
                        echo 'disabled';
                    } ?> page-item">
            <a class="page-link" aria-label="Next" href="<?php if ($pageno >= $total_pages) {
                                                                echo '#';
                                                            } else {
                                                                echo "?pageno=" . ($pageno + 1);
                                                            } ?>">
                <span aria-hidden="true">&#155;</span>
            </a>
        </li>
        <li><a class="page-link" aria-label="last" href="?pageno=<?php echo $total_pages;
        if (isset($_GET['book_search']))
        echo "&book_search=".$_GET['book_search'];
        ?>"><span aria-hidden="true">&raquo; </span></a></li>

    </ul>


    </ul>
</nav>