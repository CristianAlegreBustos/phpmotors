<?php
//this is the main controller

// Get the database connection file
require_once 'library/connections.php';
// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';
//Get the database connection file
require_once 'library/functions.php';

// Create or access a Session
session_start();


// Get the array of classifications
$classifications = getClassifications();

//This function create the navBar. The function is stored in function.php
$navList=createNavigatorBar($classifications);

  $action = trim(filter_input(INPUT_POST, 'action'));
if ($action == NULL){
  $action = trim(filter_input(INPUT_GET, 'action'));
  }

// Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
  $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
 }

switch ($action){
  case 'template':
    include 'view/template.php';
   break;
  default:
   include 'view/home.php';
 }
?>