
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
               <p class="display_sucess"><?php if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];}?>
                </p>


            <form class="form form_SingIn" action="/phpmotors/accounts/" method="POST" id="SingIn">
                <label class="label_email"  for="clientEmail">Email</label>
                <input class="input_email" name="clientEmail" id="clientEmail" type="email" <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?> placeholder='Enter a valid email address' required>
                <label class="label_pass" for="clientPassword">Password</label>
                <span class="instructions" id="instruction">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
                <input class="input_pass" name="clientPassword" id="clientPassword" type="password"  required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" placeholder="Enter the Password">
                <input class="button LogIn" name="submit" type="submit" value="Log in">
                 <!-- Add the action name - value pair -->
                 <input type="hidden" name="action" value="Login">
          </form>
          <p class="text"><a class="register_link" href="/phpmotors/accounts/index.php?action=register" target="_blank">Not a member Yet?</a></p>
        </main>
        <footer class="footer">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/footer.php' ?>
        </footer>
    </div>

<script>
    const elem = document.activeElement;
    let inputPassword=document.getElementById("clientPassword");
    let spanInstruction=document.getElementById('instruction');

    inputPassword.addEventListener('mouseup',verify);
    let click=0;
    function verify(){
        click++;
        let result= click%2;
        function displaySpan(){
            if (inputPassword === document.activeElement && result!==0){
                    spanInstruction.style.display="flex";
            }else{
                spanInstruction.style.display="none";
            }
        }

        displaySpan();
    }
</script>


</body>
</html>