<?php
    $titrePage = "Panier — Sonoris";
    include __DIR__ .'/includes/header.php' ;
?>

  <main class="container">
    <section aria-labelledby="panier-title">
      <h1 id="panier-title">Panier</h1> <br>
      
      <div id="cart-empty" style="text-align: center; padding: 40px 0;">
        <p style="font-size: 1.3rem; color: rgba(0,0,0,0.6);"> Votre panier est vide</p>
        <p><a class="btn" href="catalogue.php">Continuer vos achats</a></p>
      </div>

      <div id="cart-content" style="display: none;">
        <div style="display: flex; gap: 30px; margin-bottom: 30px;">
          <!-- Gauche - Articles du panier -->
          <div style="flex: 1;">
            <div id="cart-items" style="display: flex; flex-direction: column; gap: 15px;">
              <!-- Les articles du panier s'affichent ici -->
            </div>
          </div>

          <!-- Droite - Résumé -->
          <div style="flex: 0 0 280px;">
            <div class="cart-summary" style="border: 1px solid #ddd; border-radius: 8px; padding: 20px; background: #f9f9f9;">
              <div class="summary-row" style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #ddd;">
                <span>Frais de port :</span>
                <span style="font-weight: bold;">10,00€</span>
              </div>
              <div class="summary-row" style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #ddd;">
                <span>Sous-total :</span>
                <span id="subtotal" style="font-weight: bold;">0,00€</span>
              </div>
              <div class="summary-row total" style="font-size: 1.2em;">
                <span><strong>Total :</strong></span>
                <span id="total"><strong>0,00€</strong></span>
              </div>
            </div>
          </div>
        </div>

        <div class="cart-actions">
          <a class="btn ghost" href="catalogue.php">Continuer vos achats</a>
          <button class="btn" id="checkout-btn" style="display: none;">Procéder au paiement</button>
        </div>
      </div>

      <div id="error-message" style="color: #d32f2f; margin-top: 10px; text-align: center; display: none; font-size: 1rem;">
        <strong>⚠️ Votre panier est vide. Veuillez ajouter des produits avant de continuer.</strong>
      </div>

    </section>
  </main>


  <script>
    // Produits disponibles
    const products = {
      'product-guitare': { name: 'Guitare électrique Standard', price: 349.00 },
      'product-guitare-classique': { name: 'Guitare classique 39 pouces', price: 169.00 },
      'product-basse': { name: 'Basse 4 cordes', price: 289.00 },
      'product-batterie': { name: 'Batterie électronique 5 pièces', price: 379.00 },
      'product-clavier': { name: 'Clavier numérique 61 touches', price: 219.00 },
      'product-sono': { name: 'Enceinte active 12"', price: 429.00 },
      'product-ampli': { name: 'Amplificateur guitare 50W', price: 299.00 },
      'product-micro': { name: 'Micro cardioïde de studio', price: 129.00 },
      'product-casque': { name: 'Casque studio fermé', price: 79.00 },
      'product-cordes': { name: 'Jeu de cordes guitare premium', price: 24.99 },
      'product-baguettes': { name: 'Baguettes batterie pro', price: 12.99 },
      'product-mediator': { name: 'Médiator guitare pack', price: 8.99 }
    };

    function loadCart() {
      const cart = JSON.parse(localStorage.getItem('cart')) || {};
      return cart;
    }

    function saveCart(cart) {
      localStorage.setItem('cart', JSON.stringify(cart));
    }

    function renderCart() {
      const cart = loadCart();
      const cartItems = document.getElementById('cart-items');
      const cartContent = document.getElementById('cart-content');
      const cartEmpty = document.getElementById('cart-empty');
      const checkoutBtn = document.getElementById('checkout-btn');
      const errorMessage = document.getElementById('error-message');

      cartItems.innerHTML = '';

      if (Object.keys(cart).length === 0) {
        // Panier vide
        cartContent.style.display = 'none';
        cartEmpty.style.display = 'block';
        checkoutBtn.style.display = 'none';
        errorMessage.style.display = 'none';
        return;
      }

      // Panier avec produits
      cartContent.style.display = 'block';
      cartEmpty.style.display = 'none';
      checkoutBtn.style.display = 'inline-block';
      errorMessage.style.display = 'none';

      let total = 0;
      const SHIPPING_FEE = 10.00;

      for (const [productId, quantity] of Object.entries(cart)) {
        const product = products[productId];
        if (!product) continue;

        const subtotal = product.price * quantity;
        total += subtotal;

        const itemDiv = document.createElement('div');
        itemDiv.style.cssText = 'display: flex; align-items: center; padding: 15px; border: 1px solid #ddd; border-radius: 6px; background: #fff; gap: 15px;';
        itemDiv.innerHTML = `
          <div style="flex: 1;">
            <h4 style="margin: 0 0 8px 0; font-size: 1em;">${product.name}</h4>
            <p style="margin: 0; color: #666; font-size: 0.9em;">Prix unitaire: <strong>€${product.price.toFixed(2)}</strong></p>
          </div>
          <div style="display: flex; align-items: center; gap: 10px;">
            <div class="qty-control" style="display: flex; gap: 5px; align-items: center;">
              <button class="qty-btn" onclick="updateQty('${productId}', ${quantity - 1})" style="padding: 5px 10px; border: 1px solid #ccc; background: #f0f0f0; cursor: pointer;">−</button>
              <input type="number" value="${quantity}" min="1" onchange="updateQty('${productId}', this.value)" style="width: 50px; text-align: center; padding: 5px; border: 1px solid #ccc;">
              <button class="qty-btn" onclick="updateQty('${productId}', ${quantity + 1})" style="padding: 5px 10px; border: 1px solid #ccc; background: #f0f0f0; cursor: pointer;">+</button>
            </div>
            <button class="btn-remove" onclick="removeFromCart('${productId}')" style="padding: 6px 12px; background: #e74c3c; color: white; border: none; border-radius: 4px; cursor: pointer;">Supprimer</button>
          </div>
          <div style="min-width: 100px; text-align: right;">
            <p style="margin: 0; font-size: 0.9em; color: #666;">Quantité: <strong>${quantity}</strong></p>
            <p style="margin: 8px 0 0 0; font-size: 1.1em; font-weight: bold;">€${subtotal.toFixed(2)}</p>
          </div>
        `;
        cartItems.appendChild(itemDiv);
      }

      const totalWithShipping = total + SHIPPING_FEE;
      document.getElementById('subtotal').textContent = '€' + total.toFixed(2);
      document.getElementById('total').textContent = '€' + totalWithShipping.toFixed(2);
    }

    function updateQty(productId, qty) {
      const cart = loadCart();
      const quantity = parseInt(qty);

      if (quantity <= 0) {
        removeFromCart(productId);
        return;
      }

      cart[productId] = quantity;
      saveCart(cart);
      renderCart();
    }

    function removeFromCart(productId) {
      const cart = loadCart();
      delete cart[productId];
      saveCart(cart);
      renderCart();
    }

    function clearCart() {
      localStorage.setItem('cart', JSON.stringify({}));
      renderCart();
    }

    // Bouton paiement
    document.getElementById('checkout-btn')?.addEventListener('click', function(e) {
      const cart = loadCart();
      if (Object.keys(cart).length === 0) {
        e.preventDefault();
        document.getElementById('error-message').style.display = 'block';
        setTimeout(() => {
          document.getElementById('error-message').style.display = 'none';
        }, 4000);
        return;
      }
      window.location.href = 'paiement.php';
    });

    // Afficher le panier au chargement
    renderCart();
  </script>

<?php
    include __DIR__ .'/includes/footer.php' ;
?>