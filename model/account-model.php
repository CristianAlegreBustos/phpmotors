<?php

// Account Model

// Site Registration

function regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword){
 // Create a connection object using the phpmotors connection function
 $db = phpmotorsConnect();
 // The SQL statement
 $sql = 'INSERT INTO clients (clientFirstname, clientLastname,clientEmail, clientPassword)
     VALUES (:clientFirstname, :clientLastname, :clientEmail, :clientPassword)';
 // Create the prepared statement using the phpmotors connection
 $stmt = $db->prepare($sql);
 // The next four lines replace the placeholders in the SQL
 // statement with the actual values in the variables
 // and tells the database the type of data it is
 $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
 $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
 $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
 $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);
 // Insert the data
 $stmt->execute();
 // Ask how many rows changed as a result of our insert
 $rowsChanged = $stmt->rowCount();
 // Close the database interaction
 $stmt->closeCursor();
 // Return the indication of success (rows changed)
 return $rowsChanged;
}

//The new function will check for an existing email address

// Check for an existing email address
function checkExistingEmail($clientEmail) {
     // Create a connection object using the phpmotors connection function
    $db =  phpmotorsConnect();
     // The SQL statement that select the client Email that match with
     //the value stored in the :email place holder
    $sql = 'SELECT clientEmail FROM clients WHERE clientEmail = :email';
     // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    // The next line replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
    // Insert the data to the table
    $stmt->execute();
    //We will check iif the input email is alredy in use it.
    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
    // Close the database interaction
    $stmt->closeCursor();
    // if matchEmail is empty will return 0 (false);
    if(empty($matchEmail)){
     return 0;
    } else {
     return 1;
    }

    //end of function
   }

   // Get client data based on an email address
function getClient($clientEmail){
    $db = phpmotorsConnect();
    $sql = 'SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword FROM clients WHERE clientEmail = :clientEmail';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    $stmt->execute();
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $clientData;
   }

   // Get vehicle information by invId
function getInvItemInfo($invId){
    $db = phpmotorsConnect();
    $sql = 'SELECT * FROM inventory WHERE invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $invInfo;
   }

function getAccountInfo($clientId){
    // Create a connection object using the phpmotors connection function
   $db=phpmotorsConnect();
   // The SQL statement
   $sql='SELECT * FROM clients WHERE clientId=:clientId';
   //create the prepared statement using the phpmotors connection
   $stmt = $db->prepare($sql);
   // The next lines replace the placeholders in the SQL  statement
   //with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    // Insert the data
    $stmt->execute();
    $invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $invInfo;
}

function updateAccountInfo($clientEmail,$clientLastname,$clientFirstname,$clientId){
    // Create a connection object using the phpmotors connection function
   $db=phpmotorsConnect();
   // The SQL statement
   $sql='UPDATE clients SET clientFirstname = :clientFirstname, clientLastname= :clientLastname, clientEmail =:clientEmail WHERE clientId=:clientId';
    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
   // The next four lines replace the placeholders in the SQL
   // statement with the actual values in the variables
   // and tells the database the type of data it is
   $stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
    $stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
    $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    // Insert the data
   $stmt->execute();
   // Ask how many rows changed as a result of our insert
   $rowsChanged = $stmt->rowCount();
   // Close the database interaction
   $stmt->closeCursor();
   // Return the indication of success (rows changed)
   return $rowsChanged;
}

function UpdatePass($clientId,$clientPassword){
    // Create a connection object using the phpmotors connection function
   $db=phpmotorsConnect();
   // The SQL statement
   $sql='UPDATE clients SET clientPassword= :clientPassword WHERE clientId=:clientId';
   $stmt = $db->prepare($sql);

   $stmt->bindValue(':clientPassword', $clientPassword, PDO::PARAM_STR);
   $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);

    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}
?>