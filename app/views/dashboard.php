<?php 
include '../app/views/header.php';
?>

<!--<div class="dashboard-container">
    <h2 class="dashboad-title">Dashboard</h2>
    <p class="subtitle">Bienvenue dans votre espace de gestion Spavita</p>-->
<?php if(!$employe || !is_array($employe)): ?>
    <p class="error">Erreur : Aucune information d'employe trouvée pour ce compte.</p>
    <?php else: ?>
<!--Sidebar-->
<div class="dashboard-container">

    <!--Barre latérale-->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="logo-container">
                <a href="index.php?page=home">
                    <img src="assets/images/logo.png" alt="Logo SpaVita" class="logo-dashboard">
                </a>
            </div>
            <span class="sidebar-title">SpaVita</span>
        </div>
        <div class="user-profile">
            <div class="user-avatar">
                <span class="initials"></span>
            
                <?php echo strtoupper(substr($employe['prenom'], 0, 1) .substr($employe['nom'], 0, 1)); ?>
            </div>
            <div class="user-info-dashboard">
                <p class="user-name"><?php echo $employe['prenom'] . ' ' . $employe['nom']; ?></p>
                <p class="user-role"><?php echo $employe['fonction']; ?></p>
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li><a href="index.php?page=dashboard" class="active"><i class="fas fa-home"></i>Dashboard</a></li>
                <li><a href="index.php?page=planning"><i class="fas fa-calendar-alt"></i>Planning</a></li>
                <li><a href="index.php?page=espaces"><i class="fas fa-spa"></i>Espaces</a></li>
                <li><a href="index.php?page=praticiens"><i class="fas fa-user-md"></i>Praticiens</a></li>
                <li><a href="index.php?page=profil"><i class="fas fa-user-circle"></i>Profil</a></li>
                <li><a href="index.php?page=employe"><i class="fas fa-users"></i>Employés</a></li>
                <li><a href="index.php?page=home"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
            </ul>
        </nav>
    </aside>

    <!--Contenu principal-->
    <main class="main-content">
        <!--Entête du dashboard-->
        <div class="dashboard-header">
            <h1 class="dashboard-title">Bienvenue, <?php echo $employe['prenom']; ?></h1>
            <div class="date-display">
                <i class="fas fa-clock"></i>
                <span id="current-date" class="dashboard-date"><?php echo date('l j F Y:i'); ?></span>
            </div>   
        </div>

        <!--Statistiques quotidiennes-->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="stat-info">
                    <h3>Rendez-vous aujourd'hui</h3>
                    <p id="rdvAujourdhui" class="stat-value" >0</p>
                    <span class="trend positive">+8%</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-info">
                    <h3>Clients cette semaine</h3>
                    <p id="clientsSemaine" class="stat-value" >0</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-info">
                    <h3>Taux d'occupation</h3>
                    <p id="tauxOccupation" class="stat-value" >0%</p>
                    <span class="trend positive">+5%</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-spa"></i>
                </div>
                <div class="stat-info">
                    <h3>Espaces actifs</h3>
                    <p class="stat-value">3/3</p>
                </div>
            </div>
        </div>

        <!--Profil employe-->
        <div class="profile-section">
            <div class="profile-card">
                <div class="profile-header">
                    <div class="profile-avatar">
                        <span class="initials">
                            <?php 
                            $initials = '';
                            if(!empty($employe['prenom']) && !empty($employe['nom'])) {
                                $initials = strtoupper(substr($employe['prenom'], 0,1) .substr($employe['nom'], 0, 1));
                            }
                            echo $initials;
                            ?></span>
                    </div>
                    <div class="profile-title">
                        <h2><?php echo $employe['prenom'] . ' ' . $employe['nom']; ?></h2>
                    </div>
                </div>
           
                <div class="profile-content">
                    <div class="profile-details">
                        <ul>
                            <li><i class="fas fa-envelope"></i> <?php echo $employe['email']; ?></li>
                            <li><i class="fas fa-phone"></i> <?php echo $employe['telephone']; ?></li>
                            <li><i class="fas fa-calendar"></i> 35h /semaine</li>
                        </ul>
                    </div>

                    <div class="profile-skills">
                        <h3><i class="fas fa-award"></i>Compétences</h3>
                            <ul class="skills-list">
                                <?php 
                                if (!empty($employe['competences'])) {
                                    $competences =explode(',', $employe['competences']);
                                    foreach ($competences as $skill) {
                                        echo '<li>' .trim($skill) .'</li>';
                                    } 
                                    }else {
                                        echo"<li>Aucune compétence enregistrée.</li>";
                                    }    
                                    ?>  
                            </ul>     
                    </div>

                    <div class="profile-about">
                        <h3>A propos</h3>
                        <p class ="description"><?php echo $employe['description']; ?></p>
                    </div>
                </div>   
            </div>      
        </div>
    
    

        <!--Graphiques dynamiques-->
        <div class="charts-section">
            <div class="charts-row">
                <div class="chart-card">
                    <h3>Rendez-vous par type de soin</h3>
                    <div class="chart-container">
                        <canvas id="servicesChart"></canvas>
                    </div>
                </div>

                <div class="chart-card">
                    <h3>Nombre de séances par jour</h3>
                    <div class="chart-container">
                        <canvas id="sessionsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!--Planning des praticiens-->
        <div class="schedule-section">
            <h2>Plannng des praticiens</h2>
            <div class="schedule-container">
                <div class="schedule-header">
                    <!--<div class="schedule-time-header"></div>-->
                        <div class="schedule-day">Lundi</div>
                        <div class="schedule-day">Mardi</div>
                        <div class="schedule-day">Mercredi</div>
                        <div class="schedule-day">Jeudi</div>
                        <div class="schedule-day">Vendredi</div>
                        <div class="schedule-day">Samedi</div>
                        <div class="schedule-day">Dimanche</div>
                </div>

                <div class="schedule-body" id="schedule-timeline">

                <!--Les colonnes de chaque jour seront injectée ici -->
                </div>   
            </div>
        </div> 
   
     
    </main>


    <!--fin-->
</div>
<?php endif; ?>