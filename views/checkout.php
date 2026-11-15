<div style="padding: 20px; max-width: 600px; margin: 40px auto;">
    <h2 style="text-align: center; color: #b8860b; margin-bottom: 30px;">Finaliser ma commande</h2>
    
    <form action="/public/index.php?page=checkout_traitement" method="POST" style="border: 1px solid #ddd; padding: 25px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        
        <div style="margin-bottom: 15px;">
            <label for="date_livraison" style="font-weight: bold;">Date de votre événement :</label><br>
            <!-- On empêche de commander pour une date passée grâce à l'attribut min -->
            <input type="date" name="date_livraison" id="date_livraison" required min="<?= date('Y-m-d') ?>" style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        
        <div style="margin-bottom: 15px;">
            <label for="heure_livraison" style="font-weight: bold;">Heure de livraison souhaitée :</label><br>
            <input type="time" name="heure_livraison" id="heure_livraison" required style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 25px;">
            <label style="font-weight: bold;">Souhaitez-vous inclure le prêt de matériel (tables, vaisselle...) ?</label><br>
            <div style="margin-top: 10px;">
                <input type="radio" id="mat_oui" name="pret_materiel" value="1">
                <label for="mat_oui">Oui, j'en aurai besoin</label>
            </div>
            <div style="margin-top: 5px;">
                <input type="radio" id="mat_non" name="pret_materiel" value="0" checked>
                <label for="mat_non">Non, je suis déjà équipé</label>
            </div>
        </div>
        
        <button type="submit" style="width: 100%; padding: 12px; background-color: #333; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 1.1em; font-weight: bold;">Confirmer ma commande</button>
    </form>
</div>