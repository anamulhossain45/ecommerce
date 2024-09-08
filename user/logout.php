<?php
$title = "Logout Page";
require_once("../include/header.php");
session_destroy();
?>
<h1>Logout</h1>
<p class="card-panel green lighten-4 green-text">Logout successful! <a href="login.php">Login again</a>.</p>