<?php
    $titrePage = "Accueil — Sonoris";
    include __DIR__ .'/includes/header.php' ;
?>

        <main>
            <section class="hero">
                <div class="container">

                    <br>
                    <br>

                    <h1>Sonoris — Vente et pret de matériel musical</h1>

                    <br>
                    <br>
                    <br>

                    <p class="intro">Fournisseur de matériel musical neuf et reconditionné. Nous sélectionnons des instruments et équipements de qualité pour studios, écoles et musiciens.
                    Entreprise récemment créée, Nous effectuons vos livraison dans </p>
                    <p>
                    
                        <a class="btn ghost" href="contact.php">Contactez-nous</a>
                    </p>

                </div>
            </section>

            <section id="catalogue" class="features container">
                <div class="features-header">
                  <h1>Produits en vedette</h1>
                  <p><a class="btn" href="catalogue.php">Voir tout le catalogue</a></p>
                </div>

                <div class="grid">
                    <a class="card-link" href="catalogue.php#category-instruments" aria-label="Voir Instruments dans le catalogue"><article class="card" role="article">
                        <h2>Instruments</h2>
                        <p>Guitares, basses, claviers pour débutants et pros.</p>
                    </article></a>
                    <a class="card-link" href="catalogue.php#category-instruments" aria-label="Voir Claviers & Pianos dans le catalogue"><article class="card" role="article">
                        <h2>Claviers & Pianos</h2>
                        <p>Claviers numériques et pianos portables pour le studio et la scène.</p>
                    </article></a>
                    <a class="card-link" href="catalogue.php#category-sonorisation" aria-label="Voir Sonorisation dans le catalogue"><article class="card" role="article">
                        <h2>Sonorisation</h2>
                        <p>Enceintes, amplis, tables de mixage et micros pour la sonorisation.</p>
                    </article></a>
                </div>
            </section>
        </main>


<?php
    include __DIR__ .'/includes/footer.php' ;
?>