<?php 
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);


    if(mb_strlen($login) <1 || mb_strlen($login) > 90){
        echo "Недопустимая длина логина";
        exit();
    } else if (mb_strlen($name) <1 || mb_strlen($name) > 50){
        echo "Недопустимая длина Имени";
        exit();
    } else if (mb_strlen($pass) <1 || mb_strlen($pass) > 50){
        echo "Недопустимая длина пароля";
        exit();
    }
    
    $pass = md5($pass."qwertyui4327");

    $mysql = new mysqli('localhost','root','root','home');
    $mysql->query("INSERT INTO `users` (`name`,`login`, `pass`)
    VALUES('$name','$login', '$pass')");

    // $mysqli->close();
    header('Location: /');
?>

