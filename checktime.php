<?php
require('config/config.php');
require('config/db.php');
require('config/session.php');



?>

<?php include('header.php'); ?>
<h1>Registro de horários para <?php echo $_SESSION['name']; ?></h1>
<?php
//Requesting table from server
$id =  $_SESSION['id'];
$query = "SELECT * FROM horarios WHERE id = '$id'";
$result = mysqli_query($conn, $query);

echo "<table>";
echo "
    <tr>
        <th>data</th>
        <th>horario_ent</th>
        <th>horario_saida</th>
    </tr>";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr><td>" . $row['data'] . '</td><td> ' . $row['horario_ent'] . '</td><td> ' . $row['horario_saida'] . "</td></tr>";
}
echo "</table>"
?>
<?php include('footer.php'); ?>