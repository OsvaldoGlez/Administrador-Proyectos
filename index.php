<?php 
    require_once 'includes/cabecera.php'; 
    session_start();
    unset($_SESSION['usuario']);
?>
<body>
    <div class="jumbotron jumbotron-fliud" id="jumbotron">
        <div class="container">
            <h1>Administrador de Proyectos</h1>
            <p>Herramienta para administrar y dar seguimiento a los proyectos y sus tareas.</p>
        </div>
    </div>
    <div class="container">
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form" action="controllers/usuarioController.php" method="post">
                                <h2 class="text-center text-info">Login</h2>
                                <div class="form-group">
                                    <label for="email" class="text-info"><strong>Email</strong>:</label><br>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pass" class="text-info"><strong>Contraseña</strong>:</label><br>
                                    <input type="password" name="pass" class="form-control">
                                </div>
                                <br>
                                <div class="form-group row text-center">
                                    <div class="col-md-12">
                                        <input type="hidden" name="ingresar" value="ingresar">
                                        <input type="submit" class="btn btn-info" value="Ingresar">
                                        <a href="views/registroUsuario.php" class="btn btn-info">Registrar Usuario</a>
                                        <a href="views/registroEmpleado.php" class="btn btn-info">Registrar Empleado</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'includes/footer.php'; ?>
</body>
</html>