<?php require_once '../includes/cabecera.php'; ?>

<body>
	<div class="jumbotron jumbotron-fliud" id="jumbotron">
        <div class="container">
            <h1>Administrador de Proyectos</h1>
        </div>
    </div>
	<div class="container text-center">
		<h2 class="text-white"><?=$_GET['mensaje'];?></h2>
		<a href="../index.php" class="btn btn-info btn-lg">Volver a Ingresar</a>
	</div>
	<?php require_once '../includes/footer.php'; ?>
</body>