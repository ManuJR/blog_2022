<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?= FOLDER ?>/assets/css/style.css">
</head>
<body>
    <?php
	require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/modules/navigator.php");
	?>

    <h2 class='text-center' >404 NOT FOUND!!</h2>
    <?php
     if( isset( $error ) && !empty( $error ) ){
         echo "<p class='text-center'> ".$error->getMessage()." </p>";
     }
     
    ?>
    
    <?php
	require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/modules/footer.php");
	?>
    
</body>
</html>