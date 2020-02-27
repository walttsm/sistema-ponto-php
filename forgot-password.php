<?php
include('config/config.php');
include('config/db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <form method="POST" action="">
            <div class="row">
                <label class="column1" for="id">Id: *</label>
                <input required="required" class="column2" type="text" name="id"> <br>
            </div>
            <div class="row">
                <label class="column1" for="password">Nova senha: *</label>
                <input class="column2" type="password" name="password"> <br>
            </div>
            <div class="row">
                <input class="btn" name="update" value="Enviar" type="submit">
            </div>
            <div class="row">
                <a href="login.php">Voltar</a>
            </div>
        </form>
        <?php
        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $password = $_POST['password'];
            $query = "UPDATE funcionarios
            SET password = '$password'
            WHERE id='$id'";
            $result = mysqli_query($conn, $query);
            if ($result == TRUE) {
                $alert = "Nova senha cadastrada";
                echo "<script type='text/javascript'>alert('$alert');</script>";
            }
        }
        ?>
    </div>

</body>

</html>