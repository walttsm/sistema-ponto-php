<!--</*?php
$query = "SELECT id,nome FROM funcionarios";
$result = mysqli_query($conn, $query);
$ids = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach ($ids as $employee) {
    echo '<p style="Margin:0;" class="id-list"> Id: ' . $employee["id"] . ' - ' . $employee["nome"] . '</p> ';
} */?>-->
<div class="container">
    <form method="POST" action="">

        <div class="row">
            <label class="column1" for="id">Id: *</label>
            <input required="required" class="column2" type="text" name="id"> <br>
        </div>
        <div class="row">
            <label class="column1" for="name">Novo Nome:</label>
            <input class="column2" type="text" name="name" placeholder="Deixe em branco para manter o nome"> <br>
        </div>
        <div class="row">
            <label class="column1" for="password">Nova senha:</label>
            <input class="column2" type="text" name="password" placeholder="Deixe em branco para manter a senha"> <br>
        </div>
        <div class="row">
            <input class="btn" name="update" value="Enviar" type="submit">
        </div>

</div>
</form>
<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    if ($_POST['name']) {
        $nome = mysqli_escape_string($conn, $_POST['name']);
    } else {
        $query = "SELECT nome FROM funcionarios WHERE id ='$id'";
        $result = mysqli_query($conn, $query);
        $arr = mysqli_fetch_assoc($result);
        $nome = $arr['nome'];
    }
    if ($_POST['password']) {
        $password = mysqli_escape_string($conn, $_POST['password']);
    } else {
        $query = "SELECT password FROM funcionarios WHERE id ='$id'";
        $result = mysqli_query($conn, $query);
        $arr = mysqli_fetch_assoc($result);
        $nome = $arr['password'];
    }

    $query = "UPDATE funcionarios
            SET nome = '$nome' , password = '$password'
            WHERE id='$id'";
    $result = mysqli_query($conn, $query);
}
?>


</div>