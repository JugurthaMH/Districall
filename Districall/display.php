<?php
    // Connexion à la base de données
    $host = 'localhost';
    $dbname = 'districall';
    $username = 'root'; 
    $password = ''; 

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Nombre de tâches par page
        $tasksPerPage = 10;

        // Récupérer le numéro de la page actuelle, s'il est défini dans l'URL (par défaut à 1)
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // Calculer l'offset (la ligne de départ pour la requête)
        $offset = ($page - 1) * $tasksPerPage;

        // Récupérer les tâches depuis la base de données avec LIMIT et OFFSET
        $stmt = $pdo->prepare("SELECT * FROM tache LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':limit', $tasksPerPage, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Compter le nombre total de tâches pour la pagination
        $stmt = $pdo->query("SELECT COUNT(*) FROM tache");
        $totalTasks = $stmt->fetchColumn();
        $totalPages = ceil($totalTasks / $tasksPerPage);

    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/display.css?v=<?php echo time();?>"/>
    <title>Afficher les Tâches</title>
</head>
<body>

<div class="container">
    <h2>Liste des Tâches</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Status</th>
                <th>Date de Création</th>
                <th>Date de Mise à Jour</th>
                <th>Action</th> <!-- Ajouter une colonne pour l'action -->
            </tr>
        </thead>
        <tbody>
            <?php if (count($tasks) > 0): ?>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($task['id']); ?></td>
                        <td><?php echo htmlspecialchars($task['title']); ?></td>
                        <td><?php echo htmlspecialchars($task['description']); ?></td>
                        <td><?php echo htmlspecialchars($task['status']); ?></td>
                        <td><?php echo htmlspecialchars($task['created_at']); ?></td>
                        <td><?php echo htmlspecialchars($task['updated_at']); ?></td>
                        <td>
                            <!-- Formulaire de suppression -->
                            <form action="api.php" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?');">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($task['id']); ?>">
                                <button type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Aucune tâche trouvée.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    
    <!-- Liens de pagination -->
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo $page - 1; ?>">Précédent</a>
        <?php else: ?>
            <a href="#" class="disabled">Précédent</a>
        <?php endif; ?>

        <span>Page <?php echo $page; ?> sur <?php echo $totalPages; ?></span>

        <?php if ($page < $totalPages): ?>
            <a href="?page=<?php echo $page + 1; ?>">Suivant</a>
        <?php else: ?>
            <a href="#" class="disabled">Suivant</a>
        <?php endif; ?>
    </div>

    <!-- Bouton pour revenir à la page d'ajout de tâche -->
    <button class="redirect-button" onclick="window.location.href='HomeController.php'">Ajouter une Tâche</button>
</div>
</body>
</html>