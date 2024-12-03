<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/HomeController.css?v=<?php echo time();?>"/>
    <title>Home</title>
</head>
<body>
    <div class="form-container">
        <header>
            <h2>Ajouter une tâche</h2>
        </header>
        <form action="api.php" method="POST">
            <!-- Champ caché pour l'action -->
            <input type="hidden" name="action" value="create_task">
            
            <!-- Champ pour le titre de la tâche -->
            <div>
                <label for="title">Titre de la tâche</label>
                <input type="text" name="title" id="title" required>
            </div>

            <!-- Champ pour la description de la tâche -->
            <div>
                <label for="description">Description de la tâche</label>
                <textarea name="description" id="description" required></textarea>
            </div>
            
            <!-- Bouton d'envoi -->
            <div>
                <input type="submit" name="submit_task" value="Ajouter la tâche">
            </div>
        </form>
        <!-- Bouton pour rediriger vers la page d'affichage des tâches -->
        <div>
            <button class="redirect-button" onclick="window.location.href='display.php'">Afficher les tâches</button>
        </div>
    </div>
</body>
</html>
