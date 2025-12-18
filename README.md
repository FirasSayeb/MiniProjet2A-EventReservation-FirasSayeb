# MiniEvent – Application de réservation d’événements

## I. Description du projet

**MiniEvent** est une application web développée en PHP permettant la **gestion et la réservation d’événements**.
Elle offre :
- une interface **utilisateur** pour consulter les événements disponibles et effectuer des réservations,
- une interface **administrateur** pour gérer les événements et consulter les réservations.

Le projet suit une architecture simple de type **MVC (Model – View – Controller)** et utilise une base de données MySQL pour la persistance des données.

---

## II. Technologies utilisées

- **Langage backend** : PHP (programmation orientée objet)
- **Base de données** : MySQL (via PDO)
- **Frontend** :
  - HTML5
  - CSS3
  - JavaScript (basique)
- **Serveur local** : XAMPP / Apache
- **Gestion de version** : Git & GitHub

---

## III. Consignes d’installation

### 1. Prérequis

- XAMPP ou WAMP installé
- PHP ≥ 8
- MySQL
- Navigateur web
- Git (optionnel)

### 2. Étapes d’installation

1. Cloner le projet ou le télécharger :
```bash
git clone https://github.com/FirasSayeb/MiniProjet2A-EventReservation-FirasSayeb.git
```

2. Copier le dossier **MiniEvent** dans :
```
C:/xampp/htdocs/
```

3. Démarrer **Apache** et **MySQL** depuis XAMPP

4. Créer la base de données :
```sql
CREATE DATABASE minievent;
```

5. Créer les tables (voir section Base de données)

6. Configurer la connexion à la base dans :
```
/config/database.php
```

7. Accéder à l’application :
```
http://localhost/MiniEvent/public
```

---

## IV. Identité des membres de l’équipe

- **Firas Sayeb**

---

## V. Architecture du projet

```
/MiniEvent/
│
├── /app/
│   ├── /controllers/          # Contrôleurs (logique applicative)
│   │   ├── AdminController.php
│   │   └── EventController.php
│   │
│   ├── /models/               # Classes métier
│   │   ├── Admin.php
│   │   ├── Event.php
│   │   └── Reservation.php
│   │
│   └── /views/                # Vues (HTML + PHP)
│       ├── /admin/            # Espace administrateur
│       │   ├── add.php
│       │   ├── dashboard.php
│       │   ├── details.php
│       │   ├── login.php
│       │   ├── reservations.php
│       │   └── update.php
│       │
│       ├── /events/           # Espace utilisateur
│       │   ├── index.php
│       │   ├── details.php
│       │   ├── reserve.php
│       │   └── reussite.php
│       │
│       ├── /partials/         # Parties communes
│       │   ├── header.php
│       │   └── AdminNavBar.php
│       │   └── footer.php
│       │
│       └── 404.php            # Page erreur 404
│
├── /config/
│   ├── database.php           # Connexion PDO à MySQL
│   ├── routes.php             # Gestion des routes
│   └── minievent.sql          # Script SQL de la base de données
│
├── /public/
│   ├── /css/                  # Feuilles de style
│   │   ├── style.css
│   │   ├── details.css
│   │   ├── partials.css
│   │   ├── reserve.css
│   │   └── reussite.css
│   │
│   ├── /images/               # Images du projet
│   ├── /js/                   # Scripts JavaScript
│   ├── .htaccess              # Réécriture des URLs
│   └── index.php              # Point d’entrée principal (routeur)
```



---

## VI. Base de données

### Table `events`
```sql
id INT PRIMARY KEY AUTO_INCREMENT,
title VARCHAR(255),
description TEXT,
date DATE,
location VARCHAR(255),
seats INT,
image VARCHAR(255)
```

### Table `reservations`
```sql
id INT PRIMARY KEY AUTO_INCREMENT,
event_id INT,
name VARCHAR(255),
email VARCHAR(255),
phone VARCHAR(20),
created_at DATETIME
```

### Table `admin`
```sql
id INT PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(100),
password_hash VARCHAR(255)
```

---

## VII. Fonctionnalités réalisées

### Côté utilisateur
- Affichage de la liste des événements depuis la base de données
- Consultation du détail d’un événement (description, date, lieu, image)
- Formulaire de réservation (nom, email, téléphone)
- Enregistrement des réservations en base de données
- Message de confirmation après réservation

### Côté administrateur
- Authentification sécurisée (login / mot de passe)
- Tableau de bord listant les événements
- CRUD complet sur les événements :
  - Créer
  - Lire
  - Mettre à jour
  - Supprimer
- Consultation des réservations par événement
- Déconnexion sécurisée

---

## VIII. Intégration GitHub

### Organisation du dépôt

Nom du dépôt GitHub (public) :
```
MiniProjet2A-EventReservation-FirasSayeb
```

### Branches utilisées
- **main** : version stable et fonctionnelle
- **dev** : intégration et tests
- **feature*** : développement de fonctionnalités spécifiques

### Collaboration
- L’enseignant est invité en tant que **collaborateur** du dépôt GitHub
  
---

## IX. Auteur

Développé par **Firas Sayeb** © 2025

