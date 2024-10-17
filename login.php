<?php
    include 'db.php';
    session_start();

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row && password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
        } else {
            echo "Username atau password salah.";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2><br>
        <form action="" method="POST">
            <label>Username:</label>
            <input type="text" name="username" class="form1"required><br>
            <label>Password:</label>
            <input type="password" name="password" class="form1" required><br>
            <input type="submit" name="submit" value="Login">
        </form>
        <br>
        <a href="register.php" class="btn-detail">Register Here</a>
    </div>
</body>
</html>