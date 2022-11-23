<?php 
require_once '../config/connect.php';

$id = $_GET['id'];
mysqli_query($connect, "DELETE FROM `flats` WHERE `flats`.`id` = '$id';");

header('Location: ../office.php');
?>