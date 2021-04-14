<?php
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 6;
$offset = ($pageno - 1) * $no_of_records_per_page;

require_once __DIR__ . '/connection/connect.php';
$sql = "SELECT * FROM books";
$result = $conn->query($sql);
$total_rows = $result->num_rows;
$total_pages = ceil($total_rows / $no_of_records_per_page);
$sql = "SELECT id,name,author,cover_img_url FROM books LIMIT $offset, $no_of_records_per_page";
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
        <li><a class="page-link" aria-label="First" href="?pageno=1">
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
        <li><a class="page-link" aria-label="last" href="?pageno=<?php echo $total_pages; ?>"><span aria-hidden="true">&raquo; </span></a></li>

    </ul>


    </ul>
</nav>