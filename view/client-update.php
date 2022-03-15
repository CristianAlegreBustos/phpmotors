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
  <title>PHP Motors</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" media="screen" href="/phpmotors/css/template/style.css">
  <link rel="stylesheet" media="screen" href="/phpmotors/css/register/style.css">
</head>


<body class="body">
    <div class="content content_update">
        <header class="header">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/logo.php' ?>
            <?php echo $navList?>

        </header>
        <main class="main">
        <h1 class="title manager">Account Management</h1>
        <h2 class="title update">Update Account Information</h2>
        <form class="form form_Register" action="/phpmotors/accounts/index.php" method="POST" id="Register">
                <label class="label_Firstname" for="clientFirstname">First Name</label>
                <input type="text" class="input_Firstname" name="clientFirstname" id="clientFirstname"
                <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}elseif(isset($invInfo['clientFirstname'])){echo "value='$invInfo[clientFirstname]'";}
                ?> required placeholder="Enter your First Name" >

                <label class="label_Lastname" for="clientLastname">Last Name</label>
                <input type="text" class="input_Lastname" name="clientLastname" id="clientLastname" <?php if(isset($clientLastname)){echo "value='$clientLastname'";}elseif(isset($invInfo['clientLastname'])){echo "value='$invInfo[clientLastname]'";}
                ?> required placeholder="Enter your Last Name">

                <label class="label_email"  for="clientEmail">Email</label>
                <input class="input_email" name="clientEmail" id="clientEmail" type="email" placeholder='Enter a valid email address' <?php if(isset($clientEmail)){echo "value='$clientEmail'";}elseif(isset($invInfo['clientEmail'])){echo "value='$invInfo[clientEmail]'";}
                ?> required >
                <input class="button" name="submit" type="submit" value="Update Info">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="updateUser">
                <input type="hidden" name="clientId" value="
                <?php if(isset($invInfo['clientId'])){ echo $invInfo['clientId'];} elseif(isset($clientId)){ echo $clientId; }?>
                ">
          </form>

          <h2 class="title h2">Update Password</h2>
          <p class="info_text">Password must be at least 8 characters and contain at least 1 number, 1 capital letter , 1 capital letter and 1 special character <br><br>
          * note your original password will be changed</p>


          <form method="POST" class="form_updatePass" action="/phpmotors/accounts/index.php">
          <br>
            <label class="label_pass" for="clientPassword">Password</label>
            <input class="input_pass" name="clientPassword" id="clientPassword" type="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" placeholder="Enter your Password">
            <input class="button" name="submit" type="submit" value="Update Password">
             <!-- Add the action name - value pair -->
             <input type="hidden" name="action" value="updatePassword">
                <input type="hidden" name="clientId" value="
                <?php if(isset($invInfo['clientId'])){ echo $invInfo['clientId'];} elseif(isset($clientId)){ echo $clientId; }?>
                ">
          </form>
          <?php if (isset($messageUpdated)) {
                    echo $messageUpdated;
                    }?>
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