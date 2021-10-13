<?php
require_once("includes.php");
require_once("classes/SiteTemplate.php");
$message="That answer was incorrect ";
if(!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
  $_SESSION['errors'][] = "Error: You must login.";
  die(header("Location: " . LOGIN_PAGE));
}

$required = array("answer");
foreach ($required as $index => $value) {
  if (!isset($_POST[$value]) || empty($_POST[$value])) {
    $_SESSION['errors'][] = "You must submit an answer.";
    die(header("Location: " . LOGIN_PAGE));
  }
}
if ($_SESSION['answer'] == $_POST['answer']){
    $_SESSION['numberofcorrect']++;
    $message="That answer was correct ";
}

$page = new SiteTemplate("Form Page");
$page->addHeadElement('<link rel="stylesheet" href="styles/login.css">');
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();
print $message;
print "You have answered " .$_SESSION['numberofcorrect'] ." questions correctly"; 
print $page->getBottomSection();