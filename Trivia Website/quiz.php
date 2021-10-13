<?php
require_once("includes.php");
require_once("classes/SiteTemplate.php");

if(!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
  $_SESSION['errors'][] = "Error: You must login.";
  die(header("Location: " . LOGIN_PAGE));
}

require_once("classes/WebServiceClient.php");

$client = new WebServiceClient("http://cnmt310.braingia.org/qws/q.php");
$data = array("apikey" => APIKEY,
              "apiuser" => APIUSER,
            
            );
$client->setPostFields($data);
$authenticationRequest = $client->send();
$authObject = json_decode($authenticationRequest);

if (!is_object($authObject)) {
  $_SESSION['errors'][] = "Error: Authentication Issues";
  die(header("Location: " . LOGIN_PAGE));
}

if ($authObject->result == "Success") {
    $question=$authObject->question;
    $_SESSION['answer'] = $authObject->answer;

}

$page = new SiteTemplate("Form Page");
$page->addHeadElement('<link rel="stylesheet" href="styles/login.css">');
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();
if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) {
  foreach ($_SESSION['errors'] as $errorIndex => $errorMessage) {
    print $errorMessage . "<br>\n";
  }
  unset($_SESSION['errors']);
}

echo '<form action="/week12/quiz_action.php" method="POST">';
echo '<label for="question">' . $question . '</label><br>';
echo '<input type="text" id="answer" placeholder="Answer" name="answer"><br><br>';
echo '<input type="submit" value="Submit">';
echo '</form>';

echo '<a href="home.php">Back to home</a>';

print $page->getBottomSection();