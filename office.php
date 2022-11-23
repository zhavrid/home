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
          <li><a href="./office.php" class="nav-link px-2 text-secondary">Добавить в аренду</a></li>
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

  <?php
    if($_COOKIE['user'] != ''): //для входа в свой кабинет если не авторизирован
  ?>
    <?php else: ?> 

    <section class="container">
      <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Аренда недвижимоcтей в Минске</h1>
        <p class="fs-5 text-muted mt-4">Для того, чтобы добавить недвижимость в список арендуемых,<br>пожалуйста, зайдите в кабинет</p>
      </div>
    </section>
  <?php endif;?> 

  <?php
    if($_COOKIE['user'] == ''): //для входа в свой кабинет
  ?>

  <?php else: ?>  
  <!-- типо заказы или мои квартиры -->
    <section class="container" >
      <div class="pricing-header p-3 pb-md-4 mx-auto">
        <p class="fw-bold fs-5 text-dark mt-4">Мои предложения:</p>
      </div>
      <div class="row row-cols-1 row-cols-md-3 mb-3 ">
      <?php 
        $user_id = $_COOKIE['user'];
        $flats = mysqli_query($connect, "SELECT * FROM `flats` WHERE `u_id` = $user_id");
        $flats = mysqli_fetch_all($flats);
        foreach($flats as $flat){
      ?>
      <form action="./vendor/create.php">
        <div class="col">
          <div class="card mb-4 rounded-3 shadow-sm">
            <h4 class="d-none"><?= $flat[0] ?></h4>
            <div class="card-header">
              <h4 class="my-0 fw-normal fs-5"><?= $flat[1] ?></h4>
              <ul class="list-unstyled mt-3">
                <li><img src="https://content.kufar.by/static/frontend/svg/metro_v2.svg" alt="metro"><?= $flat[3] ?></li>
              </ul>
            </div>
            <div class="card-body ">
              <div class="text-center"><?= $flat[7] ?></div> 
              <ul class="list-unstyled mt-3 mb-4">
                <li><?= $flat[2] ?>- комнатная</li>
                <li><?= $flat[4] ?> за месяц</li>
              </ul>
              <a href="update.php?id=<?= $flat[0]?>">
                <button type="button" class="w-100 btn btn-lg btn-outline-primary">Изменить</button>
              </a>
              <a href="vendor/delete.php?id=<?= $flat[0]?>">
                <button type="button" class="mt-2 w-100 btn btn-lg btn-outline-danger">Удалить</button>
              </a>
            </div>
          </div>
        </div>
      </form>
      
        <?php
          }
        ?>
      </div>
    </section> 



    <form action="vendor/create.php" method="POST">
      <div class="modal position-static d-block py-5" tabindex="-1" role="dialog" id="modalTour">
        <div class="modal-dialog" role="document">
          <div class="modal-content rounded-4 shadow-lg">
            <div class="modal-body p-5">
              <h3 class="fw-bold mb-0">Добавить мою квартиру для аренды:</h3>
              <ul class="d-grid gap-4 my-5 list-unstyled">
                <li class="d-flex gap-4">
                  <div class="w-100">
                    <h5 class="mb-0">Адрес:</h5>
                    <div class="mt-2">
                      <input type="text" class="form-control rounded-3" name="street">
                    </div>
                  </div>
                </li>
                <li class="d-flex gap-4">
                  <div class="w-100">
                    <h5 class="mb-0">Станция метро:</h5>
                    <div class="mt-2">
                      <input type="text" class="form-control rounded-3" name="place">
                    </div>
                  </div>
                </li>
                
                <li class="d-flex gap-4">
                  <div class="w-100">
                    <h5 class="mb-0">Количество комнат:</h5>
                    <div class="mt-2">
                      <input type="num" class="form-control rounded-3" name="size">
                    </div>
                  </div>
                </li>
                <li class="d-flex gap-4">
                  <div class="w-100">
                    <h5 class="mb-0">Арендная плата в месяц:</h5>
                    <div class="mt-2">
                      <input type="num" class="form-control rounded-3" name="price">
                    </div>
                  </div>
                </li>
              </ul>
              <button type="submit" class="btn btn-lg btn-primary mt-2 w-100" data-bs-dismiss="modal">Добавить</button>
            </div>
          </div>
        </div>
      </div>
    </form>


    <p class="text-center text-muted">Здравствуйте, <?=$_COOKIE['user']?>. Чтобы выйти из своего аккаунта нажмите <a href="/exit.php">здесь</a>.</p> 
  <?php endif;?> 
  
  <footer class="py-3 my-4 d-flex justify-content-center">
    <img class="logo" src="./img/logo_black.svg">
    <p class="text-muted">© 2022 Company, Zhavrid</p>
  </footer>

 

</body>
</html>