<?php
require('config/config.php');
require('config/db.php');
require('config/session.php');

// Attributing variables to include in table
date_default_timezone_set("America/Sao_Paulo");
$id = $_SESSION['id'];
$date = getdate(time());
print_r($date);
$horario = date("h:i:sa");

//query to include dates



/*if (isset($_POST['btn-exit'])) {
    $query = "SELECT horario_saida FROM horarios WHERE data = '$date'";
    $result = mysqli_query($conn,$query);
}*/
?>
<?php include("header.php"); ?>
<p>Welcome <?php echo $_SESSION['name']; ?>! </p>
<h1>Main</h1>
<form method="POST" action="">
    <input type="submit" name="btn-start" class="btn btn-start">Registrar entrada</button>
</form>
<?php
if (isset($_POST['btn-start'])) {
    $query = "INSERT INTO horarios (id, data) VALUES ($id, $date)";
    $result = mysqli_query($conn, $query);
    $query1 = "INSERT INTO horarios (horario_ent) VALUES ($horario)";
    $result1 = mysqli_query($conn, $query1);
    echo "Sucesso ao incluir horario de entrada";
}
?>
<form method="POST" action="">
    <input type="submit" name="btn-exit" class="btn btn-exit">Registrar saída</button>
</form>

<?php include("footer.php"); ?>