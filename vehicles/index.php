<?php
//this is the Vehicles controller

//Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the vehicles  model for use as needed
require_once '../model/vehicles-model.php';
//Get the database connection file
require_once '../library/functions.php';

// Create or access a Session
session_start();

// Get the array of classifications
$classifications = getClassifications();

//This function create the navBar. The function is stored in function.php
$navList=createNavigatorBar($classifications);
/* To continue I will create the dropdown select list using the $classification array
*
*
*
*/
$classificationList .= "<select id='classificationId' class='select_classification' name='classificationId'>";
$classificationList .= "<option > Choose a car classification</option>";
foreach ($classifications as $classification) {
$classificationList.= "<option value=$classification[classificationId]>$classification[classificationName]</option>";
}
$classificationList .="</select>";

//echo $classificationList;
//exit;

  $action = trim(filter_input(INPUT_POST, 'action'));
if ($action == NULL){
  $action = trim(filter_input(INPUT_GET, 'action'));
  }

  switch ($action){
   case 'updateInventory':
     //echo 'You are in the register case statement.';

     // Filter and store the data
     $invMake= trim(filter_input(INPUT_POST,'invMake',FILTER_SANITIZE_STRING));
     //echo $invMake;
     $invModel=trim(filter_input(INPUT_POST,'invModel',FILTER_SANITIZE_STRING));
     //echo $invModel;
     $invDescription=trim(filter_input(INPUT_POST,'invDescription',FILTER_SANITIZE_STRING));
    // echo $invDescription;
     $invImage=trim(filter_input(INPUT_POST,'invImage',FILTER_SANITIZE_STRING));
     //echo $invImage;
     $invThumbnail=trim(filter_input(INPUT_POST,'invThumbnail',FILTER_SANITIZE_STRING));
     //echo $invThumbnail;
     $invPrice=trim(filter_input(INPUT_POST,'invPrice',FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION));
    // echo $invPrice;
     $invStock=trim(filter_input(INPUT_POST,'invStock',FILTER_SANITIZE_NUMBER_FLOAT));
     $invColor=trim(filter_input(INPUT_POST,'invColor',FILTER_SANITIZE_STRING));
     //echo $invColor;
     $classificationId=trim(filter_input(INPUT_POST,'classificationId',FILTER_SANITIZE_NUMBER_INT));
     //echo $classificationId;

     //Check for missiong data
     if (empty($invMake)||empty($invModel)||empty($invDescription)||empty($invImage)||empty($invThumbnail)||empty($invPrice)||empty($invStock)||empty($invColor)||empty($classificationId)){
        $message= "<p class='display_error'>Please provide information for all empty form fields.</p>";

        include '../view/addVehicles.php';
        exit;
     }
     //sending the data to the function regClient in the account model
     $InvUpdated=regNewVehicle($invMake,$invModel,$invDescription,$invImage,$invThumbnail,$invPrice,$invStock,$invColor,$classificationId);
     if($InvUpdated === 1){
       $message="<p class='display_sucess'>Thanks for registering the $invMake $invModel</p>";
       include '../view/addvehicles.php';
       exit;
     }else{
      $message = "<p class='display_error'>Sorry but the registration of $invMake $invModel failed. Please try again.</p>";
      include '../view/addVehicles.php';
      exit;
     }
     break;
    case 'updateCarClassification':
      $classificationName =trim(filter_input(INPUT_POST,'classificationName', FILTER_SANITIZE_STRING));
      if (empty($classificationName)){
        $message = "<p class='display_error'>Please provide information for all empty form fields.</p>";
        include '../view/carClassification.php';
        exit;
      }
      $classificationUpdate=regclassification($classificationName);
      if ($classificationUpdate !== 1){
        $message = "<p class='display_error'> The $classificationName category dosen't possible to add to the table. Please, Try Again </p>";
        include '../view/carClassification.php';
        exit;
      }else{
        $host=$_SERVER['HTTP_HOST'];
        $extra='/phpmotors/vehicles/index.php';
        header("Location: http://$host/$extra");
        exit;
      }
    break;
    case 'addVehicles':
        include '../view/addVehicles.php';
    break;
    case 'carClassification':
        include '../view/carClassification.php';
        break;
    default:
    // we dont want that a person enter in the vehicles managment
    //by error so I configured the next statements.

        include '../view/vehicles.php';
    break;
    }
?>