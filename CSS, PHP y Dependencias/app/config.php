<?php
  session_start();

  if (!isset($_SESSION['g_token'])) {
    $_SESSION['g_token'] = md5 ( uniqid ( mt_rand (), true ) );
  }

  if (!defined('BASE_PATH')) {
    define('BASE_PATH', 'http://localhost/Programación%20avanzada%20en%20Internet/CSS,%20PHP%20y%20Dependencias/');
  }
?>
