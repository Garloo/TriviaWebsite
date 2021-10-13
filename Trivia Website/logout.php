<?php
require_once("includes.php");
if(isset($_SESSION['isLoggedIn'])) {
  $_SESSION['isLoggedIn'] = false;
  unset($_SESSION['isLoggedIn']);
}

foreach ($_SESSION as $key => $value) {
  $_SESSION[$key] = "";
  unset($_SESSION[$key]);
}
unset($_SESSION);
session_write_close();

die(header("Location: " . LOGIN_PAGE));
