INSERT INTO role (libelle) VALUES 
('Administrateur'), 
('Employe'), 
('Utilisateur');

INSERT INTO theme (libelle) VALUES 
('Noel'), 
('Pâques'), 
('Classique'), 
('Evènement');

INSERT INTO allergene (libelle) VALUES 
('Gluten'), 
('Arachides'), 
('Lactose'), 
('Fruits à coque');

INSERT INTO horaire (heure_ouverture, heure_fermeture) VALUES 
('08:00', '18:00'), -- Lundi
('08:00', '18:00'), -- Mardi
('08:00', '18:00'), -- Mercredi
('08:00', '18:00'), -- Jeudi
('08:00', '18:00'), -- Vendredi
('09:00', '14:00'), -- Samedi
('Fermé', 'Fermé'); -- Dimanche

INSERT INTO utilisateur (nom, prenom, gsm, email, password, adresse_postale, role_id) VALUES 
('Directrice', 'Julie', '0601020304', 'julie@viteetgourmand.fr', '$2y$10$tZ2E7I7YQoI.jU0dZl0X.eX5o6b/7G2z0zY/7.Wq6r4XU6T8K/8aO', '1 Rue de la Mairie, 33000 Bordeaux', 1),
('Directeur', 'José', '0601020305', 'jose@viteetgourmand.fr', '$2y$10$tZ2E7I7YQoI.jU0dZl0X.eX5o6b/7G2z0zY/7.Wq6r4XU6T8K/8aO', '1 Rue de la Mairie, 33000 Bordeaux', 1),
('Cuisinier', 'Marc', '0611223344', 'marc.employe@viteetgourmand.fr', '$2y$10$tZ2E7I7YQoI.jU0dZl0X.eX5o6b/7G2z0zY/7.Wq6r4XU6T8K/8aO', '10 Avenue de Paris, 33000 Bordeaux', 2),
('Client', 'Jean', '0699887766', 'jean.client@gmail.com', '$2y$10$tZ2E7I7YQoI.jU0dZl0X.eX5o6b/7G2z0zY/7.Wq6r4XU6T8K/8aO', '15 Rue des Fleurs, 33140 Villenave-d-Ornon', 3);

INSERT INTO plat (titre, description) VALUES 
('Foie Gras Maison', 'Tranche de foie gras et son chutney de figues'),
('Dinde rôtie aux marrons', 'Dinde fermière accompagnée de marrons et purée truffée'),
('Bûche au chocolat', 'Bûche traditionnelle au chocolat noir 70%'),
('Salade printanière', 'Mélange de jeunes pousses, tomates cerises et vinaigrette balsamique');

INSERT INTO menu (titre, nombre_personne_minimum, prix_par_personne, regime, description, quantite_restante, theme_id) VALUES 
('Menu Prestige de Noel', 10, 45.50, 'Classique', 'Le menu parfait pour vos fêtes de fin d\'année en famille, à commander 1 semaine à l\'avance.', 15, 1),
('Menu Fraîcheur', 5, 25.00, 'Végétarien', 'Un repas léger et frais idéal pour le midi.', 30, 3);

INSERT INTO contient (plat_id, allergene_id) VALUES 
(1, 1), -- Foie Gras contient du Gluten (toast)
(3, 3); -- Bûche au chocolat contient du Lactose

INSERT INTO compose (menu_id, plat_id) VALUES 
(1, 1),
(1, 2),
(1, 3),
(2, 4);

INSERT INTO commande (numero_commande, date_commande, date_livraison, heure_livraison, prix_livraison, nombre_personne, prix_total, statut, pret_materiel, restitution_materiel, utilisateur_id, menu_id) VALUES 
('CMD-202611-001', '2026-11-11', '2026-12-24', '19:00', 5.00, 10, 460.00, 'accepté', 0, 0, 4, 1);