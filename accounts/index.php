<?php
//this is the Account controller

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the account  model for use as needed
require_once '../model/account-model.php';
//Get the function connection file
require_once '../library/functions.php';


// Get the array of classifications
$classifications = getClassifications();

//This function create the navBar. The function is stored in function.php
$navList=createNavigatorBar($classifications);

  $action = trim(filter_input(INPUT_POST, 'action'));
if ($action == NULL){
  $action = trim(filter_input(INPUT_GET, 'action'));
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
      $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING));
      $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING));
      $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
      $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));
      $clientEmail = checkEmail($clientEmail);
      $checkPassword = checkPassword($clientPassword);

      // Check for missing data
    if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)){
        $message = "<p class='display_error'>Please provide information for all empty form fields.</p>";
        include '../view/register.php';
        exit;
    }elseif($checkPassword === 0 || empty($checkPassword)){
        $message = '<p class="display_error">The password must be at least 8 characters, at least 1 capital letter, at least 1 number and at least 1 special character.</p>';
        include '../view/register.php';
          exit;
      }

    // Hash the checked password
    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

    //sending the data to the function regClient in the account model
    $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);


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

case 'Login':
    $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
    $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));
    $clientEmail = checkEmail($clientEmail);
    $checkPassword = checkPassword($clientPassword);

      // Check for missing data
    if(empty($clientEmail)){
      $message = "<p class='display_error'>Please provide information for all empty form fields.</p>";
      include '../view/login.php';
      exit;
    }
    else if($checkPassword === 0 || empty($checkPassword)){
      $message= '<p class="display_error">The password must be at least 8 characters, at least 1 capital letter, at least 1 number and at least 1 special character.</p>';
      include '../view/login.php';
      exit;
    }else{

    }
    break;
  default:
  include '../view/login.php';
    break;
 }
?>