
<?php
require_once 'functions.php'; // Include your functions file

// Check if a disc ID is provided
if (isset($_GET['disc_id'])) {
    $disc_id = $_GET['disc_id'];

    // Fetch details of the selected disc
    $disc = getDiscById($disc_id);

    if ($disc) {
        // Fetch all artists from the "artist" table
        $artists = getArtists();

        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Modifier un vinyle</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <h1>Modifier un vinyle</h1>
            <form method="post" action="update_script.php" enctype="multipart/form-data">
                <input type="hidden" name="disc_id" value="<?php echo $disc['disc_id']; ?>">
                <label for="title">Titre:</label>
                <input type="text" id="title" name="title" value="<?php echo $disc['title']; ?>" required>
                <label for="artist">Artiste:</label>
                <select id="artist" name="artist" required>
                    <?php foreach ($artists as $artist): ?>
                        <option value="<?php echo $artist['artist_id']; ?>" <?php if ($artist['artist_id'] == $disc['artist_id']) echo 'selected'; ?>><?php echo $artist['name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="year">Année:</label>
                <input type="number" id="year" name="year" value="<?php echo $disc['year']; ?>" required>
                <label for="genre">Genre:</label>
                <input type="text" id="genre" name="genre" value="<?php echo $disc['genre']; ?>" required>
                <label for="label">Label:</label>
                <input type="text" id="label" name="label" value="<?php echo $disc['label']; ?>" required>
                <label for="price">Prix:</label>
                <input type="number" id="price" name="price" value="<?php echo $disc['price']; ?>" required>
                <label for="picture">Image:</label>
                <input type="file" id="picture" name="picture">
                <button type="submit">Modifier</button>
            </form>
            <a href="details.php?disc_id=<?php echo $disc['disc_id']; ?>">Retour</a>
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