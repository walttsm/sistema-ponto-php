<?php
require('config/config.php');
require('config/db.php');
require('config/session.php');
?>
<?php include("header.php"); ?>
<p>Welcome <?php echo $_SESSION['name']; ?>! </p>
<h1>Main</h1>
<button type="submit" class="btn btn-start">Registrar entrada</button>
<button type="submit" class="btn btn-exit">Registrar saída</button>

<?php include("footer.php"); ?>