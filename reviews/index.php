<?php
//This is the reviews controller

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the account  model for use as needed
require_once '../model/account-model.php';
// Get the account  model for use as needed
require_once '../model/reviews-model.php';
//Get the function connection file
require_once '../library/functions.php';



$action = trim(filter_input(INPUT_POST, 'action'));
if ($action == NULL){
  $action = trim(filter_input(INPUT_GET, 'action'));
}

switch ($action){
  case 'addNewReview':
    $invId = filter_input(INPUT_POST, 'invId', FILTER_VALIDATE_INT);
    $clientId=filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
    $reviewText=filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
    $carName=filter_input(INPUT_POST, 'carName', FILTER_SANITIZE_ENCODED);

      //Check for missiong data
      if(empty($invId) || empty($clientId) || empty($carName)|| empty($reviewText)){
        $message = "<p class='display_error'>Please provide information for all empty form fields.</p>";
        $_SESSION['message'] = $message;
        header("Location:/phpmotors/vehicles/index.php?action=carDisplayDetail&classificationName=$carName&invId=$invId");
        exit;
      }

      $addReview=submitReview($invId,$clientId,$reviewText);

      if ($addReview){
        header("Location:/phpmotors/vehicles/index.php?action=carDisplayDetail&classificationName=$carName&invId=$invId");
        exit;
      }
  break;
case 'Update':
  $reviewId=filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
  $reviewText=filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);

  //Check for missiong data
  if(empty($reviewId) || empty($reviewText)){
    $message = "<p class='display_error'>Please provide information for all empty form fields.</p>";
    include '../accounts/index.php';
    exit;
  }

  $updateReview=updateSpecificReview($reviewText,$reviewId);
  if ($updateReview){
    $message="The comment was updated sucessfuly";
    header("Location:/phpmotors/accounts/index.php");
    exit;
  }else{
    $message="The comment was not updated";
    header("Location:/phpmotors/accounts/index.php");
    exit;
  }
  break;
  case 'Delete':
    $reviewId=filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);

    $delete=deleteReview($reviewId);
    if ($delete){
      $message="The comment was updated sucessfuly";
      header("Location:/phpmotors/accounts/index.php");
      exit;
    }else{
      $message="The comment was not updated";
      header("Location:/phpmotors/accounts/index.php");
      exit;
    }
    break;
default:
  header("Location:/phpmotors/accounts/index.php");
  break;
}
?>