<?php
    $titrePage = "À propos de nous — Sonoris";
    include __DIR__ .'/includes/header.php' ;
?>


    <main>
      <section class="container">
          <br>
          <h1>À propos de Sonoris</h1>
          
          <div class="about-section">
            <p> <strong>Sonoris</strong> est une entreprise qui a été fondée récemment en 2025 <strong>par des passionnés de musique souhaitant offrir la possibilité de vivre la même expérience qu'eux.</strong>  
            <br>
            <strong>Notre but :</strong> proposer une offre responsable et compétitive dans le domaine du matériel musical, à des prix raisonnables. 
            <br>
            De plus, afin d'éviter que des équipements anciens ne tombent dans l'oubli, nous proposons un service de reconditionnement, en complément de la vente et du conseil.</p>
          </div>

          <h2>Notre parcours</h2>

          <section class="timeline-section">
            <div class="timeline-year">
              <h4>2025</h4>
              <ul>
                <li>Création de l'entreprise et premiers partenariats avec des fournisseurs locaux.</li>
                <li>Début des activités de reconditionnement et mise en place d'un contrôle qualité.</li>
              </ul>
            </div>
          </section>

          <section class="timeline-section">
            <div class="timeline-year">
              <h4>2026</h4>
              <ul>
                <li>Ouverture des services de démonstration et de location courte durée pour événements.</li>
              </ul>
            </div>
          </section>

          <section class="timeline-section">
            <div class="timeline-year">
              <h4>Futur</h4>
              <ul>
                <li>Continuité du plan marketing</li>
                <li>Amélioration des services de location et de reconditionnement.</li>
                <li>Augmentation des partenariats futur avec d'autre entreprise</li>
                <li>Stratégie de développement en essayant d'ouvrir des magasin en présentiel dans de grande villes</li>
              </ul>
            </div>
          </section>

          <br>

          <h2>Nos engagements</h2>
          <div class="engagement-section">
            <p>Nous nous engageons sur plusieurs points : proposer des produits de qualités et testés, offrir un service client réactif, recycler et reconditionner si possible de manière responsable, et accompagner les établissements (écoles, salles) pour des solutions sur mesure.</p>
          </div>

          <br>

          <h2>Nos valeurs</h2>

          <div class="valeurs-container">
            <div class="valeur-item">
              <h3>Qualité</h3>
              <p>Proposer des produits testés et de qualité supérieure pour assurer la satisfaction du client.</p>
            </div>
            <div class="valeur-item">
              <h3>Responsabilité environnementale</h3>
              <p>Reconditionnement responsable et engagement envers l'environnement.</p>
            </div>
            <div class="valeur-item">
              <h3>Expertise</h3>
              <p>Partager nos connaissances musicales et proposer des solutions adaptées à chaque besoin.</p>
            </div>
            <div class="valeur-item">
              <h3>Innovation</h3>
              <p>Développer des services novateurs comme la location et la démonstration d'équipements.</p>
            </div>
          </div>

          <!--Organigramme et fiches de postes */-->
          <h2 style="margin-top: 40px;">Organigramme</h2>
          
          <div class="organigramme-container">
            <!-- Niveau 1 -->

            <div class="org-level level-1">
              <div class="org-box">
                <h4>Dirigeant</h4>
                <p>Direction générale</p>
              </div>
            </div>


            <div class="org-connector"></div>

            <!-- Niveau 2: Responsables -->
            <div class="org-level level-2">
              <div class="org-box">
                <h4>Responsable Administratif et Juridique</h4>
                <p>Affaires administratives et juridique</p>
              </div>
              <div class="org-box">
                <h4>Responsable Marketing et Communication</h4>
                <p>Stratégie marketing</p>
              </div>
              <div class="org-box">
                <h4>Responsable Ventes</h4>
                <p>Gestion commerciale</p>
              </div>
            </div>


            <div class="org-connector"></div>

            <!-- Niveau 3: Chargé de Communication -->
            <div class="org-level level-3">
              <div class="org-box">
                <h4>Chargé de Communication</h4>
                <p>Communication & contenu</p>
              </div>
            </div>
          </div>

          <h2 style="margin-top: 40px;">Nos postes</h2>
          <p>Découvrez les différentes positions et rôles disponibles au sein de notre entreprise :</p>
          
          <div class="grid">
              <article class="card">
                  <h3>Dirigeant</h3>
                  <p>Responsable de la direction générale et de la stratégie de Sonoris.</p>
                  <p><a class="btn" href="Fiches_de_postes/Fiche%20de%20poste%20dirigeant.pdf" download>Télécharger</a></p>
              </article>

              <article class="card">
                  <h3>Responsable Administratif et Juridique</h3>
                  <p>Gestion des affaires administratives, légales et conformité de l'entreprise.</p>
                  <p><a class="btn" href="Fiches_de_postes/Fiche%20de%20poste%20responsable%20administratif%20et%20juridique.pdf" download>Télécharger</a></p>
              </article>

              <article class="card">
                  <h3>Responsable Marketing et Communication</h3>
                  <p>Pilotage de la stratégie marketing, communication et promotion des produits.</p>
                  <p><a class="btn" href="Fiches_de_postes/Fiche%20de%20poste%20responsable%20marketing%20et%20communication.pdf" download>Télécharger</a></p>
              </article>

              <article class="card">
                  <h3>Chargé de Communication</h3>
                  <p>Création et diffusion du contenu de communication pour tous les canaux.</p>
                  <p><a class="btn" href="Fiches_de_postes/Fiche%20de%20poste%20chargé%20de%20communication.pdf" download>Télécharger</a></p>
              </article>
          </div>

          <br>
      </section>

    </main>

<?php
    include __DIR__ .'/includes/footer.php' ;
?>
