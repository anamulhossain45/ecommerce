<?php
$title = "Edit Subcategory";
require_once("../../include/header.php");
echo '<div class="card-panel teal lighten-5"><h1>Edit Subcategory</h1>';
$cat_id = $_GET['cat_id'];
$id = $_GET['id'];
$sql = "select * from subcategories where id=$id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) < 1) {
    // subcategory not found, exit
    echo '<p class="red-text">Subcategory not found. <a href="index.php">Go back</a>.</p>';
} else {
    // category found, continue
    while($row = $result->fetch_assoc()) {
        $old_name = $row['name'];
      }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // if form submitted
    $name = $_POST['name'];
    $sql = "UPDATE subcategories SET name='$name' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        // register successful
        echo "<p class='green-text'>Updated successfully! <a href='index.php?id=$cat_id'>Go back</a></p>";
    } else {
        // something is wrong
        echo "<p class='red-text'>Something is wrong. <a href='index.php?id=$cat_id'>Try again</a>.</p>";
    }
} else {
    // if not submitted, show form
?>
    <form method="post" action="update.php?id=<?=$id;?>&cat_id=<?=$cat_id;?>">
        <div class="input-field">
            <label for="name">Name</label><input type="text" name="name" value="<?=$old_name;?>" required>
        </div>
        <div class="row">
            <div class="col s4"><button type="submit" class="btn waves-effect full-width">CONFIRM</button></div>
            <div class="col s4"></div>
            <div class="col s4"> <a href="index.php?id=<?=$cat_id;?>" class="right btn waves-effect full-width">Back</a></div>
        </div>
    </form>
<?php
}
echo '</div>';
}
require_once("../../include/footer.php");
?>