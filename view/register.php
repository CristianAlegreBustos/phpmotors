<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css2?family=Teko&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@400&display=swap" rel="stylesheet">
  <title>PHP Motors</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" media="screen" href="/phpmotors/css/template/style.css">
  <link rel="stylesheet" media="screen" href="/phpmotors/css/register/style.css">

</head>


<body class="body">
    <div class="content">
        <header class="header">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/logo.php' ?>
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/navbar.php'?>
            <?php echo $navList?>

        </header>
        <main class="main">
            <h1 class="title">Register</h1>
            <?php
            //Display Error Messages
                if (isset($message)) {
                echo $message;
                }
            ?>
            <form class="form form_Register" action="/phpmotors/accounts/index.php" method="POST" id="Register">
                <label class="label_Firstname" for="clientFirstname">First Name</label>
                <input type="text" class="input_Firstname" name="clientFirstname" id="clientFirstname" >

                <label class="label_Lastname" for="clientLastname">Last Name</label>
                <input type="text" class="input_Lastname" name="clientLastname" id="clientLastname" >

                <label class="label_email"  for="clientEmail">Email</label>
                <input class="input_email" name="clientEmail" id="clientEmail" type="text" >
                <label class="label_pass" for="clientPassword">Password</label>
                <input class="input_pass" name="clientPassword" id="clientPassword" type="password" >
                <input class="button LogIn" name="submit" type="submit" value="Register">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="registerUser">
          </form>
        </main>
        <footer class="footer">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/footer.php' ?>
        </footer>
    </div>
</body>