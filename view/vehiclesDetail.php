<?php
$abrName=substr($_SESSION['clientData']['clientFirstname'],0,1) .". ".$_SESSION['clientData']['clientLastname'];

$form= '<form  method="POST" class="form enter_review" id="reviewComment" action="/phpmotors/reviews/index.php?" action="addNewReview" >';
$form .="<label class='label user_name'>$abrName</label>";
$form .='<textarea name="reviewText" id="reviewText" class="input_reviewText" form="reviewComment" placeholder="Enter your comments here" required></textarea>';
$form .= '<input class="button" type="submit" name="submit" value="Comment">';
$form .= '<!-- hidden inputs -->';
$form .= '<!-- clientId input -->';
$form .= "<input type='hidden' name='clientId' value=". $_SESSION['clientData']['clientId']."> ";
$form .='<!-- invId input -->';
$form.= "<input type='hidden' name='invId' value=".$invId .">";
$form.= '<input type="hidden" name="carName" value="';
$form.= $classificationName .'"';
$form.=">";
$form.= "<!-- action input -->";
$form.='<input type="hidden" name="action" value="addNewReview">';
$form.='</form>';

if(isset($_SESSION['message'])){
    $message=$_SESSION['message'];
}

?>

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
        <?php if(isset($message)){
            echo $message;
        }

            echo $_SESSION['message'];

            ?>
        <div class="wrapper">
            <?php if(isset($vehicleDisplay)){
            echo $vehicleDisplay;
            } ?>
            <?php if(isset($thumbDisplay)){
            echo $thumbDisplay;
            } ?>
        </div>
        <p class="info_text notice"> <a href="/phpmotors/accounts/index.php?action=login" class="links">Log In or Register </a> to add comments in the bottom of the webpage</p>

        <h1 class="title info_title">Customer Reviews</h1>
        <?php
        if(isset($_SESSION['loggedin'])){
            echo $form;
            }else{
                echo "<p class='info_text notice'> <a href='/phpmotors/accounts/index.php?action=login' class='links'>Log In or Register </a> to add comments in the bottom of the webpage</p>";
            }
            ?>
            <br>
            <br>
        <?php if(isset($displayReview)){
                echo $displayReview;//from the vehicles controller
            }else{
                echo $messageReview;//from the vehicles controller
            }
            if (isset($_SESSION['messageData'])){
                echo $_SESSION['messageData'];
            unset($_SESSION['messageData']);
            }


        ?>
        </main>
        <footer class="footer">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/footer.php' ?>
        </footer>
    </div>
</body>
</html>