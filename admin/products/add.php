<?php
$title = "Add Product";
require_once("../../include/header.php");
echo '<div class="card-panel teal lighten-5"><h1>Add Product</h1>';
$id = $_GET['sub_id']; // get category id
$sql = "select * from subcategories where id=$id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) < 1) {
    // category not found, exit
    echo '<p class="red-text">Subcategory not found. <a href="../categories/index.php">Go back</a>.</p>';
} else {
    // category found, continue
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // if submitted
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $des = $_POST['des'];
        $photo2 = '';
        $photo3 = '';
        $path = '../../img/products/';
        if (isset($_FILES['photo1'])) {
            $photo1_name = basename($_FILES['photo1']['name']);
            move_uploaded_file($_FILES['photo1']['tmp_name'], $path . $photo1_name);
            $photo1 = $photo1_name;
        }
        if (isset($_FILES['photo2'])) {
            $photo2_name = basename($_FILES['photo2']['name']);
            move_uploaded_file($_FILES['photo2']['tmp_name'], $path . $photo2_name);
            $photo2 = $photo2_name;
        }
        if (isset($_FILES['photo3'])) {
            $photo3_name = basename($_FILES['photo3']['name']);
            move_uploaded_file($_FILES['photo3']['tmp_name'], $path . $photo3_name);
            $photo3 = $photo3_name;
        }

        $sql = "INSERT INTO products (name, sub_cat_id, price, quantity, des, photo1, photo2, photo3) VALUES ('$name','$id','$price','$quantity','$des','$photo1','$photo2','$photo3')";
        if ($conn->query($sql) === TRUE) {
            // register successful
            echo "<p class='green-text'>Added successfully! <a href='index.php?id=$id'>Go back</a></p>";
        } else {
            // something is wrong
            echo "<p class='red-text'>Something is wrong. <a href='add.php?id=$id'>Try again</a>.</p>" . mysqli_error($conn);
        }
    } else {
        // if not submitted
?>
        <form method="post" action="add.php?sub_id=<?= $id; ?>" enctype="multipart/form-data">
            <div class="input-field">
                <label for="name">Name</label><input type="text" name="name" required>
            </div>
            <div class="input-field">
                <label for="price">Price</label><input type="number" name="price" required>
            </div>
            <div class="input-field">
                <label for="quantity">Quantity</label><input type="number" name="quantity" required>
            </div>
            <div class="input-field">
                <textarea id="des" name="des" class="materialize-textarea"></textarea><label for="des">Description</label>
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
                <div class="col s4"><button type="submit" class="btn waves-effect full-width">Add</button></div>
                <div class="col s4"></div>
                <div class="col s4"> <a href="index.php?id=<?= $id; ?>" class="right btn waves-effect full-width">Back</a></div>
            </div>
        </form>
<?php
    }
}
echo '</div>';
require_once("../../include/footer.php");
?>