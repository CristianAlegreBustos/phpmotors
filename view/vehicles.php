
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
        </main>
        <footer class="footer">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/footer.php' ?>
        </footer>
    </div>
</body>