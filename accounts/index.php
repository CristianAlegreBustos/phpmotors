<?php
//this is the Account controller

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the account  model for use as needed
require_once '../model/account-model.php';

// Get the array of classifications
$classifications = getClassifications();

//var_dump($classifications);
//exit;

// Build a navigation bar using the $classifications array
  $navList = '<ul class="navBar">';
  $navList .= "<li class='navBar_links home'><a class='link' href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
  foreach ($classifications as $classification) {
   $navList .= "<li class='navBar_links $classification[classificationName]'><a class='link' href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
  }
  $navList .="<li class='others'><a class='link'></a></li>";
  $navList .= '</ul>';

//  echo $navList;
//exit;

  $action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
  }

switch ($action){
  case 'login':
    include '../view/login.php';
   break;
  case 'register':
      include '../view/register.php';
    break;
  case 'registerUser':
     // echo 'You are in the register case statement.';

     // Filter and store the data
      $clientFirstname = filter_input(INPUT_POST, 'clientFirstname');
      $clientLastname = filter_input(INPUT_POST, 'clientLastname');
      $clientEmail = filter_input(INPUT_POST, 'clientEmail');
      $clientPassword = filter_input(INPUT_POST, 'clientPassword');

      // Check for missing data
    if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($clientPassword)){
        $message = "<p class='display_error'>Please provide information for all empty form fields.</p>";
        include '../view/register.php';
        exit;
    }

    //sending the data to the function regClient in the account model
    $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword);

    if($regOutcome === 1){
      $message = "<p class='display_sucess'>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
      include '../view/login.php';
      exit;
     } else {
      $message = "<p class='display_error'>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
      include '../view/registration.php';
      exit;
     }

      break;
  default:
  include '../view/login.php';
    break;
 }
?>