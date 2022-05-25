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
    <h1 class="text-center"> Todos los artículos </h1>

    <div class="articles">
        <?php 
        foreach ($articles as $article) {
            require($_SERVER['DOCUMENT_ROOT'].FOLDER."/modules/article_card.php");
        }
        ?>
    </div>
    
    <?php

        print_r( $articles_result );

    ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>


    <?php
	    require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/modules/footer.php");
	?>

    <script src="<?= FOLDER ?>/assets/js/functions.js"></script>
</body>
</html>