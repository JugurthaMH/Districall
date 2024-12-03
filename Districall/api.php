<?php
// Détails de la connexion à la base de données
$host = 'localhost';
$dbname = 'districall';
$username = 'root'; // Nom d'utilisateur MySQL
$password = ''; // Mot de passe MySQL

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification si le formulaire a été soumis
    if (isset($_POST['submit_task'])) {
        // Récupération et sécurisation des données du formulaire
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $status = "En cours";  // Vous pouvez définir un statut par défaut ou le récupérer d'une manière spécifique

        // Date de création et de mise à jour
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');

        // Préparation de la requête d'insertion
        $query = "INSERT INTO tache (title, description, status, created_at, updated_at) VALUES (:title, :description, :status, :created_at, :updated_at)";
        $stmt = $pdo->prepare($query);

        // Exécution de la requête avec les données du formulaire
        $stmt->execute([
            ':title' => $title,
            ':description' => $description,
            ':status' => $status,
            ':created_at' => $created_at,
            ':updated_at' => $updated_at
        ]);

        header("Location: display.php");
    }
    
    if(isset($_POST['id'])) { // Vérifier si l'ID est passé via POST
        $id = (int)$_POST['id'];
        // Préparer la requête SQL pour supprimer la tâche
        $stmt = $pdo->prepare("DELETE FROM tache WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Redirige vers la page d'affichage des tâches après suppression
        header("Location: display.php");
    }
    
}

catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>