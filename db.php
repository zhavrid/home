<?php 



define('DB_DRIVER','mysql');
define('DB_HOST','localhost');
define('DB_NAME','home');
define('DB_USER','root');
define('DB_PASSWORD','root');

$db = new \PDO(DB_DRIVER.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);


// mysqli_query($connect, "INSERT INTO `flats` (`id`, `u_id`, `street`, `size`, `place`, `price`, `img`) VALUES (NULL, '$u_id', '$street', '$size', '$place', '$price', '$photo');");

header('Location: /');

?>