<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.php");
}
include('config.php');

$id = $_GET['id'];
$query = "DELETE FROM partai WHERE id=$id";
mysqli_query($conn, $query);

header("Location: dashboard.php");
?>
