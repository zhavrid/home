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
    <script type="text/javascript" src="/js/script.js"></script> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
  <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">    
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="./index.php"><img class="logo" src="./img/logo_white.svg"></a></li>
          <li><a href="./index.php" class="nav-link px-2 text-secondary">Главная</a></li>
          <li><a href="./office.php" class="nav-link px-2 text-white">Добавить в аренду</a></li>
          <li><a href="./spisok.php" class="nav-link px-2 text-white">Список арендуемых</a></li>
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
      <h1 class="display-4 fw-normal">Аренда недвижимости в Минске</h1>
      <p class="fs-5 text-muted mt-4">Сейчас актуально:</p>
    </div>
  </section>
  
  
  <section class="container">
    <div class="row row-cols-1 row-cols-md-3 mb-3 ">
      <?php 
        $flats = mysqli_query($connect, "SELECT * FROM `flats`");
        $flats = mysqli_fetch_all($flats);
        foreach($flats as $flat){
        ?>
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header">
                <h4 class="my-0 fw-normal fs-5"><?= $flat[1] ?></h4>
                <ul class="list-unstyled mt-3">
                  <li><img src="https://content.kufar.by/static/frontend/svg/metro_v2.svg" alt="metro"><?=$flat[3] ?></li>
                </ul>
              </div>
              <div class="card-body ">
                <div class="text-center"><?= $flat[7] ?></div> 
                <ul class="list-unstyled mt-3 mb-4">
                  <li><?= $flat[2] ?>- комнатная</li>
                  <li><?= $flat[4] ?> за месяц</li>
                </ul>
                  <button type="button" class="w-100 btn btn-lg btn-outline-primary">Арендовать</button>
              </div>
            </div>
          </div>
        <?php
        }
      ?>
    </div>
  </section>

  <footer class="py-3 my-4 d-flex justify-content-center">
    <img class="logo" src="./img/logo_black.svg">
    <p class="text-muted">© 2022 Company, Zhavrid</p>
  </footer>

  <div class="" role="dialog" id="modalSignin">
    <div id="divWin">
      <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow">
          <div class="modal-header p-5 pb-4 border-bottom-0">
            <h1 class="fw-bold mb-0 fs-2 text-dark">Sign up</h1>
            <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <div class="modal-body p-5 pt-0">
            <form action="validation-form/check.php" method="POST">
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="login" id="floatingInput" placeholder="Login">
                <label class="floatingInput text-dark">Login</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="name" id="floatingName" placeholder="Name">
                <label class="floatingInput text-dark">Name</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-3" name="pass" id="floatingPassword" placeholder="Password">
                <label class="floatingPassword text-dark">Password</label>
              </div>
              <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Register</button>
              <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="" role="dialog" id="modalSignins">
    <div id="divWin">
      <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow">
          <div class="modal-header p-5 pb-4 border-bottom-0">
            <h1 class="fw-bold mb-0 fs-2 text-dark login">Login</h1>
            <button type="button" class="btn-close closes" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-5 pt-0">
            <form action="validation-form/auth.php" method="POST">
              <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="login" id="floatingInput" placeholder="Login">
                <label class="floatingInput text-dark">Login</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-3" name="pass" id="floatingPassword" placeholder="Password">
                <label class="floatingPassword text-dark">Password</label>
              </div>
              <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Sign up</button>
              <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> 
</body>
</html>