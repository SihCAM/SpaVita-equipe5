<<<<<<< HEAD
<?php include 'header.php'; ?>
<form class="register-form" method="POST" action="/SpaVita-equipe5/public/?page=register">


=======
<form method="POST" action="index.php?page=register">
>>>>>>> 78d8395 (Modification chemin views/login.php &register.php ==> action= "Spavita... remplacer par "index.php?page=login">+ avancement page soins.php (developpement , css))
    <label for="name">Nom :</label>
    <input type="text" name="name" required>
    <label for="email">Email :</label>
    <input type="email" name="email" required>
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" required>
    <button type="submit">S'inscrire</button>
</form>
<?php include 'footer.php'; ?>
