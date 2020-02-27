<div class="container">

    <form method="POST" action="">
        <div class="row">
            <label class="column1" for="id">Id:</label>
            <input class="column2" type="text" name="id"> <br>
        </div>
        <div class="row">
            <input class="btn" name="submit" value="Enviar" type="submit">
        </div>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $query = "DELETE FROM funcionarios WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result == true) {
            echo '<p>Funcionario apagado!</p>';
        }
    }
    ?>
</div>