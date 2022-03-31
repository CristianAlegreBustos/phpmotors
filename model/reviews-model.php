<?php
//this is the reviews model

function submitReview($invId,$clientId,$reviewText){
    //function to add review to the database
    $db = phpmotorsConnect();
    $sql = 'INSERT INTO reviews (invId, clientId, reviewText) VALUES (:invId, :clientId, :reviewText)';
    $stmt = $db->prepare($sql);

    //store the information by placeholder

    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->execute();

    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;

}

function getReviewByCar($invId){
    // this function will get the list of comments by the cars
    $db = phpmotorsConnect($invId);
    $sql = 'SELECT * FROM reviews JOIN clients ON reviews.clientId=clients.clientId WHERE invId=:invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $review=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $review;
}

function getSpecificReview(){
    // this function will get the list of comments by the cars
    $db = phpmotorsConnect($reviewId);
    $sql = 'SELECT * FROM reviews WHERE reviewId=:reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $review=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $review;
}

function getReviewByclient($clientId){
    // this function will get the list of comments by the clients
    $db = phpmotorsConnect();
    $sql = 'SELECT * FROM reviews JOIN clients ON reviews.clientId=clients.clientId WHERE clients.clientId= :clientId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $review = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $review;
}

function deleteReview($reviewId) {
    // Delete review from the images table
    $db = phpmotorsConnect();
    $sql = 'DELETE FROM reviews WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
   }

function updateSpecificReview($reviewText,$reviewId){
    // Create a connection object using the phpmotors connection function
    $db=phpmotorsConnect();
    // The SQL statement
    $sql='UPDATE reviews SET reviewText=:reviewText WHERE reviewId =:reviewId';
    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    $stmt ->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt ->bindValue(':reviewText',$reviewText, PDO::PARAM_STR);
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