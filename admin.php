<?php
require('config/config.php');
require('config/db.php');
?>

<?php include('header-admin.php'); ?>
<h1>Welcome admin</h1>

<div>
    <ul class="menu">
        <form class="menu form" method="GET" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            <li><input type="submit" name="add" class="option" value="Adicionar empregado"></li>
            <li><input type="submit" name="edit" class="option" value="Editar empregado"></li>
            <li><input type="submit" name="remove" class="option" value="Remover empregado"></li>
            <li><input type="submit" name="show" class="option" value="Ver tabela de empregados"></li>
            <li><input type="submit" name="showtime" class="option" value="Ver tabela de horarios"></li>
        </form>
    </ul>
</div>

<div class="view">

    <?php
    if (isset($_GET['add'])) {
        include('admin-functions/add-employee.php');
    }
    if (isset($_GET['edit'])) {
        include('admin-functions/edit-employee.php');
    }
    if (isset($_GET['remove'])) {
        include('admin-functions/remove-employee.php');
    }
    if (isset($_GET['show'])) {
        include('admin-functions/show-employees.php');
    }
    if (isset($_GET['showtime'])) {
        include('admin-functions/show-timetable.php');
    }

    ?>

</div>
<?php include('footer.php') ?>