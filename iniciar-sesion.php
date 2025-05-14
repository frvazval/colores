<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once "modulos/meta.php"; ?>
    <title>Login</title>
    <script src="js/login.js" defer></script>
</head>
<body>
     <?php include_once "modulos/header.php"; ?>

     <main class="main-crear-usuario">
        <section>
            <img src="img/colores.jpg" alt="colores">
        </section>

        <section>
            <form name="formLogin">
                <fieldset>
                    <h2>Introduce tus datos</h2>
                    <div>
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre">
                        <p id="errorUsuario"></p>
                    </div>
                    
                    <div>
                        <label for="password">Contraseña:</label>
                        <input type="password" name="password" id="password" maxlength="12">
                        <p id="errorPassword"></p>
                    </div>
                    
                    <div>
                        <button type="submit">Iniciar sesión</button>
                        <a href="crear-usuario.php">Ya tengo cuenta</a>
                    </div>
                </fieldset>
            </form>
        </section>
     </main>
</body>
</html>