<?php
if(!isset($_SESSION['loggedin'])){
    header('Location: /phpmotors/index.php');
}
?>
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
                id="classificationName" <?php if(isset($classificationName)){echo "value='$classificationName'";} ?> placeholder="Enter the new classification" required maxlength="30">
                <span class="instructions" id="instruction">Don't use more than 30 characters</span>
                <input class="button" name="submit" type="submit" value="Add Classification" >
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="updateCarClassification">
            </form>
        </main>
        <footer class="footer">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/footer.php' ?>
        </footer>
    </div>
</body>
<script>
    let inputClassification=document.getElementById("classificationName");
    let spanInstruction=document.getElementById('instruction');

    inputClassification.addEventListener('mouseup',verify);
    let click=0;
    function verify(){
        click++;
        let result= click%2;
        function displaySpan(){
            if (inputClassification === document.activeElement && result!==0){
                    spanInstruction.style.display="flex";
            }else{
                spanInstruction.style.display="none";
            }
        }

        displaySpan();
    }
</script>
</html>