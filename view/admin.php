<?php
if(!isset($_SESSION['loggedin'])){
    header('Location: /phpmotors/');
}

$clientId=$_SESSION['clientData']['clientId'];

if(isset($_SESSION['messageUpdated'])){
    $messageAccount=$_SESSION['messageUpdated'];
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
  <link rel="stylesheet" media="screen" href="/phpmotors/css/vehicles/style.css">

</head>


<body class="body">
    <div class="content">
        <header class="header">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/logo.php' ?>
            <?php //require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/navbar.php'?>
            <?php echo $navList?>

        </header>
        <main class="main">
           <h1 class="title">
               <?php echo $_SESSION['clientData']['clientFirstname'];?> <?php echo $_SESSION['clientData']['clientLastname'];?>
           </h1>
           <ul class="information_list">
                <li class="information_name"><span class="info_title">First Name:  </span><?php echo $_SESSION['clientData']['clientFirstname'];?></li>
                <li class="information_lastname"><span class="info_title">Last Name:  </span><?php echo $_SESSION['clientData']['clientLastname'];?></li>
                <li class="information_email"><span class="info_title">Email:  </span><span class="info_text"><?php echo $_SESSION['clientData']['clientEmail'];?></span></li>
           </ul>
          <?php if (isset($messageAccount)) {
                echo $messageAccount;
                }
            ?>
           <h2 class="title h2">Account Managment</h2>
           <p class="information auth"> Use this link to update account information.</p>

           <?php
                if ($_SESSION['clientData']['clientLevel']>1){
                    echo "<a class='account links' href='/phpmotors/accounts/index.php?action=AccountManagment&clientId=$clientId'>Account Managment</a>";
                }
           ?>

            <h2 class="title h2">Inventory Managment</h2>
           <p class="information auth"> Use this link to update account information</p>
           <?php
                if ($_SESSION['clientData']['clientLevel']>1){
                    echo "<a class='account links' href='/phpmotors/vehicles/index.php'>Vehicles Managment</a>";
                }
           ?>
           <h1 class="title info_title">Customer Reviews</h1>
           <?php if(isset($displayReviewClient)){
                echo $displayReviewClient;
            }else{
                echo $messageReview;
            }
        ?>

        </main>
    <script>

        function displayOtherButtons(x){
            debugger;
            event.preventDefault();
            debugger;
            let id =x.id;
            x.style.display="none";
            let update_buttom=document.getElementById(`update_buttom.${id}`).style.display="inline";
            let delete_buttom=document.getElementById(`delete_buttom.${id}`).style.display="inline";
            let textarea=document.getElementById(`reviewText.${id}`).disabled=false;

        }
        function DeleteInputName(x){
            let id=x.id.split(".")[1];
            let delete_buttom=document.getElementById(`delete_buttom.${id}`).removeAttribute('name');
        }

        function restoreName(x){
            x.name="action";
        }

    </script>
        <footer class="footer">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/footer.php' ?>
        </footer>
    </div>
</body>