<div class="row filter">
    <label class="column-1" for="id">Filtrar Id: </label>
    <form method="POST" class="id-filter" action="">
        <input class="column-2" type="text" name="id" placeholder='Branco = ver todos'>
        <input type="submit" name="submit" value="Filtrar">
    </form>
</div>
<div class="table table-top">
    <table>
        <tr>
            <th>Id</th>
            <th>Data</th>
            <th>Horario de Entrada</th>
            <th>Horario de saida</th>
            <th>Horas Trabalhadas</th>
        </tr>
        <?php
        //Requesting table from server
        if (!empty($_POST['id'])) {
            $id = $_POST['id'];
            $query = "SELECT * FROM horarios WHERE id = '$id'";
            $result = mysqli_query($conn, $query);
        } else {
            $query = "SELECT * FROM horarios";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
            echo '<tr><td class="cell">' . $row["id"] . '</td><td class="cell"> ' . $row["data"] . '</td><td class="cell"> ' . $row["horario_ent"] .
                '</td><td class="cell"> ' . $row["horario_saida"] . '</td><td class="cell"> ' . $row["horas_trabalhadas"] . '</td></tr>';
        }
        ?>
    </table>
</div>