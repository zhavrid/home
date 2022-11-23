<?php 
// выход из папки
require_once '../config/connect.php';

$street = $_POST['street'];
$place = $_POST['place'];
$photo = $_POST['photo'];
$size = $_POST['size'];
$price = $_POST['price'];
$u_id = $_COOKIE['user'];




mysqli_query($connect, "INSERT INTO `flats` (`id`, `u_id`, `street`, `size`, `place`, `price`, `img`) VALUES (NULL, '$u_id', '$street', '$size', '$place', '$price', '$photo');");

header('Location: /');


?>