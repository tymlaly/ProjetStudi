<div style="padding: 20px; max-width: 800px; margin: 40px auto; min-height: 50vh;">
    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #d4af37; padding-bottom: 10px; margin-bottom: 20px;">
        <h1 style="color: #b8860b; margin: 0;">Gestion des Menus</h1>
        <a href="/public/index.php?page=admin" style="padding: 8px 15px; background-color: #eee; color: #333; text-decoration: none; border-radius: 4px; font-weight: bold;">Retour au tableau de bord</a>
    </div>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
        <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; font-weight: bold; border: 1px solid #c3e6cb;">
        Le nouveau menu a été ajouté au catalogue avec succès !
        </div>
    <?php endif; ?>

    <div style="border: 1px solid #ddd; padding: 25px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); background-color: #fcfcfc;">
        <h3 style="margin-top: 0;">Ajouter un nouveau plat</h3>
        
        <form action="/public/index.php?page=admin_menus_traitement" method="POST">
            <div style="margin-bottom: 15px;">
                <label for="titre" style="font-weight: bold;">Titre du menu :</label><br>
                <input type="text" name="titre" id="titre" required placeholder="Ex: Menu Prestige (Entrée + Plat + Dessert)" style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            
            <div style="margin-bottom: 20px;">
                <label for="prix_par_personne" style="font-weight: bold;">Prix par personne (€) :</label><br>
                <input type="number" step="0.01" name="prix_par_personne" id="prix_par_personne" required placeholder="Ex: 45.50" style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            
            <button type="submit" style="padding: 12px 25px; background-color: #333; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 1.1em; font-weight: bold;">Enregistrer le menu</button>
        </form>
    </div>
</div>