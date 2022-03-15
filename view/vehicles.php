<?php

if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /phpmotors/');
    exit;
   }

if(isset($_SESSION['message'])){
    $message=$_SESSION['message'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css2?family=Teko&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@400&display=swap" rel="stylesheet">
  <title>PHP Motors | Vehicle Management </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" media="screen" href="/phpmotors/css/template/style.css">
  <link rel="stylesheet" media="screen" href="/phpmotors/css/vehicles/style.css">

</head>


<body class="body">
    <div class="content">
        <header class="header">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/logo.php' ?>
            <?//php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/navbar.php'?>
            <?php echo $navList?>

        </header>
        <main class="main">
            <h1 class="title">Vehicle Management</h1>
            <ul class="managment_option">
                <li class="option_classification">
                    <a href="/phpmotors/vehicles/index.php?action=carClassification" target="_blank" >Add classification</a>
                </li>
                <li class="option_vehicles"><a href="/phpmotors/vehicles/index.php?action=addVehicles" target="_blank">Add vehicles</a></li>
            </ul>
        <div class="form_crud">
            <?php
            //the next code will display the message if there is one and the header, directions and classification list.
                if (isset($message)) {
                echo $message;
                }
                if (isset($classificationList)) {
                echo '<h2 class="title h2">Vehicles By Classification</h2>';
                echo '<p class="info_text">Choose a classification to see those vehicles</p>';
                echo $classificationList;
                }
            ?>

            <noscript>
                <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
            </noscript>

            <table id="inventoryDisplay"></table>
            </div>
        </main>

        <footer class="footer">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/footer.php' ?>
        </footer>

    </div>
</body>
<script src="../js/inventory.js"></script>
</html>
<?php unset($_SESSION['message']); ?>