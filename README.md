# Gestionnaire de Contenu de FUT Champions Ultimate Team

## 📝 Description du projet

Ce projet a pour objectif de développer la partie backend d'une plateforme dédiée à la gestion des données de *FUT Champions Ultimate Team*. Le système permet la gestion dynamique des joueurs, des équipes, des nationalités et d'autres entités liées au jeu. L'application est développée en PHP procédural avec MySQLi et propose des fonctionnalités avancées comme la gestion des utilisateurs, des statistiques interactives, et une interface multilingue via l’internationalisation (i18n).

Le but est de fournir un gestionnaire de contenu robuste et performant pour les administrateurs de la plateforme, tout en assurant une expérience utilisateur fluide et sécurisée.

### 💡 Contexte
Le projet vise à optimiser la gestion de contenu du jeu en utilisant les meilleures pratiques en termes de structure de base de données et de code. Le projet inclut également une fonctionnalité d’internationalisation pour permettre une interface multilingue.

## ⚙️ Fonctionnalités

### 1. Analyse et Optimisation des Données
- **Analyse approfondie** du fichier JSON fourni pour concevoir une structure de base de données optimale.
- Application des **principes de normalisation** des bases de données.
- Création de schémas relationnels pour gérer les entités comme les joueurs, les équipes, et les nationalités.

### 2. Gestion des Entités
- Interface pour **ajouter, modifier, supprimer et lister** des joueurs, des équipes, des nationalités, et autres entités.
- Gestion des relations entre les entités (ex. : associer un joueur à une équipe et à une nationalité).

### 3. Tableau de Bord et Statistiques
- **Tableau de bord dynamique** pour visualiser les statistiques clés : nombre de joueurs, répartition par nationalité, performances des équipes, etc.
- **Intégration de graphiques interactifs** via des bibliothèques comme Chart.js.

### 4. Internationalisation (i18n)
- Système de **support multilingue** permettant aux utilisateurs de changer la langue de l'interface.
- Fichiers de langue séparés (ex. : `fr.php`, `en.php`, `es.php`).
- Option de changement de langue dans le tableau de bord.

### 5. Bonus : 
- **AJAX** pour des actions sans rechargement de page, comme le chargement dynamique des données dans les tableaux.
- **Modals** pour offrir une expérience utilisateur fluide, par exemple pour les formulaires de gestion (ajout, modification des entités).
- **Graphiques interactifs** dans le tableau de bord pour une meilleure visualisation des statistiques clés.

### 6. Documentation et Bonnes Pratiques
- **Documentation claire** des scripts PHP.
- Commentaires inline expliquant la logique du code.
- Fichiers README détaillant les instructions de configuration et d’utilisation.

## 🧑‍💻 Auteurs
- **Auteur** : Mouad Hallaffou  
- **GitHub** : [github.com/MouadHallaffou](https://github.com/MouadHallaffou)

## 📂 Structure du projet

FUT-Champions-Content-Manager/ 
│ README.md 
# Documentation du projet 
│ index.php 
# Page principale (Interface utilisateur - Client) 
│ ├── assets/ 
# Contient tous les fichiers statiques (CSS, JS, images) 
│ ├── css/
│ │ └── style.css 
# Styles CSS pour l'interface utilisateur et admin 
│ │ │ ├── js/
│ │ └── script.js 
# Scripts JavaScript pour l'interactivité 
│ │ │ └── images/
│ └── logo.webp 
# Logo ou autres images 
│ ├── database/
│ └── connection.php 
# Fichier de connexion à la base de données 
│ ├── includes/
│ ├── dashboard.php 
# Interface Admin : tableau de bord pour gérer les joueurs 
│ └── header.php 
# En-tête commun pour les pages  
│ ├── SQL/
│ └── schema.sql 
# Script SQL pour créer la base de données et les tables 
│ └── views/ 
# Séparation des vues pour plus de clarté 
    ├── admin.php 
# Interface Admin principale 
    └── client.php 
# Interface Client (affichage des joueurs en 4-3-3)

## 🛠️ Installation

### Prérequis
- Serveur avec PHP 8.1.10
- Serveur MySQL 
- Un éditeur de texte (ex. : VSCode, Sublime Text)

### Étapes d'installation
1. Clonez ce repository :
   ```bash
   git clone https://github.com/MouadHallaffou/FUT-Champions-Content-Manager.git
