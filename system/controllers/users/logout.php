<?php


setcookie('user_id', 0, time() - 3600, '/');
header('Location: http://u97763.test-handyhost.ru/catalog.php');
?>