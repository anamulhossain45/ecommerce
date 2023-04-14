<?php
$title = "Delete Category";
require_once("../../include/header.php");
echo '<div class="card-panel teal lighten-5"><h1>Delete Category</h1>';
$id = $_GET['id'];
$sql = "select * from categories where id=$id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) < 1) {
    // category not found, exit
    echo '<p class="red-text">Category not found. <a href="index.php">Go back</a>.</p>';
} else {
    // category found, continue
    $sql = "DELETE FROM categories WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        // deletion successful
        echo '<p class="green-text">Deleted successfully! <a href="index.php">Go back</a></p>';
    } else {
        // something is wrong
        echo '<p class="red-text">Something is wrong. <a href="index.php">Go back</a>.</p>';
    }
}
require_once("../../include/footer.php");
?>