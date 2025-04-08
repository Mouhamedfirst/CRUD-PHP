<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Contacts</h1>
    <a href="create.php">Ajouter un contact</a>
    <br>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>

        <?php
        $stmt = $pdo->query("SELECT * FROM contacts ORDER BY id DESC");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
        ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['nom']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td>
                    <a href="update.php?id=<?= $row['id'] ?>">Modifier</a> |
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Supprimer ce contact ?')">Supprimer</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>