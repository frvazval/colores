    <header>
        <div>
            <h1>Nuestros colores favoritos</h1>
            <?php if (isset($_SESSION['usuario'])) : ?>
            <span>
                Hola, <?= $_SESSION['usuario'] ?>
            </span>
            <?php endif; ?>
        </div>
        
        
    </header>