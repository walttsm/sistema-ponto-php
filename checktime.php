<?php
require('config/config.php');
require('config/db.php');
require('config/session.php');



?>

<?php include('header.php'); ?>
<h1>Registro de horários para <?php echo $_SESSION['name']; ?></h1>
<div class="table">
    <table>
        <tr>
            <th>data</th>
            <th>horario_ent</th>
            <th>horario_saida</th>
            <th>horas_trabalhadas</th>
        </tr>
        <?php
        //Requesting table from server
        $id =  $_SESSION['id'];
        $query = "SELECT * FROM horarios WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($result)) {
            echo '<tr><td class="cell">' . $row["data"] . '</td><td class="cell"> ' . $row["horario_ent"] . '</td><td class="cell"> ' . $row["horario_saida"] . '</td><td class="cell"> ' . $row["horas_trabalhadas"] . '</td></tr>';
        }
        ?>
    </table>
</div>
<?php include('footer.php'); ?>