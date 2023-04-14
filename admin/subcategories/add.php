<?php
$title = "Add Subcategory";
require_once("../../include/header.php");
echo '<div class="card-panel teal lighten-5"><h1>Add Subcategory</h1>';
$id = $_GET['id']; // get category id
$sql = "select * from categories where id=$id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) < 1) {
    // category not found, exit
    echo '<p class="red-text">Category not found. <a href="../categories/index.php">Go back</a>.</p>';
} else {
  // category found, continue
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // if submitted
    $name = $_POST['name'];
    $sql = "INSERT INTO subcategories (name, cat_id) VALUES ('$name','$id')";
    if ($conn->query($sql) === TRUE) {
        // register successful
        echo "<p class='green-text'>Added successfully! <a href='index.php?id=$id'>Go back</a></p>";
    } else {
        // something is wrong
        echo "<p class='red-text'>Something is wrong. <a href='add.php?id=$id'>Try again</a>.</p>";
    }
} else {
    // if not submitted
?>
    <form method="post" action="add.php?id=<?=$id;?>">
        <div class="input-field">
            <label for="name">Name</label><input type="text" name="name" required>
        </div>
        <div class="row"><div class="col s4"><button type="submit" class="btn waves-effect full-width">Add</button></div>
        <div class="col s4"></div><div class="col s4"> <a href="index.php?id=<?=$id;?>" class="right btn waves-effect full-width">Back</a></div></div>
    </form>
<?php
}
}
echo '</div>';
require_once("../../include/footer.php");
?>