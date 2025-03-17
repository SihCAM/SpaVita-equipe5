<?php include 'header.php'; ?>

<h2>Connexion</h2>

<?php if (isset($_SESSION['error'])): ?>
    <div class="error-message">
        <?= htmlspecialchars($_SESSION['error']) ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<form class="login-form" method="POST" action="index.php?page=login">
    <label for="email">Email :</label>
    <input type="email" name="email" required>

    <label for="password">Mot de passe :</label>
    <input type="password" name="password" required>
    
    <button type="submit">Se connecter</button>
</form>

<?php include 'footer.php'; ?>
