
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css2?family=Teko&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@400&display=swap" rel="stylesheet">
  <title>PHP Motors | Car Classification</title>
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
        <main class="main_carClassification">
            <h1 class="title_classification">Add Car Classification</h1>
            <?php
            //Display Error Messages
                if (isset($message)) {
                echo $message;
                }
            ?>
            <form class="form form_classification" action="/phpmotors/vehicles/index.php" method="POST" id="NewClassification">
                <label class="label_NewClassification" for="classificationName">Classification Name</label>
                <input type="text" class="input_NewClassification"
                name="classificationName"
                id="classificationName">
                <input class="button classification" name="submit" type="submit" value="Add Classification">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="updateCarClassification">
            </form>
        </main>
        <footer class="footer">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/footer.php' ?>
        </footer>
    </div>
</body>