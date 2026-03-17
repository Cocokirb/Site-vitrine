<?php
    include __DIR__ .'/includes/header.php' ;
?>

  <main class="container">
    <section aria-labelledby="contact-title">
      <h1 id="contact-title">Contact — Envoyer un mail</h1> <br>

      <form class="contact-form" id="contactForm" >
        <label for="to">Destinataire</label>
        <input id="to" type="email" value="sonoris.musique@gmail.com" readonly>

        <label for="subject">Objet</label>
        <input id="subject" type="text" placeholder="Objet du message" required>

        <label for="body">Message</label>
        <textarea id="body" placeholder="Votre message..." required></textarea>

        <button class="btn" type="submit">Envoyer</button>
        <a class="btn ghost" href="site_vitrine_accueil.php">Annuler</a>
      </form>

      <div id="preview" class="mail-preview" style="display:none; margin-top:24px;">
    </section>
  </main>

<?php
    include __DIR__ .'/includes/footer.php' ;
?>