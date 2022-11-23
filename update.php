<?php 
require_once './config/connect.php';
include __DIR__ . '/config/connect.php';


$flat_id = $_GET['id'];
$flat = mysqli_query($connect, "SELECT * FROM `flats` WHERE `id` = '$flat_id'"); 
$flat = mysqli_fetch_assoc($flat);

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
    <script type="text/javascript" src="./js/script.js"></script> 
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
          <li><a href="#" class="nav-link px-2 text-white">About us</a></li>
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
    if($_COOKIE['user'] == ''): //для входа в свой кабинет
  ?>
    <?php else: ?>  
    <form action="vendor/update.php" method="POST">
      <div class="modal position-static overflow-unsert h-auto d-block py-5" tabindex="-1" role="dialog" id="modalTour">
        <div class="modal-dialog" role="document">
          <div class="modal-content rounded-4 shadow-lg">
            <div class="modal-body p-5">
              <h3 class="fw-bold mb-0">Изменить недвижимость для аренды:</h3>
              <ul class="d-grid gap-4 my-5 list-unstyled">
              <input type="hidden" name="id" value="<?=$flat['id']?>">
                <li class="d-flex gap-4">
                  <div class="w-100">
                    <h5 class="mb-0">Адрес:</h5>
                    <div class="mt-2">
                      <input type="text" class="form-control rounded-3" name="street" value="<?=$flat['street']?>">
                    </div>
                  </div>
                </li>
                <li class="d-flex gap-4">
                  <div class="w-100">
                    <h5 class="mb-0">Станция метро:</h5>
                    <div class="mt-2">
                      <input type="text" class="form-control rounded-3" name="place" value="<?=$flat['place']?>">
                    </div>
                  </div>
                </li>
                <li class="d-flex gap-4">
                  <div class="w-100">
                    <h5 class="mb-0">Фото квартиры:</h5>
                    <form class="mt-2" action="./addFile.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="photo">
                        <button type="button" class="btn btn-lg btn-primary mt-2 w-50" data-bs-dismiss="modal">Загрузить</button> 
                        <!-- загружать по кнопке добавить -->
                      </form>
                  </div>
                </li>
                <li class="d-flex gap-4">
                  <div class="w-100">
                    <h5 class="mb-0">Количество комнат:</h5>
                    <div class="mt-2">
                      <input type="num" class="form-control rounded-3" name="size" value="<?=$flat['size']?>">
                    </div>
                  </div>
                </li>
                <li class="d-flex gap-4">
                  <div class="w-100">
                    <h5 class="mb-0">Арендная плата в месяц (byn):</h5>
                    <div class="mt-2">
                      <input type="num" class="form-control rounded-3" name="price" value="<?=$flat['price']?>">
                    </div>
                  </div>
                </li>
              </ul>
              <button type="submit" class="btn btn-lg btn-primary mt-2 w-100" data-bs-dismiss="modal">Сохранить</button>
            </div>
          </div>
        </div>
      </div>
    </form>
 <?php endif;?> 


  <footer class="py-3 my-4 d-flex justify-content-center">
    <img class="logo" src="./img/logo_black.svg">
    <p class="text-muted">© 2022 Company, Zhavrid</p>
  </footer>
</body>
</html>