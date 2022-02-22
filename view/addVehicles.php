<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css2?family=Teko&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@400&display=swap" rel="stylesheet">
  <title>PHP Motors | Update Inventory</title>
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
        <main class="main_addVehicles">
            <h1 class="title">Add Vehicles</h1>
            <?php
            //Display Error Messages
                if (isset($message)) {
                echo $message;
                }
            ?>
            <form id="Update" class="form_inventory" action="/phpmotors/vehicles/index.php" method="post">
            <?php echo $classificationList; ?>
            <label class="label_make" for="invMake" >Make</label>
            <input class="input_make" name="invMake"
            id="invMake" maxlength="30" type="text" <?php if(isset($invMake)){echo "value='$invMake'";} ?> required placeholder="Enter the Brand of the car">
            <label class="label_model" for="invModel">Model</label>
            <input type="text" class="input_model" name="invModel" maxlength="30" id="invModel" <?php if(isset($invModel)){echo "value='$invModel'";} ?> placeholder="Enter the model of the car" required >
            <label for="invDescription" class="label_description">Description</label>
            <textarea name="invDescription" id="invDescription" class="input_description" form="Update"  required placeholder="Enter the description here"><?php if(isset($invDescription)){echo $invDescription;}?></textarea>
            <label for="invImage" class="label_imagePath">Image Path</label>
            <input type="text" class="input_imagePath" name=invImage maxlength="50" id="invImage" <?php if(isset($invImage)){echo "value='$invImage'";} ?> required placeholder="Enter the path to the image file">
            <label for="invThumbnail" class="label_thumbnailPath">Thumbnail Path</label>
            <input type="text" id="invThumbnail" name="invThumbnail" maxlength="50"class="input_thumbnail" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} ?> required placeholder="Enter the path to the Thumbnail" >
            <label for="invPrice" class="label_price">Price</label>
            <input type="number" name="invPrice" id="invPrice" class="input_price" <?php if(isset($invPrice)){echo "value='$invPrice'";} ?> required placeholder="Enter the price of the car" >
            <label for="invStock" class="label_stock">Stock Available</label>
            <input type="number" class="input_stock" name="invStock" id="invStock" <?php if(isset($invStock)){echo "value='$invStock'";} ?> required placeholder="Enter the avaliable stock for this car" >
            <label for="invColor" class="label_color">Color</label>
            <input type="text" class="input_color" name="invColor" maxlength="20" id="invColor" <?php if(isset($invColor)){echo "value='$invColor'";} ?> required placeholder="Enter the color of the car" >
            <input class="button classification" name="submit" type="submit" value="Update">
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="updateInventory">
            </form>

        </main>
        <footer class="footer">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/footer.php' ?>
        </footer>
    </div>
    <script>

document.querySelectorAll("[class*='input'] ").forEach(input => {
    let click=0;
  input.addEventListener('click', event => {
        click++;
        let result= click%2;
        let maxlength=input.attributes[3].value;
        let type=input.attributes[0].value;
            if (result!==0 && type==="text"){
                    let spanInstruction=document.createElement("span");
                    spanInstruction.className="instruction";
                    input.parentNode.insertBefore(spanInstruction, input.nextSibling);
                    let node=document.createTextNode(`Don't use more than ${maxlength} characters`);
                    spanInstruction.appendChild(node);
            }else if(result!==0 && type==="number"){
                let spanInstruction=document.createElement("span");
                spanInstruction.className="instruction";
                input.parentNode.insertBefore(spanInstruction, input.nextSibling);
                let node=document.createTextNode(`Use Number for this field`);
                spanInstruction.appendChild(node);
            }
  });
  input.addEventListener('blur',event=>{
    document.querySelectorAll(".instruction").forEach(span => {
                    span.style.display="none";
                });
  });

});

            </script>
</body>
</html>