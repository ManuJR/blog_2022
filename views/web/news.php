<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?= FOLDER ?>/assets/css/style.css">


</head>
<body>
    <?php
	    require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/modules/navigator.php");
	?>
    <h1 class="text-center"> Todos los artículos </h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <!-- FORM con petición sin AJAX  -->
                <!-- <form class="form-inline" method="GET" action="" >
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> -->

                <!-- FORM con petición CON AJAX  -->
                <form class="form-inline" method="" action="" >
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" id="text_search">
                    <span class="btn btn-outline-success my-2 my-sm-0" id="btn_search" >Search</span>
                </form>
            </div>
        </div>
    </div>

    <div class="articles">
        <?php 
        foreach ($articles as $article) {
            require($_SERVER['DOCUMENT_ROOT'].FOLDER."/modules/article_card.php");
        }
        ?>
    </div>
    
    <?php

    /*     
        $paginator = new Paginator($page, $max_page);

       $paginator->printPaginator(); 
       
    */
    ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
                if( $page > 1 ){
            ?>
                <li class="page-item"><a class="page-link" href="<?= FOLDER ?>/news/<?php echo($page-1) ?>">Previous</a></li>

            <?php 
                }

                for ($i=1; $i <= $max_page; $i++) { 
                    /*  
                    $active = "";
                    if( $page == $i ){
                        $active = "active";
                    } 
                    */

                    $active =   $i == $page ?  "active" : "";

                    echo " <li class='page-item $active'><a class='page-link' href='".FOLDER."/news/$i'>$i</a></li>";

                }

                if( $page < $max_page ){
            ?>
                <li class="page-item"><a class="page-link" href="<?= FOLDER ?>/news/<?php echo($page+1) ?>">Next</a></li>
            <?php 
                }
            ?>
        </ul>
    </nav>


    <?php
	    require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/modules/footer.php");
	?>

    <script src="<?= FOLDER ?>/assets/js/functions.js"></script>
</body>
</html>