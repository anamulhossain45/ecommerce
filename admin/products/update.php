<?php
$title = "Edit Product";
require_once("../../include/header.php");
echo '<div class="card-panel teal lighten-5"><h1>Edit Product</h1>';
$sub_id = $_GET['sub_id'];
$id = $_GET['id'];
$sql = "select * from products where id=$id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) < 1) {
    // subcategory not found, exit
    echo '<p class="red-text">Product not found. <a href="index.php">Go back</a>.</p>';
} else {
    // category found, continue
    while ($row = $result->fetch_assoc()) {
        $old_name = $row['name'];
        $old_price = $row['price'];
        $old_quantity = $row['quantity'];
        $old_des = $row['des'];
        $photo1 = $row['photo1'];
        $photo2 = $row['photo2'];
        $photo3 = $row['photo3'];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // if form submitted
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $des = $_POST['des'];
        $path = '../../img/products/';
        if (isset($_FILES['photo1'])) {
            $photo1_name = basename($_FILES['photo1']['name']);
            move_uploaded_file($_FILES['photo1']['tmp_name'], $path . $photo1_name);
            if (file_exists($photo1)) unlink($photo1);
            $photo1 = $photo1_name;
        }
        if (isset($_FILES['photo2'])) {
            $photo2_name = basename($_FILES['photo2']['name']);
            move_uploaded_file($_FILES['photo2']['tmp_name'], $path . $photo2_name);
            if (file_exists($photo2)) unlink($photo2);
            $photo2 = $photo2_name;
        }
        if (isset($_FILES['photo3'])) {
            $photo3_name = basename($_FILES['photo3']['name']);
            move_uploaded_file($_FILES['photo3']['tmp_name'], $path . $photo3_name);
            if (file_exists($photo3)) unlink($photo3);
            $photo3 = $photo3_name;
        }
        $sql = "UPDATE subcategories SET name='$name', price='$price', name='$quantity', des='$des', photo1='$photo1', photo2='$photo2', $photo3='$photo3' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            // register successful
            echo "<p class='green-text'>Updated successfully! <a href='index.php?id=$sub_id'>Go back</a></p>";
            if (file_exists($photo2)) unlink($photo2);
            if (file_exists($photo3)) unlink($photo3);
        } else {
            // something is wrong
            echo "<p class='red-text'>Something is wrong. <a href='index.php?id=$sub_id'>Try again</a>.</p>";
        }
    } else {
        // if not submitted, show form
?>
        <form method="post" action="update.php?id=<?= $id; ?>&sub_id=<?= $sub_id; ?>">
            <div class="input-field">
                <label for="name">Name</label><input type="text" name="name" value="<?= $old_name; ?>" required>
            </div>
            <div class="input-field">
                <label for="price">Price</label><input type="number" name="price" value="<?= $old_price; ?>" required>
            </div>
            <div class="input-field">
                <label for="quantity">Quantity</label><input type="number" name="quantity" value="<?= $old_quantity; ?>" required>
            </div>
            <div class="input-field">
                <textarea id="des" name="des" class="materialize-textarea"><?= $old_des; ?></textarea><label for="des">Description</label>
            </div>
            <div class="file-field input-field">
                <div class="btn">
                    <span>Photo</span>
                    <input type="file" name="photo1" id="photo1">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload product photo">
                </div>
            </div>
            <div class="file-field input-field">
                <div class="btn">
                    <span>Photo 2</span>
                    <input type="file" name="photo2" id="photo2">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload product photo">
                </div>
            </div>
            <div class="file-field input-field">
                <div class="btn">
                    <span>Photo 3</span>
                    <input type="file" name="photo3" id="photo3">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload product photo">
                </div>
            </div>
            <div class="row">
                <div class="col s4"><button type="submit" class="btn waves-effect full-width">CONFIRM</button></div>
                <div class="col s4"></div>
                <div class="col s4"> <a href="index.php?id=<?= $sub_id; ?>" class="right btn waves-effect full-width">Back</a></div>
            </div>
        </form>
<?php
    }
    echo '</div>';
}
require_once("../../include/footer.php");
?>