<?php

require_once __DIR__ . '/../config/db.php';

$stmt = $pdo->query("SELECT * FROM menu");
$menus = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="catalogue-header" style="text-align: center; margin-bottom: 30px;">
    <h2>Catalogue de nos menus</h2>
    <p>Découvrez nos créations gourmandes pour tous vos événements.</p>
</div>

<div class="menus-container" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; padding: 20px;">
    <?php if (count($menus) > 0): ?>
        <?php foreach ($menus as $menu): ?>
            <div class="menu-card" style="border: 1px solid #ddd; padding: 15px; border-radius: 8px; width: 300px; text-align: center; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                
               
                <h3 style="color: #b8860b;"><?= htmlspecialchars($menu['titre']) ?></h3>
                
                
                <p><em>Régime : <?= htmlspecialchars($menu['regime'] ?? 'Classique') ?></em></p>
                
                
                <p><?= htmlspecialchars($menu['description']) ?></p>
                
               
                <p style="font-size: 0.9em; color: #666;">
                    À partir de <?= htmlspecialchars($menu['nombre_personne_minimum']) ?> personnes
                </p>
                
               
                <p class="prix" style="font-weight: bold; font-size: 1.2em; margin: 15px 0;">
                    <?= htmlspecialchars($menu['prix_par_personne']) ?> € / pers.
                </p>
                
        
                <a href="/public/index.php?page=add_panier&id=<?= $menu['id'] ?>" class="btn-ajouter" style="display: inline-block; padding: 10px 15px; background-color: #d4af37; color: white; text-decoration: none; border-radius: 5px;">Ajouter au panier</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun menu n'est disponible pour le moment.</p>
    <?php endif; ?>
</div>