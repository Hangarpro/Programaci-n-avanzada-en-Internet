<?php
  session_start();

  if (!isset($_SESSION['g_token'])) {
    $_SESSION['g_token'] = md5 ( uniqid ( mt_rand (), true ) );
  }
?>
