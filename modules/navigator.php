<nav class="navbar navbar-dark bg-dark">
   <a class="navbar-brand" href="/">Blog MVC en PHP</a>
   <ul class="nav justify-content-end">
   			<li class="nav-item">
				<a class="btn btn-primary" href="<?= FOLDER ?>/news/1">Ver artículos</a>
			</li>
		<?php 
			if( !$currentUser ){
		?>
				<li class="nav-item">
					<a class=" btn btn-outline-light" href="<?= FOLDER ?>/login">Login</a>
				</li>
				<li class="nav-item">
					<a class="btn btn-primary" href="<?= FOLDER ?>/signup">Registro</a>
				</li>
		<?php 
			}else{
		?>
				<li class="nav-item">
					<a class="btn btn-success" href="<?= FOLDER ?>/article/new">Nuevo artículo</a>
				</li>
				<li class="nav-item">
					<a class=" btn btn-outline-light" href="<?= FOLDER ?>/profile"> <?= $currentUser->email ?> </a>
				</li>
				<li class="nav-item">
					<form action="<?= FOLDER ?>/logout" method="post">
						<button class="btn btn-danger" type="submit">Salir</button>
					</form>
				</li>

		<?php
			}
		?>
	</ul>
</nav>