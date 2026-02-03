/* catalogue.js — filtrage (niveau étudiant BTS SIO SLAM)
   - Remarque : placez ce fichier dans le même dossier que `catalogue.html`
   - Comportement : clique sur onglet → n'affiche que les produits de la catégorie
   - Prend en charge le hash (ex: #product-guitare ou #category-instruments)
*/

document.addEventListener('DOMContentLoaded', function () {
  const tabs = Array.from(document.querySelectorAll('.category-tab'));
  const cards = Array.from(document.querySelectorAll('.product-card'));
  const status = document.querySelector('.filter-status');

  // sécurité : si éléments manquent, on log pour debug et on quitte proprement
  if (!tabs.length || !cards.length) {
    console.warn('[catalogue.js] tabs ou cards manquants — vérifiez le HTML');
    return;
  }

  function announce(count) {
    if (!status) return;
    status.textContent = `Affichage de ${count} ${count > 1 ? 'produits' : 'produit'}`;
  }

  function setActive(tabEl) {
    tabs.forEach(t => t.classList.remove('active'));
    tabs.forEach(t => t.setAttribute('aria-pressed', 'false'));
    if (tabEl) {
      tabEl.classList.add('active');
      tabEl.setAttribute('aria-pressed', 'true');
    }
  }

  function showCategory(cat) {
    let visible = 0;
    cards.forEach(card => {
      const c = card.dataset.category || 'other';
      const keep = (cat === 'all') || (c === cat);
      card.classList.toggle('hidden', !keep);
      if (keep) visible++;
    });
    announce(visible);
  }

  function handleClick(e) {
    const tab = e.currentTarget;
    const href = tab.getAttribute('href') || '';
    e.preventDefault();

    // cas "Tous"
    if (href.endsWith('#product-list-all')) {
      history.replaceState(null, '', '#product-list-all');
      setActive(tab);
      showCategory('all');
      return;
    }

    // cas #category-xxx
    const m = href.match(/#category-(.+)$/);
    if (m) {
      const cat = m[1];
      history.replaceState(null, '', '#category-' + cat);
      setActive(tab);
      showCategory(cat);
      return;
    }
  }

  // attacher les écouteurs
  tabs.forEach(t => t.addEventListener('click', handleClick));

  // gestion du hash au chargement (ex: ouverture directe sur #product-guitare)
  function applyHash(h) {
    if (!h) { setActive(document.querySelector('.category-tab[href$="#product-list-all"]')); showCategory('all'); return; }
    if (h.startsWith('#product-')) {
      const prod = document.querySelector(h);
      if (prod) {
        const cat = prod.dataset.category || 'all';
        const tab = document.querySelector('.category-tab[href$="#category-' + cat + '"]') || document.querySelector('.category-tab[href$="#product-list-all"]');
        setActive(tab);
        showCategory(cat);
        // faire défiler légèrement vers le produit
        setTimeout(() => prod.scrollIntoView({ behavior: 'smooth', block: 'center' }), 80);
        return;
      }
      // produit non trouvé → afficher tout
      setActive(document.querySelector('.category-tab[href$="#product-list-all"]'));
      showCategory('all');
      return;
    }
    if (h.startsWith('#category-')) {
      const cat = h.replace('#category-', '');
      const tab = document.querySelector('.category-tab[href$="#category-' + cat + '"]') || document.querySelector('.category-tab[href$="#product-list-all"]');
      setActive(tab);
      showCategory(cat === 'product-list-all' ? 'all' : cat);
      return;
    }
    // pas de hash pertinent
    setActive(document.querySelector('.category-tab[href$="#product-list-all"]'));
    showCategory('all');
  }

  applyHash(location.hash || '');

  // support back/forward
  window.addEventListener('hashchange', function () { applyHash(location.hash || ''); });

  // expose pour debug dans la console (optionnel pour les élèves)
  window.__sonorisFilter = { showCategory, tabsCount: tabs.length, cardsCount: cards.length };
});
