<?php
$title = "this is categories page";
require_once("../../include/header.php");
$sql ="select * from categories";
$result = mysqli_query($conn, $sql);
echo '<h1>Categories</h1>
<p><a href="add.php" class="btn waves-effect">Add Category</a></p>';
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
    <td><a href='../subcategories/index.php?id=" . $row["id"]. "'>" . $row["name"]. "</a></td>
    <td><a href='update.php?id=" . $row["id"]. "'><i class='material-icons'>edit</i></a> <a href='delete.php?id=" . $row["id"]. "'><i class='material-icons red-text'>delete_forever</i></a></td>
    </tr>";
  }
  echo '</table>';
} else {
  echo "0 results";
}
require_once("../../include/footer.php");
?>