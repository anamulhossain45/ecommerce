<?php
$title = "Delete Subcategory";
require_once("../../include/header.php");
echo '<div class="card-panel teal lighten-5"><h1>Delete Subcategory</h1>';
$id = $_GET['id'];
$cat_id = $_GET['cat_id'];
$sql = "select * from subcategories where id=$id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) < 1) {
    // category not found, exit
    echo '<p class="red-text">Subcategory not found. <a href="../categories/index.php">Go back</a>.</p>';
} else {
    // category found, continue
    $sql = "DELETE FROM subcategories WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        // deletion successful
        echo "<p class='green-text'>Deleted successfully! <a href='index.php?id=$cat_id'>Go back</a></p>";
    } else {
        // something is wrong
        echo '<p class="red-text">Something is wrong. <a href="../categories/index.php">Go back</a>.</p>';
    }
}
require_once("../../include/footer.php");
?>