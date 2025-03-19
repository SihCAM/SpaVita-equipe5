<?php include 'header.php'; ?>

<div class="register-form">
    <h2>Inscription</h2>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="error-message">
            <?= htmlspecialchars($_SESSION['error']) ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form method="POST" action="index.php?page=register">
        <label for="name">Nom :</label>
        <input type="text" name="name" required>

        <label for="email">Email :</label>
        <input type="email" name="email" required>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required>

        <button type="submit">S'inscrire</button>
    </form>

    <p class="login-mention">Déjà un compte ? <strong><a href="index.php?page=login">Connectez-vous ici</a></strong>.</p>
</div>

<?php include 'footer.php'; ?>
