<?php
require('config/config.php');
require('config/db.php');
session_start();
//Get info from server
$query = 'SELECT * FROM funcionarios';

//Associate the table to a variable
$result = mysqli_query($conn, $query);
$employees = mysqli_fetch_all($result, MYSQLI_ASSOC);

//Check if button is pressed

if (isset($_POST['submit'])) {
    foreach ($employees as $employee) {
        if ($employee['id'] === $_POST['id'] && $employee['password'] === $_POST['password']) {
            header('localhost/sistema-ponto/main.php');
        }
    }
}



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
        <input name="id"> <br>
        <label for="password">Password: </label>
        <input type="password" name="password" value=""> <br>
        <input type="submit" name="login" value="login" class="btn">
    </form>
</body>

</html>