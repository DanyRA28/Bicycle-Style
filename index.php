<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BICYCLE STYLE</title>
    <link rel="shortcut icon" href="img/logo.png" />
    <link rel="stylesheet" href="estilos/estilos.css">
    <link href="libs/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="login-body">
    <div class="login-container">
        <img src="img/logo.png">
        <h2>BICYCLE STYLE</h2>
        <form method="POST" action="">
            <div class="form-group">
            <?php
            include("controladores/controlador-login.php");
            ?>
                <label for="username">Usuario:</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="contra" name="contra" required>
            </div>
            <button type="submit" name="btnIniciar" id="btnIniciar">INICIAR SESION</button>
        </form>
    </div>
</body>
</html>

