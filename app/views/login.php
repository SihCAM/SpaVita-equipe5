<?php include 'header.php'; ?>
<form class="login-form" method="POST" action="/SpaVita-equipe5/public/?page=login">


    <label for="email">Email :</label>
    <input type="email" name="email" required>
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" required>
    <button type="submit">Se connecter</button>
</form>
<?php include 'footer.php'; ?>
