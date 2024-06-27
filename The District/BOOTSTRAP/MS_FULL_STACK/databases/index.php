<?php
require_once 'fonctions.php'; // Include your functions file

$db_host = "localhost";
$db_user = "admin";
$db_password = "Afpa1234";
$db_name = "record";

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
    <form action="details.php" method="GET">
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
                    <td><?php echo $disc['disc_title']; ?></td>
                    <td><?php echo $disc['disc_artist']; ?></td>
                    <td><?php echo $disc['disc_year']; ?></td>
                    <td><?php echo $disc['disc_genre']; ?></td>
                    <td><?php echo $disc['disc_label']; ?></td>
                    <td>
                        <button type='submit' name="id" value="<?php echo $disc['disc_id']; ?>" >Détails</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </form>
    <a href="add_form.php">Ajouter un disque</a>
</body>
</html>