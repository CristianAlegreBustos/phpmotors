<?php
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
   }
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Teko&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@400&display=swap" rel="stylesheet">
    <title>PHP Motors | Image Managment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" media="screen" href="/phpmotors/css/template/style.css">
    <link rel="stylesheet" media="screen" href="/phpmotors/css/uploads/style.css">
</head>


<body class="body">
    <div class="content content_upload">
        <header class="header">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/logo.php' ?>
            <?php echo $navList?>

        </header>

        <main class="main">
        <hi class="title">Image management</hi>
        <h2 class="h2">Add New Vehicle Image</h2>
        <?php
        if (isset($message)) {
        echo $message;
        } ?>

        <form action="/phpmotors/uploads/" method="post" enctype="multipart/form-data" class="form_upload">
        <label for="invItem" class="label">Vehicle</label>
            <?php echo $prodSelect; ?>
            <fieldset class="fieldset">
                <label class="label">Is this the main image for the vehicle?</label>
                <div class="options">
                <label class="label" for="priYes" class="label pImage">Yes</label>
                <input type="radio" name="imgPrimary" id="priYes" class="label pImage" value="1">
                <label class="label" for="priNo" class="pImage">No</label>
                <input type="radio" name="imgPrimary" id="priNo" class="label pImage" checked value="0">
                </div>
            </fieldset>
        <label class="label"> Upload Image:</label>
        <input class="select_classification" type="file" name="file1">
        <input class="button" type="submit" class="regbtn" value="Upload">
        <input type="hidden" name="action" value="upload">
        </form>
        <br>
        <hr class="hr">
        <h2 class="h2">Existing Images</h2>
            <p class="p display_error">If deleting an image, delete the thumbnail too and vice versa.</p>
            <?php
            if (isset($imageDisplay)) {
            echo $imageDisplay;
            } ?>

        </main>
        <footer class="footer">
            <?php require_once $_SERVER['DOCUMENT_ROOT']. '/phpmotors/components/footer.php' ?>
        </footer>
    </div>
</body>
</html>
<?php unset($_SESSION['message']); ?>
