<?php
    $titrePage = "Catalogue — Sonoris";
    include __DIR__ .'/includes/header.php' ;
    require_once __DIR__ . "/src/lib/fonctions.php" ;
    $catalogue = getCatalogue() ;
?>

  <main class="container">
    <section class="catalog-hero">
      <br>
      <h1>Catalogue — Tous les produits</h1>
      <p class="intro">Découvrez notre sélection de matériel neuf et reconditionné. Cliquez sur un produit pour voir plus de détails ou l'ajouter au panier.</p>
      <br>
      <p style="margin-bottom: 16px; color: white;"><a class="btn" href="panier.php">Voir le panier 🛒</a></p>

      <br>
      <br>
    </section>

    <section class="product-list" aria-label="Catalogue produits">
      

      <h1>Articles disponibles</h1>

      <br>
      
      <!--
      <nav class="category-nav" role="navigation" aria-label="Filtrer par catégorie">
        <a class="category-tab active" href="#product-list-all" aria-pressed="true">Tous</a>
        <a class="category-tab" href="#category-instruments">Instruments</a>
        <a class="category-tab" href="#category-sonorisation">Sonorisation</a>
        <a class="category-tab" href="#category-accessoires-instruments">Accessoires Instrument</a>
      </nav>
      -->
      <br>
      
      <p class="filter-status sr-only" aria-live="polite">Affichage de tous les produits</p> 

      <section id="product-list-all" class="category-section">
        <h3 class="sr-only">Tous les produits</h3>
        <div class="product-grid" aria-live="polite">
          <?php if(!empty(getCatalogue())) : ?>
              <?php  foreach($catalogue as $produit) :?>
              <article id="product-<?= htmlspecialchars($produit['code_produit']) ?>" class="product-card" data-category="<?= htmlspecialchars($produit['category']) ?>" aria-labelledby="product-title-<?= htmlspecialchars($produit['code_produit']) ?>">
                <figure class="product-media">
                <img src="image/Catalogue/<?= htmlspecialchars($produit['image']) ?>" alt="<?= htmlspecialchars($produit['nom_produit']) ?> — image produit" width="360" height="200">
                </figure>

                <h2 id="guitare-title"> <?= $produit['nom_produit'] ?></h2>
                <p><?= $produit['description_produit'] ?></p>
                <div class="price"><?= $produit['prix_TTC'] ?> € </div>
                <div class="product-actions"><a href="details-produit.php?code_produit=<?= htmlspecialchars($produit['code_produit']) ?>" class="btn">Voir / Acheter</a></div>
              </article>
              <?php endforeach ; ?>
          <?php else : ?>
              <p>Aucun produit disponible pour le moment.</p>
          <?php endif ; ?>
          

        </div>
      </section>

    </section>

  </main>

    <script src="java/catalogue.js"></script>
    <script>
      // Ajouter au panier
      function addToCart(productId, productName, productPrice) {
        let cart = JSON.parse(localStorage.getItem('cart')) || {};
        cart[productId] = (cart[productId] || 0) + 1;
        localStorage.setItem('cart', JSON.stringify(cart));
        alert(productName + ' ajouté au panier !');
      }

      // Remplacer tous les boutons Acheter
      document.querySelectorAll('.product-actions .btn').forEach(btn => {
        const card = btn.closest('.product-card');
        const productId = card.id;
        const productName = card.querySelector('h2').textContent;
        const productPrice = parseFloat(card.querySelector('.price').textContent.replace('€', ''));
        
        btn.textContent = 'Ajouter au panier';
        btn.onclick = (e) => {
          e.preventDefault();
          addToCart(productId, productName, productPrice);
        };
      });
    </script>

<?php
    include __DIR__ .'/includes/footer.php' ;
?>