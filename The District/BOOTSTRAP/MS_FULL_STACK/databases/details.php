<?php
require_once('fonctions.php'); // Include your functions file

// Check if a disc ID is provided
if (isset($_GET['disc_id'])) {
    $disc_id = $_GET['disc_id'];

    // Fetch details of the selected disc
    $disc = getDiscById($disc_id);

    if ($disc) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Détails du disque</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <h1>Détails du disque</h1>
            <div>
                <p>Titre : <?php echo $disc['title']; ?></p>
                <p>Artiste : <?php echo $disc['artist']; ?></p>
                <p>Année : <?php echo $disc['year']; ?></p>
                <p>Genre : <?php echo $disc['genre']; ?></p>
                <p>Label : <?php echo $disc['label']; ?></p>
                <p>Prix : <?php echo $disc['price']; ?></p>
                <img src="<?php echo $disc['picture']; ?>" alt="Image du disque">
            </div>
            <a href="update_form.php?disc_id=<?php echo $disc['disc_id']; ?>">Modifier</a>
            <a href="delete_form.php?disc_id=<?php echo $disc['disc_id']; ?>">Supprimer</a>
            <a href="index.php">Retour</a>
        </body>
        </html>
        <?php
    } else {
        echo "Disque non trouvé.";
    }
} else {
    echo "ID du disque manquant.";
}
?>