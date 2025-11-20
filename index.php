<?php
require_once 'todo_actions.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TodoList</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- CSS intégré -->
    <style>
        body {
            background-color: #f3f3f3;
            font-family: Arial, sans-serif;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }
        .list-group-item {
            border-radius: 8px !important;
            margin-bottom: 7px;
            font-size: 1rem;
            padding: 15px;
        }
        .btn {
            border-radius: 8px !important;
        }
        .navbar-brand {
            font-weight: bold;
        }
    </style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand">📝 TodoList - PHP / MySQL</a>
    </div>
</nav>

<div class="container mt-4">

    <!-- FORM AJOUT -->
    <div class="card mb-4">
        <div class="card-header">Ajouter une nouvelle tâche</div>
        <div class="card-body">
            <form method="post" action="todo_actions.php">
                <input type="text" name="title" placeholder="Entrez une tâche..." required
                       class="form-control mb-3">

                <button class="btn btn-primary" type="submit" name="action" value="new">
                    Ajouter
                </button>
            </form>
        </div>
    </div>

    <!-- LISTE DES TÂCHES -->
    <h3>Liste des tâches</h3>

    <ul class="list-group">
        <?php foreach ($taches as $t): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center
            <?= $t['done'] ? 'list-group-item-success' : 'list-group-item-warning' ?>">

                <div>
                    <strong><?= htmlspecialchars($t['title']) ?></strong><br>
                    <small class="text-muted">Ajoutée le : <?= $t['created_at'] ?></small>
                </div>

                <form method="post" action="todo_actions.php" class="d-flex gap-2">
                    <input type="hidden" name="id" value="<?= $t['id'] ?>">

                    <button class="btn btn-sm btn-warning" name="action" value="toggle">
                        <?= $t['done'] ? "Marquer non faite" : "Marquer faite" ?>
                    </button>

                    <button class="btn btn-sm btn-danger" name="action" value="delete"
                            onclick="return confirm('Supprimer ?')">
                        Supprimer
                    </button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

</div>

</body>
</html>