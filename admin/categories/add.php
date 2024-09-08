<?php
$title = "Add Category";
require_once("../../include/header.php");
echo '<div class="card-panel teal lighten-5"><h1>Add Category</h1>';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // if submitted
    $name = $_POST['name'];
    $des = $_POST['des'];
    $sql = "INSERT INTO categories (name, des) VALUES ('$name','$des')";
    if ($conn->query($sql) === TRUE) {
        // register successful
        echo '<p class="green-text">Added successfully! <a href="index.php">Go back</a></p>';
    } else {
        // something is wrong
        echo '<p class="red-text">Something is wrong. <a href="add.php">Try again</a>.</p>';
    }
} else {
    // if not submitted
?>
    <form method="post" action="add.php">
        <div class="input-field">
            <label for="name">Name</label><input type="text" name="name" required>
        </div>
        <div class="input-field">
            <label for="des">Description</label><input type="text" name="des" required>
        </div>
        <div class="row"><div class="col s4"><button type="submit" class="btn waves-effect full-width">Add</button></div>
        <div class="col s4"></div><div class="col s4"> <a href="index.php" class="right btn waves-effect full-width">Back</a></div></div>
    </form>
<?php
}
echo '</div>';
require_once("../../include/footer.php");
?>