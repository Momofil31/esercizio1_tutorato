<?php
  include_once 'includes/config.inc.php';
  if (func::checkLoginState($pdo)) {
    func::deleteCookie();
  }
  header("location:index.php"); 
?>