<?php
$title = "User Page";
require_once("../include/header.php");
echo '<h1>User</h1>';
if(isset($_SESSION['login'])) {
    echo 'Logged In';
} else {
    echo 'Not logged in';
}
require_once("../include/footer.php");
?>