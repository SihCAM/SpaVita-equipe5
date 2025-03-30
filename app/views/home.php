
<?php 
include '../app/views/header.php';
?>

<!--Section hero-->
<section class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>BEAUTY & SPA</h1>
        <p>Offrez-vous un moment de relaxation absolue dans notre spa situé entre Lac et Montagne</p>
        <!--home-hero-buttons-->
        <div class="hero-buttons">
        <a href="index.php?page=soins" class="btn">Parcourir nos soins</a>
            <a href="index.php?page=reservations" class="btn">Réserver maintenant</a>
        </div>
    </div>
</section>

<!--Presentation du spa-->
<section class="presentation">
    <div class="presentation-overlay"></div>

    <div class="presentation-container">
        <div class="presentation-text">
             <h2>Notre Histoire</h2>
    <p>Niché entre lac et montagne, <strong>SpaVita</strong> est un sanctuaire de bien être au coeur d'Annecy. Fondé en 2000, notre spa incarne l'harmonie entre la nature et la détente, offrant un refuge apaisant loin de l'agitation quotidienne. <br> </p>
    <p> Inspiré par les paysages majestueux d'Annecy, SpaVita vous invite à une <strong>expérience sensorielle unique</strong>. Laissez-vous envelopper par l'ambiance paisible et le luxe naturel de notre établissemnt.</p>
        </div>
   
    <div class="separateur"></div> <!--ligne de séparation-->

    <div class="presentation-text">
        <h2>Un espace de Bien-être Unique</h2>
        <p>
            Avec plus de <strong>700m²</strong> d'installations dédiées à la relaxation, SpaVita vous ouvre les portes d'un monde de sérénité. Profitez d'une <strong>piscine intérieure chaufée</strong> avec vue panoramique, d'un <strong>hammam aux senteurs apaisantes</strong>, et d'un <strong>sauna aux pierres volcaniques</strong>. 
        </p>
        <p>
            Nos cabines de soins vous acceuillent pour des <strong>rituels relaxants</strong>, avec des produits inspirés des rihesses alpines. Que ce soit pour un massage aux huiles essentielles, un soin de beauté ou une pause détente dans notre solarium, chaque instant à SpaVita est une invitation à l'évasion.
        </p>
    </div>
</div>
</section>

<!--Section nos Meilleurs soins -->
<section class="services">
    <div class="heading">
        <h1>EXPLORER</h1>
        <h2 class="section-title">Nos Vedettes</h2>
    <p class="section-subtitle">Laissez vous emporter dans un havre de paix...</p>
    </div>
    
    <div class="services-list">
        <div class="service-item">
            <img src="assets/images/meilleur-soin-massage.png" alt="Massage detente">
            <h3>Massage Détente</h3>
            <p>Profitez d'un massage aux huiles essentielles pour relâcher toutes vos tensions </p>
            <span class="price">A partir de 59€</span>
        </div>
        <div class="service-item">
            <img src="assets/images/meilleur-soin-visage.png" alt="Soins du visage">
            <h3>Soins du visage Eclat</h3>
            <p>Un soin personnaliszé pour revitaliser votre peau et retrouver un teint lumineux</p>
            <span class="price">A partir de 49€</span>
        </div>
        <div class="service-item">
            <img src="assets/images/meilleur-soin-jacuzzi.png" alt="Jaccuzzi">
            <h3>Bains Relaxant</h3>
            <p>Plongez dans une eau chaude apaisante et profitez d'un moment de pure relaxation. </p>
            <span class="price">A partir de 39€</span>
        </div>
    </div>
    <div class="service-button">
        <a href="index.php?page=soins" class="btn">Découvrir tous les soins</a>
    </div>
</section>


<!--Section Témoignages -->
<section class="temoignages">
    <div class="container"></div>
    <div class="section-header">
        <h2>Ce que disent nos clients</h2>
        <p>Des expériences inoubliables partagées par nos visiteurs</p>
    </div>

    <div class="temoignage-slider">
        <button class="prev"><i class="fas fa-chevron-left"></i></button>
        <div class="temoignage-track">
            <div class="temoignage-active"> 
                <div class="temoignage">
                <div class="temoignage-content">
                    <p>"Un lieu magique pour se détendre et oublier le stress du quotidien. Une équipe aux petits soins !"</p>
                    <div class="temoignage-auteur">- Sophie L.</div>
                </div>
                </div>
            </div>

            <div class="temoignage">
            <div class="temoignage-content">
                <p>"Dès les premiers instants, j'ai été séduite par la sérénité du lieu. Un cadre élégant, un fond sonore, des huiles essentielles délicatement diffusées... Chaque soin est réalisé avec une attention particulière, procurant une détente profonde. Une parenhèse enchantée que ne renouvellerai avec plaisir."</p>
                <div class="temoignage-auteur">- Elise C.</div>
            </div>
            </div>

            <div class="temoignage">
                <div class="temoignage-content">
                    <p>"Le meilleur massage que j'ai jamais eu ! Je recommande fortement SpaVita."</p>
                    <div class="temoignage-auteur">- Marc D.</div>
                </div>
            </div>

            <div class="temoignage">
                <div class="temoignage-content">
                    <p>"Un moment de détente inoubliable, je reviendrai sans hésiter !"</p>
                    <div class="temoignage-auteur">- Thomas B.</div>
                </div>
            </div>

         </div>
    </div>

    <button class="next"><i class="fas fa-chevron-right"></i></button>
</section>

<!--Section Service-->
<section class="services-prestations">
    <div class="container-services-prestations">
        <div class="heading">
            <h1>DECOUVRIR</h1>
            <h2>Nos services</h2>
            <p>SpaVita vous offre un univers de détente alliant gastronomie beauté et relaxation...</p>
        </div>
    </div>  
        <div class="services-prestations-content">
            <div class="left grid2">
                <div class="box">
                    <div class="text">
                        <i class="fa-solid fa-utensils"></i>
                        <h3>Restaurant Raffiné</h3>
                    </div>
                </div> 
                <div class="box">
                    <div class="text">
                        <i class="fa-solid fa-spa"></i>
                        <h3>Spa & Massages</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="text">
                        <i class="fa-solid fa-heart"></i>
                        <h3>Soins Beauté</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="text">
                        <i class="fa-solid fa-water"></i>
                        <h3>Bains Extérieurs</h3>
                    </div>
                </div>
            </div>
                <div class="right">
                    <img src="assets/images/home/spavita-services.jpg" alt="Services">
                </div>
            </div> 
        </div>
</section>

<!--SECTION PRATIICENS-->

<div class="heading">
        <h1>Rencontrez</h1>
        <h2 class="section-title">Nos Praticiens</h2>
    <p class="section-subtitle">Des praticiens passionnés et hautement qualifiés, dédiés à votre bien être...</p>
</div>
<div class="praticiens-grid">

    <div class="praticien-card">
        <div class="praticien-image">
            <img src="assets/images/praticiens/praticien1.jpg" alt ="premier praticien">
        </div>
        <div class="praticien-info">
            <h3>Sarah Lebon</h3>
            <span class="praticien-title">Masseuse Certifiée</span>
            <p>Spécialiste des massages relaxants et thérapeutiques avec plus de 10ans expérience</p>
            <div class="praticien-skills">
                <i class="fas fa-check-circle">Massage relaxant</i> 
                <i class="fas fa-check-circle">Massage aux pierres chaudes</i> 
            </div>
        </div>

    <!--Bio cachée, s'affiche au survol-->
        <div class="praticien-overlay">
            <p>Sarah a acquis son expertise Thaïlande, puis a perfectionné ses techniques en Suisse. Ses clients apprécient son approche douce et personnalisée</p>
        </div>
    </div>

        <div class="praticien-card">
        <div class="praticien-image">
            <img src="assets/images/praticiens/praticien2.jpg" alt ="deuxième praticien">
        </div>
        <div class="praticien-info">
            <h3>Lucas Ferre</h3>
            <span class="praticien-title">Thérapeute bien-être</span>
            <p>Ancien kinésithérapeute reconverti dans les soins de bien-être global à Annecy </p>
            <div class="praticien-skills">
                <i class="fas fa-check-circle">Réflexologie</i> 
                <i class="fas fa-check-circle">Massage sportif</i> 
            </div>
        </div>
   
        <div class="praticien-overlay">
            <p>Lucas s'est formé dans les Alpes suisses; Il adpate chaque séance selon la morphologie et le rythme du client.</p>
        </div>
    </div>

        <div class="praticien-card">
        <div class="praticien-image">
            <img src="assets/images/praticiens/praticien3.jpg" alt ="troisième praticien">
        </div>
        <div class="praticien-info">
            <h3>Claire Dubois</h3>
            <span class="praticien-title">Esthéticienne</span>
            <p>Experte en soisn du visage bio et rituels beauté inspirés des Alpes</p>
            <div class="praticien-skills">
                <i class="fas fa-check-circle">Soins visage</i> 
                <i class="fas fa-check-circle">Rituels aux plantes alpines</i> 
            </div>
    </div>
        <div class="praticien-overlay">
            <p>Claire participe à une sélectionne minitieuse des plantes locales pour offir le meilleur des masques. Elle est apréciée pour sa douceur et son sens du détail.</p>
        </div>
    </div>

    <div class="praticien-card">
        <div class="praticien-image">
            <img src="assets/images/praticiens/praticien4.jpg" alt ="premier praticien">
        </div>
        <div class="praticien-info">
            <h3>Julien Buy</h3>
            <span class="praticien-title">Hydrothérapeute</span>
            <p>Maîtrise des techniques de relaxation par l'eau et les bains aromatiques.</p>
            <div class="praticien-skills">
                <i class="fas fa-check-circle">Hydrothérapie</i> 
                <i class="fas fa-check-circle">Bain aux huiles essentielles</i> 
            </div>
    </div>
        <div class="praticien-overlay">
            <p>Julien a étiidié en Autriche. Il crée des ambiances sonores et olfactives uniques pendant chaque bain.</p>
        </div>
    </div>

    <div class="praticien-card">
        <div class="praticien-image">
            <img src="assets/images/praticiens/praticien5.jpg" alt ="cinquième praticien">
        </div>
        <div class="praticien-info">
            <h3>Amélie Rousset</h3>
            <span class="praticien-title">Spécialiste hammam</span>
            <p>Crétrice de rituels sensoriels et experte des traditions orientales.</p>
            <div class="praticien-skills">
                <i class="fas fa-check-circle">Hammam</i> 
                <i class="fas fa-check-circle">Gommage au savon noir</i> 
            </div>
        </div>
        <div class="praticien-overlay">
            <p>Amélie a été formée à Marrakech. Sa gestuelle fluide et enveloppante est plébiscitée par les habitués.</p>
        </div>
    </div>

    <div class="praticien-card">
        <div class="praticien-image">
            <img src="assets/images/praticiens/praticien6.jpg" alt ="sixième praticien">
        </div>
        <div class="praticien-info">
            <h3>Nicolas betin</h3>
            <span class="praticien-title">Coach de respiration</span>
            <p>Accompagnement du stress par la respiration et les techniuques de pleine conscience.</p>
            <div class="praticien-skills">
                <i class="fas fa-check-circle">Respiration consciente</i> 
                <i class="fas fa-check-circle">Relaxation guidée</i> 
            </div>
    </div>
        <div class="praticien-overlay">
            <p>JNicolas a traviallé avec des alpinnistes et des plongeurs en apnée. Il est réputé pour sa voix apaisante</p>
        </div>
    </div>

    <div class="praticien-card">
        <div class="praticien-image">
            <img src="assets/images/praticiens/praticien7.jpg" alt ="septième praticien">
        </div>
        <div class="praticien-info">
            <h3>Elena Garcia</h3>
            <span class="praticien-title">Thérapeute holistique</span>
            <p>Approche global du corps et de l'esprit inspirée par la nature.</p>
            <div class="praticien-skills">
                <i class="fas fa-check-circle">Aromathérapie</i> 
                <i class="fas fa-check-circle">Reiki</i> 
            </div>
    </div>
        <div class="praticien-overlay">
            <p>Elena utilise les plantes en provenance du massif des Bauges et propose des soins énergétiques en lien avec les cycles lunaires</p>
        </div>
    </div>

    <div class="praticien-card">
        <div class="praticien-image">
            <img src="assets/images/praticiens/praticien8.jpg" alt ="huitième praticien">
        </div>
        <div class="praticien-info">
            <h3>Thomas Vidal</h3>
            <span class="praticien-title">Spécialiste jacuzzi</span>
            <p>Expérience immersive et relaxante dans nos jacuzzis intérieurs et extérieurs.</p>
            <div class="praticien-skills">
                <i class="fas fa-check-circle">Jaccuzzi extérieur</i> 
                <i class="fas fa-check-circle">Relaxation sensorielle</i> 
            </div>
        </div>
        <div class="praticien-overlay">
            <p>Thomas coordonne des séances sur mesure avec lumière, sons et huiles essentilelles.</p>
        </div>
    </div>

    <div class="praticien-card">
        <div class="praticien-image">
            <img src="assets/images/praticiens/praticien9.jpg" alt ="neuvième praticien">
        </div>
        <div class="praticien-info">
            <h3>Héloïse Martel</h3>
            <span class="praticien-title">Experte en soin s du corps</span>
            <p>Héloïse allie douceur et téchnicité pour détendre les tensions musculaires profondes.</p>
            <div class="praticien-skills">
                <i class="fas fa-check-circle">enveloppements</i> 
                <i class="fas fa-check-circle">Drainage lymphatique</i> 
            </div>
        </div>
        <div class="praticien-overlay">
            <p>Formée à Annecy et lyon, Julie est saluée pour sa précision et sa bienveillance naturelle.</p>
        </div>
    </div>

    <div class="praticien-card">
        <div class="praticien-image">
            <img src="assets/images/praticiens/praticien10.jpg" alt ="dixième praticien">
        </div>
        <div class="praticien-info">
            <h3>Isabelle Chardon</h3>
            <span class="praticien-title">Naturopathe & coach bien -être</span>
            <p>Accompagnement global avec plantes, nutrition et soins de relaxation naturelle.</p>
            <div class="praticien-skills">
                <i class="fas fa-check-circle">Conseils en phytothérapie</i> 
                <i class="fas fa-check-circle">Massages aux huuiles bio</i> 
            </div>
        </div>
        <div class="praticien-overlay">
            <p>Originaire de la région d'Annecy, Isabelle valorise les produits locaux et accompagne chaque client versun équilibre  durable.</p>
        </div>
    </div>
        
 
 </div>

<?php include '../app/views/footer.php'; ?>

