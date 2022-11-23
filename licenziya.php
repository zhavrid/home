<?php 
require_once './config/connect.php';
include __DIR__ . '/config/connect.php';
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/home_title.svg">
    <title>Real estate agency</title>
    <link type="text/css" rel="stylesheet" href="css/style.css" media="all"/>
    <script type="text/javascript" src="../home/js/script.js"></script> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
  <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">    
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="./index.php"><img class="logo" src="./img/logo_white.svg"></a></li>
          <li><a href="./index.php" class="nav-link px-2 text-white">Главная</a></li>
          <li><a href="./office.php" class="nav-link px-2 text-white">Добавить в аренду</a></li>
          <li><a href="./spisok.php" class="nav-link px-2 text-secondary">Список арендуемых</a></li>
          <li><a href="./licenziya.php" class="nav-link px-2 text-white">Лицензия</a></li>
          <li><a href="/exit.php" class="nav-link px-2 text-white">Exit</a></li>
        </ul>
    
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2 reg">Register</button>
          <button type="button" class="btn btn-warning sign login">Login</button>
        </div>
      </div>
    </div>
  </header>

  <section class="container">
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <img src="./img/licenziya.jpg" width="300px" height="500px">
    </div>
  </section>


    <p class="text-center text-muted">Здравствуйте, <?=$_COOKIE['user']?>. Чтобы выйти из своего аккаунта <a href="/exit.php">здесь</a>.</p> 
  
  <footer class="py-3 my-4 d-flex justify-content-center">
    <img class="logo" src="./img/logo_black.svg">
    <p class="text-muted">© 2022 Company, Zhavrid</p>
  </footer>

</body>
</html>