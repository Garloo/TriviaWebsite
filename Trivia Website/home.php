<?php
require_once("includes.php");
require_once("classes/SiteTemplate.php");

if(!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
  $_SESSION['errors'][] = "Error: You must login.";
  die(header("Location: " . LOGIN_PAGE));
}
$page = new SiteTemplate("Home Page");
$page->addHeadElement('<link rel="stylesheet" href="styles/login.css">');
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();

// Check, if username session is NOT set then this page will jump to login page


echo "<h2>Welcome!</h2>"; 
$user = $_POST["username"];
if($user != null)
{
    echo $user;
    echo " is your username";
}
else
{
    echo "no username supplied";
}

echo '<a href="quiz.php">Quiz portal</a>';
echo "\n";
echo '<a href="logout.php">Logout</a>';






