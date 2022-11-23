<?php 

include __DIR__.'/db.php';

if(!empty($_FILES['file'])){


    $file = $_FILES['file'];
    $name = $file['name'];
    $pathFile = __DIR__ .'/newimg/'.$name;


    if(!move_uploaded_file($file['tmp_name'], $pathFile)){
        echo'no file';
    }

    $data = $db->prepare("INSERT INTO 'flats' ('img') VALUES (?)");
    $data->execute([$name]);

}

header('Location: \index.php'); //при загрузке картинки она добавтится туда
?>