<?php
require_once 'database.php';

// Traitement des actions
if (!empty($_POST['action'])) {

    // Ajouter une tâche
    if ($_POST['action'] === "new") {
        if (!empty($_POST['title'])) {
            $stmt = $pdo->prepare("INSERT INTO todo(title) VALUES(?)");
            $stmt->execute([$_POST['title']]);
        }
    }

    // Supprimer une tâche
    if ($_POST['action'] === "delete") {
        if (!empty($_POST['id'])) {
            $stmt = $pdo->prepare("DELETE FROM todo WHERE id = ?");
            $stmt->execute([$_POST['id']]);
        }
    }

    // Toggle (done = 1 - done)
    if ($_POST['action'] === "toggle") {
        if (!empty($_POST['id'])) {
            $stmt = $pdo->prepare("UPDATE todo SET done = 1 - done WHERE id = ?");
            $stmt->execute([$_POST['id']]);
        }
    }

    // Redirection vers page principale
    header("Location: index.php");
    exit;
}

// Charger les tâches
$stmt = $pdo->query("SELECT * FROM todo ORDER BY created_at DESC");
$taches = $stmt->fetchAll(PDO::FETCH_ASSOC);
