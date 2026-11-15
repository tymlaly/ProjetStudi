<?php
require_once __DIR__ . '/../config/db.php';

$sql = "SELECT c.numero_commande, c.date_commande, c.date_livraison, c.prix_total, c.statut, 
               u.nom, u.prenom, m.titre AS nom_menu
        FROM commande c
        JOIN utilisateur u ON c.utilisateur_id = u.id
        JOIN menu m ON c.menu_id = m.id
        ORDER BY c.date_livraison ASC";
        
$stmt = $pdo->query($sql);
$commandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div style="padding: 20px; max-width: 1000px; margin: 40px auto; min-height: 50vh;">
    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #d4af37; padding-bottom: 10px; margin-bottom: 20px;">
        <h1 style="color: #b8860b; margin: 0;">Suivi des Commandes</h1>
        <a href="/public/index.php?page=admin" style="padding: 8px 15px; background-color: #eee; color: #333; text-decoration: none; border-radius: 4px; font-weight: bold;">Retour</a>
    </div>

    <?php if (empty($commandes)): ?>
        <p style="text-align: center; font-size: 1.2em; color: #666;">Aucune commande pour le moment.</p>
    <?php else: ?>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
            <thead>
                <tr style="background-color: #333; color: white; text-align: left;">
                    <th style="padding: 12px; border-radius: 5px 0 0 0;">N° Commande</th>
                    <th style="padding: 12px;">Client</th>
                    <th style="padding: 12px;">Menu</th>
                    <th style="padding: 12px;">Date Livraison</th>
                    <th style="padding: 12px;">Total</th>
                    <th style="padding: 12px; border-radius: 0 5px 0 0;">Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commandes as $cmd): ?>
                    <tr style="border-bottom: 1px solid #ddd; background-color: #fff;">
                        <td style="padding: 12px; font-weight: bold;"><?= htmlspecialchars($cmd['numero_commande']) ?></td>
                        <td style="padding: 12px;"><?= htmlspecialchars($cmd['prenom'] . ' ' . $cmd['nom']) ?></td>
                        <td style="padding: 12px;"><?= htmlspecialchars($cmd['nom_menu']) ?></td>
                        <td style="padding: 12px; color: #b8860b; font-weight: bold;">
                            <?= date('d/m/Y', strtotime($cmd['date_livraison'])) ?>
                        </td>
                        <td style="padding: 12px;"><?= number_format($cmd['prix_total'], 2) ?> €</td>
                        <td style="padding: 12px;">
                            <span style="background-color: #ffeeba; color: #856404; padding: 5px 10px; border-radius: 15px; font-size: 0.9em; font-weight: bold;">
                                <?= htmlspecialchars($cmd['statut']) ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>