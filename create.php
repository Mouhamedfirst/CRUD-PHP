<?php require 'config.php'; ?>

<?php
$erreur = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);

    if (empty($nom) || empty($email)) {
        $erreur = "Tous les champs sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreur = "Email invalide.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO contacts (nom, email) VALUES (:nom, :email)");
        $stmt->execute([
            ':nom' => $nom,
            ':email' => $email
        ]);
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un contact</title>
</head>

<body>
    <h1>Ajouter un nouveau contact</h1>
    <?php if ($erreur): ?>
        <p style="color:red;"><?= $erreur ?></p>
    <?php endif; ?>
    <form method="post">
        <label>Nom :</label><br>
        <input type="text" name="nom"><br><br>
        <label>Email :</label><br>
        <input type="text" name="email"><br><br>
        <button type="submit">Ajouter</button>
    </form>
    <br>
    <a href="index.php">Retour à la liste</a>
</body>

</html>