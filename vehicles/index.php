<?php
//this is the Vehicles controller

//Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the vehicles  model for use as needed
require_once '../model/vehicles-model.php';

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

  $action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
  }

  switch ($action){
   case 'updateInventory':
     //echo 'You are in the register case statement.';

     // Filter and store the data
     $invMake= filter_input(INPUT_POST,'invMake');
     //echo $invMake;
     $invModel=filter_input(INPUT_POST,'invModel');
     //echo $invModel;
     $invDescription=filter_input(INPUT_POST,'invDescription');
    // echo $invDescription;
     $invImage=filter_input(INPUT_POST,'invImage');
     //echo $invImage;
     $invThumbnail=filter_input(INPUT_POST,'invThumbnail');
     //echo $invThumbnail;
     $invPrice=filter_input(INPUT_POST,'invPrice');
    // echo $invPrice;
     $invStock=filter_input(INPUT_POST,'invStock');
     //echo $invStock;
     $invColor=filter_input(INPUT_POST,'invColor');
     //echo $invColor;
     $classificationId=filter_input(INPUT_POST,'classificationId');
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
      $classificationName =filter_input(INPUT_POST,'classificationName');
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
        include '../view/vehicles.php';
    break;
    }
?>