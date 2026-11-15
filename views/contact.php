<div style="padding: 20px; max-width: 600px; margin: 40px auto; min-height: 50vh;">
    <h2 style="text-align: center; color: #b8860b; margin-bottom: 30px;">Contactez-nous</h2>

    <?php if (isset($_GET['success']) && $_GET['success'] === '1'): ?>
        <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; text-align: center; font-weight: bold; border: 1px solid #c3e6cb;">
            Votre message a bien été envoyé. Nous vous répondrons dans les plus brefs délais !
        </div>
    <?php endif; ?>

    <form action="/public/index.php?page=contact_traitement" method="POST" style="border: 1px solid #ddd; padding: 25px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <div style="margin-bottom: 15px;">
            <label for="nom" style="font-weight: bold;">Votre nom :</label><br>
            <input type="text" name="nom" id="nom" value="<?= isset($_SESSION['user_prenom']) ? htmlspecialchars($_SESSION['user_prenom']) : '' ?>" required style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="email" style="font-weight: bold;">Votre email :</label><br>
            <input type="email" name="email" id="email" required style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 20px;">
            <label for="message" style="font-weight: bold;">Votre message :</label><br>
            <textarea name="message" id="message" rows="6" required style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px; resize: vertical;"></textarea>
        </div>
        <button type="submit" style="width: 100%; padding: 12px; background-color: #d4af37; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 1.1em; font-weight: bold;">Envoyer le message</button>
    </form>
</div>