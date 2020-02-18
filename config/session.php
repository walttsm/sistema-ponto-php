<?php
include('db.php');
session_start();

$user_id = mysqli_real_escape_string($conn, $_SESSION['id']);
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    die();
}

//Get employee info

$query = "SELECT * FROM funcionarios WHERE id = '$user_id' ";
$result = mysqli_query($conn, $query);
$user_info = mysqli_fetch_array($result, MYSQLI_ASSOC);



//Store info in session
$_SESSION['name'] = $user_info['nome'];
$_SESSION['password'] = $user_info['password'];
$_SESSION['id'] = $user_info['id'];
