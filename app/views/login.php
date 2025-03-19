<?php include 'header.php'; ?>

<main class="main-content">
    <div class="login-form">
        <h2>Connexion</h2>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-message">
                <?= htmlspecialchars($_SESSION['error']) ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <form method="POST" action="index.php?page=login">
            <label for="email">Email :</label>
            <input type="email" name="email" required>

            <label for="password">Mot de passe :</label>
            <input type="password" name="password" required>
            
            <button type="submit">Se connecter</button>
        </form>

        <p class="register-mention">Pas encore de compte ? <strong><a href="index.php?page=register">Créez-en un ici</a></strong> pour réserver vos soins en ligne !</p>
    </div>
</main>

<?php include 'footer.php'; ?>
