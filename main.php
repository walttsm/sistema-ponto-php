<?php
require('config/config.php');
require('config/db.php');
require('config/session.php');

// Attributing variables to include in table
date_default_timezone_set("America/Sao_Paulo");
$id = $_SESSION['id'];
$day = date('Y/m/d');
$hour = date('H:i:s');

//query to include dates
if (isset($_POST['btn-start'])) {
    $query = "SELECT * FROM horarios WHERE data = '$day' AND id = '$id'";
    $result = mysqli_query($conn, $query);
    if ($result == FALSE) {
        $query = "INSERT INTO horarios (id, data, horario_ent)
        VALUES ('$id', '$day', '$hour')";
        $result = mysqli_query($conn, $query);
        if ($result == true) {
            echo "Entrada do dia" . $day . "as" . $hour .  "registrada";
        }
    } else {
        $alert = "Já há um horário registrado";
        echo "<script type='text/javascript'>alert('$alert');</script>";
    }
}

if (isset($_POST['btn-exit'])) {
    $query = "SELECT horario_ent FROM horarios WHERE data = '$day' AND id = '$id' ";
    $result = mysqli_query($conn, $query);
    if ($result == true) {
        $arr = mysqli_fetch_assoc($result);
        if ($arr["horario_ent"] == NULL) {
            $alert = "Não é possivel registrar horario de saida sem horario de entrada";
            echo "<script type='text/javascript'>alert('$alert');</script>";
        } else {
            $hora_ent = strtotime($day . $arr["horario_ent"]);
            $hora_saida = strtotime(date('Y/m/d H:i:s'));
            echo $hora_ent . ' ' . $hora_saida . '<br>';
            $horas_trab = ($hora_saida - $hora_ent) / 3600;
            echo $horas_trab;
            $query = "UPDATE horarios
            SET
                horario_saida = '$hour',
                horas_trabalhadas = '$horas_trab'
            WHERE 
                id = '$id' AND data = '$day';";
            $result = mysqli_query($conn, $query);
            var_dump($result);
            if ($result == TRUE) {
                echo "Saida do dia" . $day . "as" . $hour .  "registrada";
            }
        }
    }
}
?>

<?php include("header.php"); ?>
<p>Welcome <?php echo $_SESSION['name']; ?>! </p>
<h1>Main</h1>
<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
    <input type="submit" name="btn-start" value="Registrar entrada" class="btn btn-start">
</form>

<form method="POST" action="">
    <input type="submit" name="btn-exit" value="Registrar saída" class="btn btn-exit">
</form>

<?php include("footer.php"); ?>