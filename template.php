
<!DOCTYPE html>
<html>
<head>
  <title>PHP Motors</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <link rel="stylesheet" media="screen" href="/phpmotors/css/template/style.css">
 
</head>


<body class="body">
    <div class="content">
        <header class="header">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/logo.php' ?> 
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/navbar.php'?>   
        </header>
        <main class="main">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/content.php' ?> 
        </main>
        <footer class="footer">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/footer.php' ?> 
        </footer>
    </div>
</body>