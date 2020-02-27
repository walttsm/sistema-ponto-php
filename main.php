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
    $query = "SELECT * FROM horarios WHERE id = '$id' AND data = '$day'";
    $result = mysqli_query($conn, $query);
    $arr = mysqli_fetch_assoc($result);
    if ($arr  == NULL) {
        $query = "INSERT INTO horarios (id, data, horario_ent)
        VALUES ('$id', '$day', '$hour')";
        $result = mysqli_query($conn, $query);
        if ($result == true) {
            $alert = "Entrada do dia " . $day . " as " . $hour .  " registrada";
            echo "<script type='text/javascript'>alert('$alert');</script>";
        }
    } else {
        $alerterr = "Já há um horário registrado";
        echo "<script type='text/javascript'>alert('$alerterr');</script>";
    }
}

if (isset($_POST['btn-exit'])) {
    $query = "SELECT horario_ent FROM horarios WHERE data = '$day' AND id = '$id' ";
    $result = mysqli_query($conn, $query);
    if ($result == true) {
        $arr = mysqli_fetch_assoc($result);
        if ($arr["horario_ent"]) {
            $hora_ent = strtotime($day . $arr["horario_ent"]);
            $hora_saida = strtotime(date('Y/m/d H:i:s'));
            $horas_trab = ($hora_saida - $hora_ent) / 3600;
            $query = "UPDATE horarios
            SET
                horario_saida = '$hour',
                horas_trabalhadas = '$horas_trab'
            WHERE 
                id = '$id' AND data = '$day';";
            $result = mysqli_query($conn, $query);
            if ($result == TRUE) {
                $alert = "Saida do dia " . $day . " as " . $hour .  " registrada";
                echo "<script type='text/javascript'>alert('$alert');</script>";
            }
        } else {
            $alert = "Não é possivel registrar horario de saida sem horario de entrada";
            echo "<script type='text/javascript'>alert('$alert');</script>";
        }
    }
}
mysqli_close($conn);
?>

<?php include("header.php"); ?>
<h2>Bem-vindo(a) <?php echo $_SESSION['name']; ?>! </h2>
<div class="container">
    <h3 id="ponto-title">Registrar ponto</h3>
    <div class="row btn-row">
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <input type="submit" name="btn-start" value="Registrar entrada" class="btn btn-start">
        </form>

        <form method="POST" action="">
            <input type="submit" name="btn-exit" value="Registrar saída" class="btn btn-exit">
        </form>
    </div>
</div>

<?php include("footer.php"); ?>