<?php
//this is the Account controller

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

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
  default:
  include '../view/login.php';
    break;
 }
?>