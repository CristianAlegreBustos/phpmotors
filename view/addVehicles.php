<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css2?family=Teko&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@400&display=swap" rel="stylesheet">
  <title>PHP Motors | Update Inventory</title>
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
        <main class="main_addVehicles">
            <h1 class="title">Add Vehicles</h1>
            <?php
            //Display Error Messages
                if (isset($message)) {
                echo $message;
                }
            ?>
            <form id="Update" class="form_inventory" action="/phpmotors/vehicles/index.php" method="post">
            <?php echo $classificationList; ?>
            <label class="label_make" for="invMake" >Make</label>
            <input class="input_make" name="invMake"
            id="invMake" type="text" >
            <label class="label_model" for="invModel">Model</label>
            <input type="text" class="input_model" name="invModel" id="invModel">
            <label for="invDescription" class="label_description">Description</label>
            <textarea name="invDescription" id="invDescription" class="input_description" form="Update">Enter description here...</textarea>
            <label for="invImage" class="label_imagePath">Image Path</label>
            <input type="text" class="input_imagePath" name=invImage id="invImage">
            <label for="invThumbnail" class="label_thumbnailPath">Thumbnail Path</label>
            <input type="text" id="invThumbnail" name="invThumbnail" class="input_thumbnail">
            <label for="invPrice" class="label_price">Price</label>
            <input type="text" name="invPrice" id="invPrice" class="input_price">
            <label for="invStock" class="label_stock">Stock Available</label>
            <input type="text" class="input_stock" name="invStock" id="invStock">
            <label for="invColor" class="label_color">Color</label>
            <input type="text" class="input_color" name="invColor" id="invColor">
            <input class="button" name="submit" type="submit" value="Update">
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="updateInventory">
            </form>

        </main>
        <footer class="footer">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/footer.php' ?>
        </footer>
    </div>
</body>