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

function DisplayReview($getReviewByCar){
  //display Review in the vehicle Detail
  $review="<div>";
  foreach ($getReviewByCar as $data) {
    $abrName=substr($data['clientFirstname'],0,1) .". ". $data['clientLastname'];
    $review.= '<div class="review_wrapper">';
    $review.="<p class='user_name'>$abrName</p>";
    $review.="<div class='review_text'>";
    $review.="<p class='text'>$data[reviewText]</p>";
    $review.="</div>";
    $review.="<p class='review_date'>".date("Y-m-d | h:i:sa",strtotime($data['reviewDate']))."</p>";

    $review.="</div>";
    $review.="<br>";
  }
  $review.="</div>";

  return $review;
}

function DisplayReviewClient($getReviewByCar){
  //display Review in the admin account
  $review="<div>";
  foreach ($getReviewByCar as $data) {
    $abrName=substr($data['clientFirstname'],0,1) .". ". $data['clientLastname'];
    $review.= '<form  method="POST" class="form review_wrapper" id="reviewComment" action="/phpmotors/reviews/index.php">';
    $review.="<p class='user_name'>$abrName</p>";
    $review.="<textarea name='reviewText' id='reviewText.$data[reviewId]' class='input review_text' form='reviewComment' placeholder='Enter your comments here' disabled>";
    $review.=$data['reviewText'];
    $review.='</textarea>';
    $review.="<p class='review_date'>".date("Y-m-d | h:i:sa",strtotime($data['reviewDate']))."</p>";
    $review.="<div class='button_wrapper'>";
    $review.="<input class='edit_buttom' id='$data[reviewId]' type='input' name='other' value='Edit' onclick='displayOtherButtons(this);'>";
    //add Eventlisten to stop the submit. But, display the update buttom, delete buttom and unlick the text area.

    $review.="<input class='update_buttom' id='update_buttom.$data[reviewId]' type='submit' name='action' value='Update' onmouseover='DeleteInputName(this)'>";
    //add Event listener to change the delete name in the delete buttom.

    $review.="<input class='delete_buttom' id='delete_buttom.$data[reviewId]' type='submit' name='action' value='Delete' onmouseover='restoreName(this)'>";
    //add Event listener to change the Update name in the update buttom.
    $review.="</div>";
    $review .= '<!-- hidden inputs -->';
    $review .= '<!-- reviewId input -->';
    $review.="<input type='hidden' name='reviewId' value=". $data['reviewId']."> ";
    $review.="</form>";
    $review.="<br>";
  }
  $review.="</div>";

  return $review;
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
    $dv .= "<img class='img' src='$vehicle[imgPath]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
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
  function displayThumb($DisplayThumbImage){
    // this function will display  the thumb image of the vehicles
    //in the vehicles detail
    $td="<ul class='thumbnail_wrapper'>";
    foreach ($DisplayThumbImage as $ThumbImage) {
      $td.="<li class='thumbnail_item'>
          <img class='thumbnail_img' src='$ThumbImage[imgPath]' alt='Image of $detail[imgName] on phpmotors.com'>
      </li>";
    }
    $td.="</ul>";
    return $td;
  }

  /* * ********************************
*  Functions for working with images
* ********************************* */

// Adds "-tn" designation to file name
function makeThumbnailName($image) {
   $i = strrpos($image, '.');
   //looks for the location of the period in the name. When found it sends back the position as a number (the # of characters in the string where the period is located - hummer.jpg: the period is "7" in the string
   $image_name = substr($image, 0, $i);
   //This is used to break the string apart as if it were an array. Everything to the left of the period (now referred to as $i is element zero "0" in the array. It is the $image_name (e.g. hummer).
   $ext = substr($image, $i);//Whatever is left in the array is the file extension (now stored as $ext (e.g. jpg).
   $image = $image_name . '-tn' . $ext;
   return $image;
  }

  // Build images display for image management view
function buildImageDisplay($imageArray) {
 $id = '<ul class="display_image" id="image-display">';
 foreach ($imageArray as $image) {
  $id .= '<li class="individual_image">';
  $id .= "<img class='img' src='$image[imgPath]' title='$image[invMake] $image[invModel] image on PHP Motors.com' alt='$image[invMake] $image[invModel] image on PHP Motors.com'>";
  $id .= "<p class='p'><a href='/phpmotors/uploads?action=delete&imgId=$image[imgId]&filename=$image[imgName]' title='Delete the image'>Delete $image[imgName]</a></p>";
  $id .= '</li>';
}
 $id .= '</ul>';
 return $id;
}

// Build the vehicles select list
function buildVehiclesSelect($vehicles) {
   $prodList = '<select class="select_classification" name="invId" id="invId">';
   $prodList .= "<option>Choose a Vehicle</option>";
   foreach ($vehicles as $vehicle) {
    $prodList .= "<option value='$vehicle[invId]'>$vehicle[invMake] $vehicle[invModel]</option>";
   }
   $prodList .= '</select>';
   return $prodList;
  }

// Handles the file upload process and returns the path
// The file path is stored into the database
function uploadFile($name) {
   // Gets the paths, full and local directory
   global $image_dir, $image_dir_path;
   if (isset($_FILES[$name])) {
    // Gets the actual file name
    $filename = $_FILES[$name]['name'];
    if (empty($filename)) {
     return;
    }
   // Get the file from the temp folder on the server
   $source = $_FILES[$name]['tmp_name'];
   // Sets the new path - images folder in this directory
   $target = $image_dir_path . '/' . $filename;
   // Moves the file to the target folder
   move_uploaded_file($source, $target);
   // Send file for further processing
   processImage($image_dir_path, $filename);
   // Sets the path for the image for Database storage
   $filepath = $image_dir . '/' . $filename;
   // Returns the path where the file is stored
   return $filepath;
   }
  }

  // Processes images by getting paths and
// creating smaller versions of the image
function processImage($dir, $filename) {
   // Set up the variables
   $dir = $dir . '/';

   // Set up the image path
   $image_path = $dir . $filename;

   // Set up the thumbnail image path
   $image_path_tn = $dir.makeThumbnailName($filename);

   // Create a thumbnail image that's a maximum of 200 pixels square
   resizeImage($image_path, $image_path_tn, 200, 200);

   // Resize original to a maximum of 500 pixels square
   resizeImage($image_path, $image_path, 500, 500);
  }

// Checks and Resizes image
function resizeImage($old_image_path, $new_image_path, $max_width, $max_height) {

   // Get image type
   $image_info = getimagesize($old_image_path);
   $image_type = $image_info[2];

   // Set up the function names
   switch ($image_type) {
   case IMAGETYPE_JPEG:
    $image_from_file = 'imagecreatefromjpeg';
    $image_to_file = 'imagejpeg';
   break;
   case IMAGETYPE_GIF:
    $image_from_file = 'imagecreatefromgif';
    $image_to_file = 'imagegif';
   break;
   case IMAGETYPE_PNG:
    $image_from_file = 'imagecreatefrompng';
    $image_to_file = 'imagepng';
   break;
   default:
    return;
  } // ends the swith

   // Get the old image and its height and width
   $old_image = $image_from_file($old_image_path);
   $old_width = imagesx($old_image);
   $old_height = imagesy($old_image);

   // Calculate height and width ratios
   $width_ratio = $old_width / $max_width;
   $height_ratio = $old_height / $max_height;

   // If image is larger than specified ratio, create the new image
   if ($width_ratio > 1 || $height_ratio > 1) {

    // Calculate height and width for the new image
    $ratio = max($width_ratio, $height_ratio);
    $new_height = round($old_height / $ratio);
    $new_width = round($old_width / $ratio);

    // Create the new image
    $new_image = imagecreatetruecolor($new_width, $new_height);

    // Set transparency according to image type
    if ($image_type == IMAGETYPE_GIF) {
     $alpha = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
     imagecolortransparent($new_image, $alpha);
    }

    if ($image_type == IMAGETYPE_PNG || $image_type == IMAGETYPE_GIF) {
     imagealphablending($new_image, false);
     imagesavealpha($new_image, true);
    }

    // Copy old image to new image - this resizes the image
    $new_x = 0;
    $new_y = 0;
    $old_x = 0;
    $old_y = 0;
    imagecopyresampled($new_image, $old_image, $new_x, $new_y, $old_x, $old_y, $new_width, $new_height, $old_width, $old_height);

    // Write the new image to a new file
    $image_to_file($new_image, $new_image_path);
    // Free any memory associated with the new image
    imagedestroy($new_image);
    } else {
    // Write the old image to a new file
    $image_to_file($old_image, $new_image_path);
    }
    // Free any memory associated with the old image
    imagedestroy($old_image);
  } // ends resizeImage function

?>
