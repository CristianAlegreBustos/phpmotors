
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css2?family=Teko&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@400&display=swap" rel="stylesheet">
  <title>PHP Motors</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" media="screen" href="/phpmotors/css/template/style.css">
  <link rel="stylesheet" media="screen" href="/phpmotors/css/login/style.css">

</head>


<body class="body">
    <div class="content">
        <header class="header">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/logo.php' ?>
            <?php //require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/navbar.php'?>
            <?php echo $navList?>

        </header>
        <main class="main">
            <h1 class="title">Sing In</h1>

            <?php
            //Display Succes Messages
                if (isset($message)) {
                echo $message;
                }
            ?>

            <form class="form form_SingIn" action="" method="POST" id="SingIn">
                <label class="label_email"  for="clientEmail">Email</label>
                <input class="input_email" name="clientEmail" id="clientEmail" type="text">
                <label class="label_pass" for="clientPassword">Password</label>
                <input class="input_pass" name="clientPassword" id="clientPassword" type="password">
                <button class="button LogIn" type="button">Log In</button>
          </form>
          <p class="text"><a class="register_link" href="http://lvh.me/phpmotors/accounts/index.php?action=register" target="_blank">Not a member Yet?</a></p>
        </main>
        <footer class="footer">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/footer.php' ?>
        </footer>
    </div>
</body>