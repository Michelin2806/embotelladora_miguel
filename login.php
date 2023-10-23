<?php
require_once 'usuarios.php';

// Comprobar si la sesión ya ha sido iniciada
if (session_status() == PHP_SESSION_NONE) {
    // Iniciar la sesión
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Autenticar al usuario
    $usuario_id = authenticate($_POST['nombre_usuario'], $_POST['clave']);

    if ($usuario_id !== false) {
        // Almacenar el ID del usuario en la sesión
        $_SESSION['usuario_id'] = $usuario_id;
        // Redirigir al usuario a la página de llenados
        header('Location: index.php');
        exit();
    } else {
        // Manejar el error de autenticación
        $error = "Nombre de usuario o clave incorrectos <br> Vuelva a intentar";
    }
}

header("X-Content-Type-Options: nosniff");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

         <!--Import Google Icon Font-->
         <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <nav>
        <div class="nav-wrapper #f57c00 orange darken-2">
            <a href="login.php" class="brand-logo center">Embotelladora</a>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="sass.html">----</a></li>
            </ul>
        </div>
    </nav>
<br><br><br><br>
        <div class="container marginbottom #fff59d yellow lighten-3" style="border-radius: 15px;">
            <div> <p>‎ </p></div>
            <div class='row center-align'>
                <?php if (isset($error)): ?>
                    <p><?php echo $error; ?></p>
                <?php endif; ?>
            </div>

            <form method="post" action="login.php">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="nombre_usuario" type="text" name="nombre_usuario" class="validate">
                        <label for="nombre_usuario">Usuario</label><br>
                    </div>
                </div>
                
                <div class="row">
                    <div class="input-field col s12">
                        <input id="clave" type="password" name="clave" class="validate">
                        <label for="clave">Contraseña</label><br>
                    </div>
                </div>

                <div class='row center-align'>
                    <button class="waves-effect waves-light btn-small" value="Iniciar sesión" type="submit">Iniciar</button>
                </div>
            </form>
            <div> <p>‎ </p></div>
        </div>
<br><br><br><br><br><br>
     <!--JavaScript at end of body for optimized loading-->
     <script type="text/javascript" src="js/materialize.min.js"></script>
	
</body>
<footer class="page-footer #f57c00 orange darken-2">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Miguel Parraga</h5>
              </div>
              <div class="col l4 offset-l2 s12">
                <ul>

          </div>
          <div class="footer-copyright">
            <div class="container">
            <a class="#fff59d yellow -text text-lighten-3 right" href="https://youtu.be/KTbynh5cRcQ?si=7uUJ0u55pMxph2QO"></a>
            </div>
          </div>
</footer>
</html>