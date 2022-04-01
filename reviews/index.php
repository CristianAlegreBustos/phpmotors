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

session_start();

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
        $_SESSION['messageData']= "<p class='info_text notice'>Please provide information for all empty form fields.</p>";

        header("Location:/phpmotors/vehicles/index.php?action=carDisplayDetail&classificationName=$carName&invId=$invId");
        exit;
      }

      $addReview=submitReview($invId,$clientId,$reviewText);

      if ($addReview){
        $messageUpdateError="<p class='info_text'>Review Updated.</p>";
        header("Location:/phpmotors/vehicles/index.php?action=carDisplayDetail&classificationName=$carName&invId=$invId");
        exit;
      }
  break;
case 'Update':
  $reviewId=filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
  $reviewText=filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);

  //Check for missiong data
  if(empty($reviewId) || empty($reviewText)){
    $messageUpdateError = "<div class='alert alert_danger' onclick=";
    $messageUpdateError.='this.style.display="none"';
    $messageUpdateError.=">";

    $messageUpdateError .= "<p class='info_text notice'> You can't submit an empty comment. The review was not updated</p>
    <br>
    <br>
    <span class='review_date'>Touch here to close</span></div>";
    include '../accounts/index.php';
    exit;
  }

  $updateReview=updateSpecificReview($reviewText,$reviewId);
  if ($updateReview){
    $messageUpdate = "<div class='alert alert_danger' onclick=";
    $messageUpdate.='this.style.display="none"';
    $messageUpdate.=">";

    $messageUpdate .= "<p class='info_text notice'> The comment was updated sucessfuly</p>
    <br>
    <br>
    <span class='review_date'>Touch here to close</span></div>";

    $_SESSION['messageUpdate']=$messageUpdate;
    header("Location:/phpmotors/accounts/index.php");
    exit;
  }else{
    $messageError = "<div class='alert alert_danger' onclick=";
    $messageError.='this.style.display="none"';
    $messageError.=">";

    $messageError .= "<p class='info_text notice'> The comment was not updated</p>
    <br>
    <br>
    <span class='review_date'>Touch here to close</span></div>";

    $_SESSION['messageError']=$messageError;
    header("Location:/phpmotors/accounts/index.php");
    exit;
  }
  break;
  case 'Delete':
    $reviewId=filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);

    $delete=deleteReview($reviewId);
    if ($delete){
      $message = "<div class='alert alert_danger' onclick=";
    $message.='this.style.display="none"';
    $message.=">";

    $message.= "<p class='info_text notice'> The comment was delete sucessfuly</p>
    <br>
    <br>
    <span class='review_date'>Touch here to close</span></div>";
    $_SESSION['messageUpdate']=$message;
      header("Location:/phpmotors/accounts/index.php");
      exit;
    }else{
      $message = "<div class='alert alert_danger' onclick=";
    $message.='this.style.display="none"';
    $message.=">";

    $message.= "<p class='info_text notice'> The comment wasn't delete sucessfuly</p>
    <br>
    <br>
    <span class='review_date'>Touch here to close</span></div>";
    $_SESSION['messageUpdate']=$message;

      header("Location:/phpmotors/accounts/index.php");
      exit;
    }
    break;
default:
  header("Location:/phpmotors/accounts/index.php");
  break;
}
?>