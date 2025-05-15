<form name="formLogin">
<fieldset>
<h2>Introduce tus datos</h2>
<div>
    <label for="nombre">Nombre:</label>
    <!-- Acuerdate de poner el required  -->
    <input type="text" name="nombre" id="nombre" >
    <p id="errorUsuario"></p>
</div>
<div>
    <label for="password">Contraseña:</label>
    <!-- Acuerdate de poner el required  -->
    <input type="password" name="password" id="password" maxlength="12">
    <p id="errorPassword"></p>
</div>


<div>
    <button type="submit">Acceder</button>
    <a href="crear-usuario.php">Crear cuenta</a>
</div>

</fieldset>

</form>