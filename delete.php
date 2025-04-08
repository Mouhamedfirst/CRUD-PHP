<?php
require 'config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM contacts WHERE id = :id");
    $stmt->execute([':id' => $_GET['id']]);
}

header("Location: index.php");
exit;
?>