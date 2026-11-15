<div style="padding: 20px; max-width: 1000px; margin: 40px auto; min-height: 50vh;">
    <h1 style="color: #b8860b; border-bottom: 2px solid #d4af37; padding-bottom: 10px;">Espace Administrateur</h1>
    <p style="font-size: 1.2em;">Bienvenue dans votre tableau de bord, <?= htmlspecialchars($_SESSION['user_prenom']) ?>.</p>

    <div style="display: flex; gap: 20px; margin-top: 30px; flex-wrap: wrap;">
       
        <div style="flex: 1; min-width: 300px; border: 1px solid #ddd; padding: 25px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <h3>Gestion des Menus</h3>
            <p>Ajoutez de nouveaux plats au catalogue ou modifiez les prix existants.</p>
          
            <a href="/public/index.php?page=admin_menus" style="display: inline-block; padding: 10px 15px; background-color: #333; color: white; text-decoration: none; border-radius: 5px;">Gérer le catalogue</a>
        </div>

      
        <div style="flex: 1; min-width: 300px; border: 1px solid #ddd; padding: 25px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <h3>Commandes Clients</h3>
            <p>Consultez les commandes en attente et validez les prochaines livraisons.</p>
            <a href="/public/index.php?page=admin_commandes" style="display: inline-block; padding: 10px 15px; background-color: #333; color: white; text-decoration: none; border-radius: 5px;">Voir les commandes</a>
        </div>
    </div>
</div>