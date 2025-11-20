# todolist2
# Todo List PHP + MySQL

**Projet:** Application de gestion de tâches (To-Do List) avec PHP, MySQL et Bootstrap.

## 🚀 Fonctionnalités

* Ajouter une nouvelle tâche
* Supprimer une tâche
* Marquer une tâche comme terminée (done)
* Interface responsive avec Bootstrap
* Base de données MySQL sécurisée (PDO + prepared statements)

## 🛠 Installation

1. Cloner le dépôt :

```bash
git clone https://github.com/ismailjarchify2-droid/todolist2.git
```

2. Importer la base de données MySQL (`todolist2.sql`) via phpMyAdmin ou MySQL :

```sql
CREATE TABLE todo (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    done TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

3. Configurer le fichier `database.php` avec vos infos de connexion :

```php
<?php
$host = 'localhost';
$db   = 'todolist2';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $pass);
?>
```

4. Lancer le projet dans XAMPP / WAMP :
   `http://localhost/todolist2/`

## 📁 Structure du projet

```
todolist2/
├── index.php        # Page principale (affichage tasks + formulaire)
├── todo_actions.php # Ajout / suppression des tâches
├── database.php     # Connexion à la DB
├── css/             # Fichiers CSS (Bootstrap inclus)
└── README.md        # Ce fichier
```

## ⚡ Technologies utilisées

* PHP 8.x
* MySQL / MariaDB
* Bootstrap 5
* PDO pour la connexion sécurisée à la base de données

## 💡 Notes

* Toujours laisser la colonne `id` en **AUTO_INCREMENT** pour éviter les erreurs de clé primaire.
* Utiliser `prepare` + `execute` pour sécuriser les inputs et éviter les injections SQL.
* Faire un `git pull` avant de pusher pour éviter les conflits si plusieurs personnes travaillent sur le projet.
