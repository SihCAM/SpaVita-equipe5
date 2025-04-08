<?php 
include '../app/views/header.php';
?>

<main class="employe-form-section">
    <h1>Ajouter un nouvel employé</h1>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="form-success-employe">
            <i class="fas fa-check-circle"></i>
            <?= htmlspecialchars($_SESSION['success']) ?>
        </div>
        <?php unset($_SESSION['success']);?>
        <?php endif; ?>



    <?php if (isset($_SESSION['error'])): ?>
        <div class="form-error-employe"><?= htmlspecialchars($_SESSION['error']) ?></div>
        <?php endif; ?>

        <form method="POST" action="index.php?page=employe" class="form-ajout-employe">
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" required>
            </div>

            <div class="form-group-employe">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" required>
            </div>

            <div class="form-group-employe">
                <label for="email">Email professionnel:</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group-employe">
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" required>
            </div>

            <div class="form-group-employe">
                <label for="fonction">Fonction :</label>
                <input type="text" name="fonction" required>
            </div>

            <div class="form-group-employe">
                <label for="telephone">Téléphone :</label>
                <input type="text" name="telephone" required>
            </div>

            <div class="form-group-employe">
                <label for="competences">Compétences:</label>
                <input type="text" name="competences" placeholder="Massage relaxant, Hammam, etc.">
            </div>

            <div class="form-group-employe">
                <label for="description">Description :</label>
                <textarea name="description" rows="4" placeholder="Courte biographie ou présentation...">
                </textarea>
            </div>

            <div class="form-group-employe">
                <label for="role">Rôle:</label>
                <select name="reole" required>
                    <option value="employe">Employé></option>
                    <option value="admin">Admin (Rsponsable ou Adjoint)</option>
                </select>
            </div>

            <button type="submit" class="btn-ajouter btn">Ajoutr l'employé</button>

        </form>














</main>















<?php include '../app/views/footer.php'; ?>