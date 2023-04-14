<?php
$title = "Product Details";
require_once("../../include/header.php");
echo '<h1>Product Details</h1>';
$id = $_GET['id'];
$sub_id = $_GET['sub_id'];
$sql = "select * from products where id=$id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) < 1) {
    // category not found, exit
    echo "<p class='red-text'>Product not found. <a href='../subcategories/index.php?id=$sub_id'>Go back</a>.</p>";
} else {
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $price = $row['price'];
        $quantity = $row['quantity'];
        $des = $row['des'];
        $photo1 = $row['photo1'];
        $photo2 = $row['photo2'];
        $photo3 = $row['photo3'];
    }
    // product found, continue
?>
    <table class="highlight">
        <tbody>
        <tr>
            <td>Name</td>
            <td><?=$name;?></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><?=$price;?></td>
        </tr>
        <tr>
            <td>Quantity</td>
            <td><?=$quantity;?></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><?=$des;?></td>
        </tr>
        <tr>
            <td>Photo</td>
            <td><img src="../../img/products/<?=$photo1;?>" class="responsive-img"></td>
        </tr>
        <tr>
            <td>Photo 2</td>
            <td><img src="../../img/products/<?=$photo3;?>" class="responsive-img"></td>
        </tr>
        <tr>
            <td>Photo 3</td>
            <td><img src="../../img/products/<?=$photo2;?>" class="responsive-img"></td>
        </tr>
        </tbody>
    </table>
<?php
}
require_once("../../include/footer.php");
?>