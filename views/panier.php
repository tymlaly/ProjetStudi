<?php
require_once __DIR__ . '/../config/db.php';

$total = 0;
$menus_panier = [];

if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
 
    $ids = array_keys($_SESSION['panier']);
    
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    
    $stmt = $pdo->prepare("SELECT * FROM menu WHERE id IN ($placeholders)");
    $stmt->execute($ids);
    $menus_panier = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<div style="padding: 20px; max-width: 800px; margin: 40px auto; min-height: 50vh;">
    <h2 style="text-align: center; color: #b8860b; margin-bottom: 30px;">Mon Panier</h2>
    
    <?php if (empty($menus_panier)): ?>
        <p style="text-align: center; font-size: 1.2em;">Votre panier est actuellement vide.</p>
    <?php else: ?>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="border-bottom: 2px solid #d4af37; text-align: left;">
                    <th style="padding: 10px;">Menu</th>
                    <th style="padding: 10px;">Prix Unitaire</th>
                    <th style="padding: 10px;">Quantité</th>
                    <th style="padding: 10px; text-align: right;">Sous-total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menus_panier as $menu): 
                    
                    $quantite = $_SESSION['panier'][$menu['id']];
                    $sous_total = $menu['prix_par_personne'] * $quantite;
                    $total += $sous_total; // On ajoute au total général
                ?>
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 15px 10px; font-weight: bold;"><?= htmlspecialchars($menu['titre']) ?></td>
                        <td style="padding: 15px 10px;"><?= htmlspecialchars($menu['prix_par_personne']) ?> €</td>
                        <td style="padding: 15px 10px;"><?= $quantite ?></td>
                        <td style="padding: 15px 10px; text-align: right; font-weight: bold; color: #333;">
                            <?= number_format($sous_total, 2) ?> €
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div style="text-align: right; margin-top: 30px; font-size: 1.3em;">
            <strong>Total de la commande : <span style="color: #b8860b;"><?= number_format($total, 2) ?> €</span></strong>
        </div>
        
        <div style="text-align: right; margin-top: 20px;">
           <a href="/public/index.php?page=checkout" style="padding: 12px 25px; background-color: #d4af37; color: white; text-decoration: none; border-radius: 5px; font-size: 1.1em; font-weight: bold;">Valider et Payer</a>
        </div>
    <?php endif; ?>
</div>