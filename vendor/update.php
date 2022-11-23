<?php 
// выход из папки
require_once '../config/connect.php';


$id = $_POST['id'];
$street = $_POST['street'];
$place = $_POST['place'];
// $photo = $_POST['photo'];
$size = $_POST['size'];
$price = $_POST['price'];


mysqli_query($connect, "UPDATE `flats` SET `street` = '$street', `size` = '$size', `place` = '$place', `price` = '$price' WHERE `flats`.`id` = '$id';");

// , `img` = 'qqq'

header('Location: ../office.php');

?>