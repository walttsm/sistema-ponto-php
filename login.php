<?php
include('config/config.php');
include('config/db.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Associating form data to variables
    $user_id = mysqli_real_escape_string($conn, $_POST['id']);
    $user_pass = mysqli_real_escape_string($conn, $_POST['password']);

    //Get if user is in table:
    $query = "SELECT id FROM funcionarios WHERE id = '$user_id' and password = '$user_pass'";
    $result = mysqli_query($conn, $query);

    $count = mysqli_num_rows($result);

    // Checks if user is valid
    if ($count == 1) {
        $_SESSION['id'] = $user_id;
        header("Location: main.php");
    } else {
        $alert = "Id ou senha incorretos, tente novamente ou contate o administrador.";
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
        <h1>Login</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="row">
                <div class="column1">
                    <label for="id">Id: </label>
                </div>
                <div class="column2">
                    <input type="text" name="id"> <br>
                </div>
            </div>
            <div class="row">
                <div class="column1">
                    <label for="password">Password: </label>
                </div>

                <div class="column2">
                    <input type="password" name="password"> <br>
                </div>
            </div>
            <div class="row">
                <a href="forgot-password.php">Esqueci minha senha</a>
            </div>
            <div class="row">
                <input type="submit" name="login" value="Login" class="btn btn-login">
            </div>
        </form>
        <a href="admin-login.php"><button class="btn btn-admin">Admin</button></a>
</body>

</html>