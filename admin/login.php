<?php
session_start();
include "../config.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,
        "SELECT * FROM admins WHERE username='$username'"
    );

    $data = mysqli_fetch_assoc($query);

    if ($data && password_verify($password, $data['password'])) {
        $_SESSION['admin'] = $data['username'];
        header("Location: index.php");
    } else {
        $error = "Username atau password salah";
    }
}
?>

<h2>🔐 Login Admin</h2>

<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>

<form method="POST">
    <input name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button name="login">Login</button>
</form>
