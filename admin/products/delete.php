<?php
$title = "Delete Product";
require_once("../../include/header.php");
echo '<div class="card-panel teal lighten-5"><h1>Delete Product</h1>';
$id = $_GET['id'];
$sub_id = $_GET['sub_id'];
$sql = "select * from products where id=$id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) < 1) {
    // category not found, exit
    echo "<p class='red-text'>Product not found. <a href='../subcategories/index.php?id=$sub_id'>Go back</a>.</p>";
} else {
    while($row = $result->fetch_assoc()) {
        $photo1 = $row['photo1'];
        $photo2 = $row['photo2'];
        $photo3 = $row['photo3'];
      }
    // category found, continue
    $sql = "DELETE FROM products WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        // deletion successful
        echo "<p class='green-text'>Deleted successfully! <a href='index.php?id=$sub_id'>Go back</a></p>";
        if(file_exists($photo1)) unlink($photo1);
        if(file_exists($photo2)) unlink($photo2);
        if(file_exists($photo3)) unlink($photo3);
    } else {
        // something is wrong
        echo '<p class="red-text">Something is wrong. <a href="../categories/index.php">Go back</a>.</p>';
    }
}
require_once("../../include/footer.php");
?>