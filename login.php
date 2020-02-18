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
        echo "Incorrect user or password, please try again or contact the system admin";
    }
}




mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
        <label for="id">Id: </label>
        <input type="text" name="id"> <br>
        <label for="password">Password: </label>
        <input type="password" name="password"> <br>
        <input type="submit" name="login" value="submit" class="btn">
    </form>
</body>

</html>