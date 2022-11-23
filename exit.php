<?php 
   setcookie('user', $user['name'], time() - 3600 * 20, "/" );
   header('Location: /');
?>