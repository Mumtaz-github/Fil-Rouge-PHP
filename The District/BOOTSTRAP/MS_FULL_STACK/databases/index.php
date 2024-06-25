<?php
require_once 'functions.php'; // Include your functions file

// Fetch all records from the "disc" table
$discs = getDiscs();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des disques</title>
  
    <link rel="stylesheet" href="../databases/style.css">
</head>
<body>
    <h1>Liste des disques</h1>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Artiste</th>
                <th>Année</th>
                <th>Genre</th>
                <th>Label</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($discs as $disc): ?>
                <tr>
                    <td><?php echo $disc['title']; ?></td>
                    <td><?php echo $disc['artist']; ?></td>
                    <td><?php echo $disc['year']; ?></td>
                    <td><?php echo $disc['genre']; ?></td>
                    <td><?php echo $disc['label']; ?></td>
                    <td>
                        <a href="details.php?disc_id=<?php echo $disc['disc_id']; ?>">Détails</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="add_form.php">Ajouter un disque</a>
</body>
</html>