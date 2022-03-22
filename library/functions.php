<?php
function checkEmail($clientEmail){
 $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
 return $valEmail;
}

// Check the password for a minimum of 8 characters,
 // at least one 1 capital letter, at least 1 number and
 // at least 1 special character
 function checkPassword($clientPassword){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
    return preg_match($pattern, $clientPassword);
   }


function createNavigatorBar($classifications){

// Build a navigation bar using the $classifications array
  $navList = '<ul class="navBar">';
  $navList .= "<li class='navBar_links home'><a class='link' href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
  foreach ($classifications as $classification) {
   $navList .= "<li class='navBar_links $classification[classificationName]'><a class='link' href='/phpmotors/vehicles/?action=classification&classificationName=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] lineup of vehicles'>$classification[classificationName]</a></li>";
  }
  $navList .="<li class='others'><a class='link'></a></li>";
  $navList .= '</ul>';

  return $navList;
   }

   // Build the classifications select list
function buildClassificationList($classifications){
   $classificationList = '<select name="classificationId" id="classificationList" class="select_classification">';
   $classificationList .= "<option>Choose a Classification</option>";
   foreach ($classifications as $classification) {
    $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>";
   }
   $classificationList .= '</select>';
   return $classificationList;
  }

  function buildVehiclesDisplay($vehicles){
     // this function will build a display of vehicles within an unordered list.
   $dv = '<ul class="table" id="inv-display">';
   foreach ($vehicles as $vehicle) {
    $dv .= '<li class="table_item">';
    $dv .= "<img class='img' src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
    $dv .= '<div class="description_box">';
    $dv .= "<h2 class='h2'><a class='link' target='_blank' href='/phpmotors/vehicles/index.php?action=carDisplayDetail&classificationName=".urlencode($vehicle['invMake']." ".$vehicle['invModel'])."&invId=".urlencode($vehicle['invId'])."'>$vehicle[invMake] $vehicle[invModel] </a></h2>";
    $dv .= "<span class='span_description'>$vehicle[invPrice]</span>";
    $dv .= '</div></li>';
   }
   $dv .= '</ul>';
   return $dv;
  }
  function displayDetail($DisplayDetail){
     // this function will build a display the detail of the vehicles
     foreach ($DisplayDetail as $detail) {
      $number=number_format($detail['invPrice'],2);
     $dv= "<div class='image_wrapper'><img class='img' src='$detail[invImage]' alt='Image of $detail[invMake] $detail[invModel] on phpmotors.com'></div>";
     $dv.="<div class='info_wrapper'>
      <h1 class='title info_title'> $detail[invMake] $detail[invModel] </h1>
      <p class='info_text'>$detail[invDescription]</p>
      <p class='info_color'>Color: $detail[invColor]</p>
      <p class='info_price'>Price: $$number</p>
      <p class='info_stock'>Stock Avaliable: $detail[invStock]</p>
     </div>";
   }
     return $dv;
  }
?>
