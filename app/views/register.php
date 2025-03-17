<?php include 'header.php'; ?>

<h2>Inscription</h2>

<form class="register-form" method="POST" action="index.php?page=register">
    <label for="name">Nom :</label>
    <input type="text" name="name" required>

    <label for="email">Email :</label>
    <input type="email" name="email" required>

    <label for="password">Mot de passe :</label>
    <input type="password" name="password" required>

    <button type="submit">S'inscrire</button>
</form>

<?php include 'footer.php'; ?>