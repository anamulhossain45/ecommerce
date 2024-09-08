<?php
$title = "Subategories page";
require_once("../../include/header.php");
$id = $_GET['id']; // get category id
$sql = "select * from categories where id=$id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) < 1) {
    // category not found, exit
    echo '<p class="red-text">Category not found. <a href="../categories/index.php">Go back</a>.</p>';
} else {
  // category found, continue
$sql ="select * from subcategories where cat_id='$id'";
$result = mysqli_query($conn, $sql);
echo "<h1>Sub Categories</h1>
<p><a href='add.php?id=$id' class='btn waves-effect'>Add Subategory</a></p>";
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
    <td><a href='../products/index.php?id=" . $row["id"]. "&cat_id=$id'>" . $row["name"]. "</a></td>
    <td><a href='update.php?id=" . $row["id"]. "&cat_id=$id'><i class='material-icons'>edit</i></a> <a href='delete.php?id=" . $row["id"]. "&cat_id=$id'><i class='material-icons red-text'>delete_forever</i></a></td>
    </tr>";
  }
  echo '</table>';
} else {
  echo "0 results";
}
}
echo "<p><a href='../categories/index.php' class='btn waves-effect'>Go back</a></p>";
require_once("../../include/footer.php");
?>