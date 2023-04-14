<?php
$title = "Login Page";
require_once("../include/header.php");
echo '<div class="card-panel teal lighten-5"><h1>Login</h1>';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // if submitted
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = 'select * from users where email="' . $email . '" AND password="' . $password . '"';
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // login successful
        $_SESSION['login'] = 1;
        echo '<p class="green-text">Login successful!</p>';
    } else {
        // email or password wrong
        echo '<p class="red-text">Email or password is wrong. <a href="login.php">Try again</a>.</p>';
    }
} else {
    // if not submitted
?>
    <form method="post" action="login.php">
        <div class="input-field">
            <label for="email">Email</label><input type="text" name="email">
        </div>
        <div class="input-field">
            <label for="password">Password</label><input type="password" name="password">
        </div>
        <div class="row"><div class="col s4"><button type="submit" class="btn waves-effect full-width">Login</button></div>
        <div class="col s4"></div>
        <div class="col s4"><a href="register.php" class="right btn waves-effect full-width">Register</a></div></div>
    </form>
<?php
}
echo '</div>';
require_once("../include/footer.php");
?>