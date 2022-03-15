<?php
if(!isset($_SESSION['loggedin'])){
    header('Location: /phpmotors/index.php');
}
if($_SESSION['clientData']['clientLevel'] < 2){
    header('location: /phpmotors/');
    exit;
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css2?family=Teko&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@400&display=swap" rel="stylesheet">
  <title><?php if(isset($invInfo['invMake'])){
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?> | PHP Motors</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" media="screen" href="/phpmotors/css/template/style.css">
  <link rel="stylesheet" media="screen" href="/phpmotors/css/vehicles/style.css">

</head>


<body class="body">
    <div class="content_addVehicles">
        <header class="header">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/logo.php' ?>
            <?//php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/navbar.php'?>
            <?php echo $navList?>

        </header>
        <main class="main_delVehicles">
        <h1 class="title">
            <?php
            if(isset($invInfo['invMake'])){
                echo "Delete $invInfo[invMake] $invInfo[invModel]";}
            ?>
        </h1>

            <?php
            //Display Error Messages
                if (isset($message)) {
                echo $message;
                }
            ?>
            <form id="Update" class="form_delete" action="/phpmotors/vehicles/index.php" method="post">
            <label class="label_make" for="invMake" >Make</label>
            <input class="input_make" name="invMake"
            id="invMake" <?php if(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?> required placeholder="Enter the Brand of the car" readonly>
            <label class="label_model" for="invModel">Model</label>
            <input type="text" class="input_model" name="invModel" maxlength="30" id="invModel" <?php if(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?> placeholder="Enter the model of the car" required readonly>
            <label for="invDescription" class="label_description">Description</label>
            <textarea name="invDescription" id="invDescription" class="input_description" form="Update"  required placeholder="Enter the description here" readonly><?php if(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; } ?></textarea>
            <input class="button classification" name="submit" type="submit" value="Delete Vehicle">
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="deleteVehicle">
            <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];}?>">
            </form>
        </main>
        <footer class="footer">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/footer.php' ?>
        </footer>
    </div>
</body>
</html>