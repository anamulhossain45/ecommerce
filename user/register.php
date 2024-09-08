<?php
$title = "Register Page";
require_once("../include/header.php");
echo '<div class="card-panel teal lighten-5"><h1>Register</h1>';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // if submitted
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $sql = "INSERT INTO users (name, email, phone, password) VALUES ('$name','$email','$phone','$password')";
    if ($conn->query($sql) === TRUE) {
        // register successful
        echo '<p class="green-text">Register successful!</p>';
    } else {
        // something is wrong
        echo '<p class="red-text">Something is wrong. <a href="register.php">Try again</a>.</p>';
    }
} else {
    // if not submitted
?>
    <form method="post" action="register.php">
        <div class="input-field">
            <label for="name">Full Name</label><input type="text" name="name" required>
        </div>
        <div class="input-field">
            <label for="email">Email</label><input type="email" name="email" required>
        </div>
        <div class="input-field">
            <label for="phone">Phone Number</label><input type="tel" name="phone" required>
        </div>
        <div class="input-field">
            <label for="password">Password</label><input type="password" name="password" required>
        </div>
        <div class="row"><div class="col s4"><button type="submit" class="btn waves-effect full-width">Register</button></div>
        <div class="col s4"></div><div class="col s4"> <a href="login.php" class="right btn waves-effect full-width">Login</a></div></div>
    </form>
<?php
}
echo '</div>';
require_once("../include/footer.php");
?>