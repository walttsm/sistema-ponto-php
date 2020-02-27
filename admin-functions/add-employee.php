<div class="container">
    <form method="POST" action="">
        <div class="row">
            <label class="column1" for="name">Name:</label>
            <input class="column2" type="text" name="name"> <br>
        </div>
        <div class="row">
            <label class="column1" for="password">Password:</label>
            <input class="column2" type="text" name="password"> <br>
        </div>
        <div class="row">
            <input class="btn" name="submit" value="Enviar" type="submit">
        </div>
    </form>
</div>
<?php
//Add employee
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $pass = mysqli_escape_string($conn, $_POST['password']);
    $query = "INSERT INTO funcionarios(nome, password) VALUES ('$name', '$pass')";
    $result = mysqli_query($conn, $query);
    if ($result == TRUE) {
        $alert = "O funcionario foi incluido com sucesso!";
        echo "<script type='text/javascript'>alert('$alert')</script>";
    } else {
        $alert = "Não foi possível incluir o funcionário";
        echo "<script type='text/javascript'>alert('$alert')</script>";
    }
}
?>