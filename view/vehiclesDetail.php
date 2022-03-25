<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css2?family=Teko&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@400&display=swap" rel="stylesheet">
  <title><?php echo $classificationName; ?> vehicles | PHP Motors, Inc.</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" media="screen" href="/phpmotors/css/template/style.css">
  <link rel="stylesheet" media="screen" href="/phpmotors/css/vehiclesDetail/style.css">
</head>

<body class="body">
    <div class="content cntnt_detail">
        <header class="header">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/logo.php' ?>
            <?php echo $navList?>

        </header>
        <main class="main">
        <div class="wrapper">
            <?php if(isset($message)){
            echo $message; }
            ?>
            <?php if(isset($vehicleDisplay)){
            echo $vehicleDisplay;
            } ?>
            <?php if(isset($thumbDisplay)){
            echo $thumbDisplay;
            } ?>
        </div>

        </main>
        <footer class="footer">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/footer.php' ?>
        </footer>
    </div>
</body>
</html>