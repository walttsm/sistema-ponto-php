<?php
include('config/config.php');
include('config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Associating form data to variables
    $admin_id = mysqli_real_escape_string($conn, $_POST['login']);
    $user_pass = mysqli_real_escape_string($conn, $_POST['password']);

    //Get if user is in table:
    $query = "SELECT * FROM admins WHERE login = '$admin_id' and password = '$user_pass'";
    $result = mysqli_query($conn, $query);

    $count = mysqli_num_rows($result);

    // Checks if user is valid
    if ($count == 1) {
        header("Location: admin.php");
    } else {
        $alert = "Incorrect user or password";
        echo "<script type='text/javascript'>alert('$alert');</script>";
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>

<body class="login-page">
    <div class="container">
        <h1>Admin Login</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="row">
                <div class="column1">
                    <label for="login">Login: </label>
                </div>
                <div class="column2">
                    <input type="text" name="login" value="adm"> <br>
                </div>
            </div>
            <div class="row">
                <div class="column1">
                    <label for="password">Password: </label>
                </div>

                <div class="column2">
                    <input type="password" name="password" value="adm"> <br>
                </div>
            </div>
            <div class="row">
                <input type="submit" name="submit" value="Login" class="btn btn-login">
            </div>
        </form>
</body>

</html>