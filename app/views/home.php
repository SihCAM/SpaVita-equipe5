
<?php 
include '../app/views/header.php';
?>

<!--Section hero-->
<section class="hero">
    <div class="hero-content">
        <h1>Beauté & Bien-être</h1>
        <p>Offrez-vous un moment de relaxation absolue dans notre spa situé entre lac et montagne</p>

        <div class="hero-services">
            <div class="service">
                <span> Massages relaxants</span>
            </div>
        
            <div class="service">
                <span> Soins du visage</span>
            </div>
            <div class="service">
                <span> Hammam & Sauna</span>
            </div>
            <div class="service">
                <span> Expérience sensorielle</span>
            </div>
        </div>

        <div class="hero-buttons">
        <a href="/Spavita-equipe5/public/?page=soins" class="btn">Découvrir nos soins</a>
            <a href="/Spavita-equipe5/public/?page=reservations" class="btn">Réserver maintenant</a>
        </div>
    </div>

    <div class="hero-image"></div>
        <div class="image-grid"></div>
            <img src="assets/images/spa-hero1.jpg" alt="Massage relaxant">
            <img src="assets/images/spa-hero2.svg" alt="Spa intérieur">
            <img src="assets/images/spa-hero3.jpg" alt="Huiles essentielles">
        </div>
</section>

<!--Presentation du spa-->
<section class="presentation">
    <div class="presentation-overlay"></div>

    <div class="presentation-container">
        <div class="presentation-text">
             <h2>Notre Histoire</h2>
    <p>Niché entre lac et montagne, **SpaVita** est un danctuaire de bien être au coeur d'Annecy. Fondé en 2000, notre spa incarne l'harmonie entre la nature et la détente, offrant un refuge apaisant loin de l'agitatin quotidienne. <br> </p>
    <p> Inspiré par les paysages majestueux d'Annecy, SpaVita vous invite à une **expérience sensorielle unique**. Laissez-vous envelopper par l'ambiance paisible et le luxe naturel de notre établissemnt.</p>
        </div>
   
    <div class="separateur"></div> <!--ligne de séparation-->

    <div class="presentation-text">
        <h2>Un espace de Bien-être Unique</h2>
        <p>
            Avec plus de **700m²** d'installations dédiées à la relaxation, SpaVita vous ouvre les portes d'un monde de sérénité. Profitez d'une **piscine intérieure chaufée** avec vue panoramique, d'un **hammam aux senteurs apaisantes**, et d'un **sauna aux pierres volcaniques**. 
        </p>
        <p>
            Nos cabines de soins vous acceuillent pour des **rituels relaxants**, avec des produits inspirés des rihesses alpines. Que ce soit pour un massage aux huiles essentielles, un soin de beauté ou une pause détente dans notre solarium, chaque instant à SpaVita est une invitation à l'évasion.
        </p>
    </div>
</div>
</section>

<!--Section nos Meilleurs soins -->
<section class="services">
    <h2 class="section-title">Nos Meilleurs Soins</h2>
    <p class="section-subtitle">Découvrez des soins d'exception </p>
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
        <a href="/Spavita-equipe5/public/?page=soins" class="btn">Découvrir tous les soins</a>
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


<!--Section Contact-->
<section class="contact" id="contact">
    <div class="container">
        <div class="section-header">
            <h2>Contactez-nous</h2>
            <p>Pour toute question ou pour réserver, n'hesitez pas à nous contacter.</p>
        </div>
    <div class="contact-container">
        <div class="contact-info">
            <div class="info-item">
                <!--<i class="fas fa-map"></i>-->
                <h3>Adresse</h3>
                <p> 15 avenue du lac <br> 74000 Annecy</p>
            </div>
            <div class="info-item">
                <h3>Horaires</h3>
                <p>Lundi - Vendredi : 10h00 -20h00<br>Samedi: 9h00 - 21h00<br>Dimanche: 10h00 - 21h00</p>
            </div>
            <div class="info-item">
                <h3>Contact</h3>
                <p> Téléphone: 04 23 45 67 89<br> Email: contact@spavita.fr</p>
            </div>
        </div>
        <div class="contact-form">
            <form action="/contact" method="POST">
                <div class="form-group">
                    <input type="text" id="name" name="name" placeholder="Votre nom" required>
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Votre email" required>
                </div>
                <div class="form-group">
                    <input type="tel" id="phone" name="phone" placeholder="Votre téléphone">
                </div>
                <div class="form-group">
                    <textarea name="message" id="message" placeholder="Votre message" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</div>
</section>

<?php include '../app/views/footer.php'; ?>

