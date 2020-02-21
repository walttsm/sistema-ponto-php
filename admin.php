<?php
require('config/config.php');
require('config/db.php');
?>

<?php include('header-admin.php'); ?>
<h1>Welcome admin</h1>

<div class="Side Menu">
    <ul>
        <form method="GET" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            <li><input type="submit" name="add" class="option" value="add-employee"></li>
            <li><input type="submit" name="edit" class="option" value="edit-employee"></li>
            <li><input type="submit" name="remove" class="option" value="remove-employee"></li>
            <li><input type="submit" name="show" class="option" value="show employees"></li>
        </form>
    </ul>
</div>

<div class="view">

    <?php
    if (isset($_GET['add'])) {
        include('admin-functions/add-employee.php');
    }
    if (isset($_GET['edit'])) {
        echo '
        <div class="container">
        <form method="POST" action="admin.php">
            <div class="row">
                <label class="column1" for="id">Id:</label>
                <input class="column2" type="text" name="id"> <br>
            </div>
            <div class="row">
                <label class="column1" for="password">Password:</label>
                <input class="column2" type="text" name="password"> <br>
            </div>
            <div class="row">
                <input class="btn" value="Enviar" type="submit">
            </div>
        </form>
        </div>';
    }
    if (isset($_GET['remove'])) {
        echo '
        <div class="container">
        <form method="POST" action="admin.php">
            <div class="row">
                <label class="column1" for="id">Id:</label>
                <input class="column2" type="text" name="id"> <br>
            </div>
            <div class="row">
                <input class="btn" value="Enviar" type="submit">
            </div>
        </form>
        </div>';
    }
    if (isset($_GET['show'])) {
        echo '<div class="table">
    <table>
        <tr>
            <th>nome</th>
            <th>password</th>
            <th>id</th>
        </tr>';

        //Requesting table from server
        $query = "SELECT * FROM funcionarios";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($result)) {
            echo '<tr><td class="cell">' . $row["nome"] . '</td><td class="cell"> ' . $row["password"] . '</td><td class="cell"> ' . $row["id"] . '</td></tr>';
        }
        echo '</table>
    </div>';
    }

    ?>

</div>
<?php include('footer.php') ?>