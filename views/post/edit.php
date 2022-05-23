<!DOCTYPE html>
<html>
<head>
	<title> Editar artículo </title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?= FOLDER ?>/assets/css/style.css">
	<meta charset="utf-8">

</head>
<body>
<?php
	require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/modules/navigator.php");
?>

	<!-- POST -->
	<div class="container page">
		<div class="row justify-content-center">
			<div class="col-8">
            <form method="post" action="<?= FOLDER ?>/article/edit/<?= $article->id ?>">
                <div class="form-group">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Título del artículo" value="<?= $article->title ?>">
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="description" id="description" cols="30" rows="10"><?= $article->description ?></textarea>
                </div>
              
                <button type="submit" class="btn btn-warning">Editar</button>
                </form>

            </div>
		</div>

		
	</div>

	<!-- FOOTER -->
	<?php
	require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/modules/footer.php");

	?>

<script>

	document.getElementById("title").addEventListener("keyup", function(e) {
		console.log("tecleo");

	});

</script>
</body>
</html>