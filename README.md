# RetroMonsters

RetroMonsters est une application web permettant de gérer une liste de monstres imaginaires, développée en PHP procédural (MVC) et MySQL. L’application propose une page d’accueil dynamique, une liste de monstres, des pages de détails, et un design moderne et responsive.

## Fonctionnalités

- **Page d’accueil dynamique** : Affiche un monstre aléatoire et les 3 derniers monstres ajoutés.
- **Page des monstres** : Affiche les 9 monstres les plus récents avec pagination.
- **Détail d’un monstre** : Cliquez sur un monstre pour voir toutes ses informations (nom, type, PV, attaque, défense, description, etc.).
- **Barre latérale droite** : Affiche toujours les menus déroulants dynamiques pour filtrer et rechercher les monstres.
- **Recherche & Filtres** : Recherche plein texte et filtres multicritères (type, rareté, PV, attaque).
- **Cartes colorées par type** : Les cartes de monstres sont colorées selon leur type sur toutes les vues.
- **Design responsive** : Utilisation de Tailwind CSS pour un rendu moderne sur tous les appareils.
- **Pas de comptes utilisateurs, commentaires ou notations** : Conforme au cahier des charges.

## Technologies

- PHP (MVC procédural)
- MySQL
- Tailwind CSS
- FontAwesome
- JavaScript (pour l’ergonomie)

## Installation

1. **Clonez le dépôt** et placez-le dans le dossier racine de votre serveur web (ex : `htdocs` pour XAMPP).
2. **Importez le fichier SQL fourni** dans votre base de données MySQL.
3. **Configurez la connexion à la base** dans `core/connection.php` si besoin.
4. **Accédez à l’application** via `http://localhost/RETRO_MONSTERS_2025/public/`

## Structure du projet

- `public/` — Point d’entrée, images, JS
- `app/controllers/` — Contrôleurs pour les monstres et les pages
- `app/models/` — Modèles pour monstres, types, raretés
- `app/views/` — Vues pour la liste, les détails, la recherche et les filtres
- `app/routers/` — Routage simple
- `core/` — Connexion à la base de données

## Crédits

- Design et assets fournis par l’enseignant.
- Développé dans le cadre d’un mini-projet PHP MVC.

---
Good luck!
