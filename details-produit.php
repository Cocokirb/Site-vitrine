<?php
    require_once __DIR__ . "/src/lib/fonctions.php" ; 
    include __DIR__ . "/includes/header.php" ;

    $tabCatalogue = getCatalogue() ;
    $messageErreur = "" ;
    $produitRecherche = null ;

    $code_prod = $_GET['code_produit'] ?? $_GET['id'] ?? '' ;

    // Validation du paramètre
    if ($code_prod === ''){
        $messageErreur = "Identifiant de produit manquant" ;
    }elseif(filter_var($code_prod , FILTER_VALIDATE_INT) === false) {
        $messageErreur = "Identifiant doit être une valeur numérique" ;
    }elseif((int)$code_prod <= 0) {
        $messageErreur = "Identifiant doit être strictement positif" ;
    }else{
        foreach($tabCatalogue as $produit){
            if((int)$produit['code_produit'] == (int)$code_prod){
                $produitRecherche = $produit ;
                break ;  
            }
        }
        if($produitRecherche === null){
            $messageErreur = "Le produit que vous recherchez n'existe pas ou n'est plus disponible dans notre catalogue." ;
        }
    }
?>

<main class="container">
    <section class="product-detail-hero">
      <br>
      <a href="catalogue.php" class="btn">← Retour au catalogue</a>
      <br><br>
    </section>

    <?php if(!empty($messageErreur)) : ?>
      <div class="error-message" style="background: #fee; padding: 16px; border-radius: 8px; color: #c33; margin: 20px 0;">
        <strong>Erreur :</strong> <?= htmlspecialchars($messageErreur) ?>
      </div>
    <?php elseif($produitRecherche !== null) : ?>
      
      <section class="product-detail">
        <div class="detail-grid">
          <!-- Image du produit -->
          <div class="detail-image">
            <figure class="product-media-detail">
              <img src="image/Catalogue/<?= htmlspecialchars($produitRecherche['image'] ?? 'placeholder.jpg') ?>" 
                   alt="<?= htmlspecialchars($produitRecherche['nom_produit'] ?? 'Produit') ?>" 
                   width="500" height="400">
            </figure>
          </div>

          <!-- Informations du produit -->
          <div class="detail-info">
            <h1><?= htmlspecialchars($produitRecherche['nom_produit'] ?? 'Sans titre') ?></h1>
            
            <div class="detail-code">
              <strong>Code produit :</strong> <?= htmlspecialchars($produitRecherche['code_produit'] ?? 'N/A') ?>
            </div>

            <div class="detail-price">
              <strong>Prix :</strong> <span class="price-value">€<?= htmlspecialchars($produitRecherche['prix_TTC'] ?? '0,00') ?></span>
            </div>

            <div class="detail-category">
              <strong>Catégorie :</strong> <?= htmlspecialchars($produitRecherche['category'] ?? 'Non catégorisé') ?>
            </div>

            <div class="detail-description">
              <h2>Description</h2>
              <p><?= nl2br(htmlspecialchars($produitRecherche['description_produit'] ?? 'Aucune description disponible')) ?></p>
            </div>

            <div class="product-actions">
              <button class="btn" onclick="addToCart('<?= htmlspecialchars($produitRecherche['code_produit']) ?>', '<?= htmlspecialchars($produitRecherche['nom_produit']) ?>', <?= (float)($produitRecherche['prix_TTC'] ?? 0) ?>)">
                Ajouter au panier 🛒
              </button>
            </div>
          </div>
        </div>
      </section>

    <?php else : ?>
      <div class="info-message" style="background: #eef; padding: 16px; border-radius: 8px; color: #33c; margin: 20px 0;">
        Veuillez sélectionner un produit.
      </div>
    <?php endif ; ?>

</main>

<style>
  .product-detail-hero {
    padding: 20px 0;
  }

  .product-detail {
    margin: 30px 0;
    background: rgba(255,255,255,0.95);
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }

  .detail-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    align-items: start;
  }

  .product-media-detail {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    margin: 0;
  }

  .product-media-detail img {
    width: 100%;
    height: auto;
    display: block;
  }

  .detail-info h1 {
    font-size: 2.2rem;
    margin: 0 0 20px 0;
    color: #2c3e50;
  }

  .detail-code,
  .detail-category {
    margin: 12px 0;
    font-size: 1rem;
    color: #555;
  }

  .detail-price {
    margin: 20px 0;
    font-size: 1.4rem;
  }

  .price-value {
    color: #e74c3c;
    font-weight: bold;
    font-size: 1.6rem;
  }

  .detail-description {
    margin: 30px 0;
  }

  .detail-description h2 {
    font-size: 1.5rem;
    margin: 0 0 15px 0;
  }

  .detail-description p {
    line-height: 1.8;
    color: #666;
  }

  .product-actions {
    margin-top: 30px;
  }

  .product-actions .btn {
    padding: 12px 24px;
    font-size: 1.1rem;
    background: #3a4c5f;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s;
  }

  .product-actions .btn:hover {
    background: #2c3a4a;
  }

  @media (max-width: 900px) {
    .detail-grid {
      grid-template-columns: 1fr;
      gap: 20px;
    }

    .detail-info h1 {
      font-size: 1.8rem;
    }
  }

  .error-message, .info-message {
    font-size: 1rem;
  }
</style>

<script>
  function addToCart(productId, productName, productPrice) {
    let cart = JSON.parse(localStorage.getItem('cart')) || {};
    cart[productId] = (cart[productId] || 0) + 1;
    localStorage.setItem('cart', JSON.stringify(cart));
    alert(productName + ' ajouté au panier !');
  }
</script>

<?php
    include __DIR__ .'/includes/footer.php' ;
?>