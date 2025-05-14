


<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once "modulos/meta.php"; ?>
    <title>Crear cuenta</title>
    <script src="js/crear-usuario.js" defer></script>
</head>
<body>
     <?php include_once "modulos/header.php"; ?>

     <main class="main-crear-usuario">
        <section>
            <img src="img/colores.jpg" alt="colores">
        </section>

        <section>
            <form name="formNewUser">
                <fieldset>
                    <h2>Introduce tus datos</h2>
                    <div>
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" pattern="/^[A-zÑñÇçÁÉÍÓÚáéíóúÀÈÌÒÙàèìòùüï·\s]+$/">
                        <p id="errorUsuario"></p>
                    </div>
                    <div>
                        <label for="password">Contraseña:</label>
                        <input type="password" name="password" id="password" maxlength="12">
                        <p id="errorPassword"></p>
                    </div>
                    <div>
                        <label for="password2">Repite la contraseña:</label>
                        <input type="password" name="password2" id="password2" maxlength="12">
                        <p id="errorPassword"></p>
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" maxlength="100">
                        <p id="errorEmail"></p>
                    </div>
                    <div>
                        <label for="idioma">Idioma</label>
                        <select name="idioma" id="idioma">
                            <option value="ESP" selected>ESP</option>
                            <option value="CAT">CAT</option>
                            <option value="ESP">ENG</option>
                        </select>                        
                    </div>
                    <div>
                        <button type="submit">Crear cuenta</button>
                        <a href="acceso.php">Acceder</a>
                    </div>
                </fieldset>
            </form>
        </section>
     </main>
</body>
</html>