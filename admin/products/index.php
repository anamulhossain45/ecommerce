<?php
$title = "Products page";
require_once("../../include/header.php");
$id = $_GET['id']; // get subcategory id
$cat_id = ($_GET['cat_id']) ? $_GET['cat_id'] : ''; // get category id
$sql = "select * from subcategories where id=$id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) < 1) {
    // category not found, exit
    echo '<p class="red-text">Subcategory not found. <a href="../categories/index.php">Go back</a>.</p>';
} else {
  // category found, continue
$sql ="select * from products where sub_cat_id='$id'";
$result = mysqli_query($conn, $sql);
echo "<h1>Products</h1>
<p><a href='add.php?sub_id=$id' class='btn waves-effect'>Add Products</a></p>";
if (mysqli_num_rows($result) > 0) {
  // output data of each row
echo '<table class="highlight">
<thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Actions</th>
          </tr>
        </thead>';
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>" . $row["id"]. "</td>
    <td><a href='../products/details.php?id=" . $row["id"]. "&sub_id=$id'>" . $row["name"]. "</a></td>
    <td><a href='update.php?id=" . $row["id"]. "&sub_id=$id'><i class='material-icons'>edit</i></a> <a href='delete.php?id=" . $row["id"]. "&sub_id=$id'><i class='material-icons red-text'>delete_forever</i></a></td>
    </tr>";
  }
  echo '</table>';
} else {
  echo "0 results";
}
}
echo "<p><a href='../subcategories/index.php?id=$cat_id' class='btn waves-effect'>Go back</a></p>";
require_once("../../include/footer.php");
?>