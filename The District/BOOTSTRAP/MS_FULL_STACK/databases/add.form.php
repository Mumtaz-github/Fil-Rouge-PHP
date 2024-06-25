<?php
require_once 'functions.php'; // Include your functions file

// Fetch all artists from the "artist" table
$artists = getArtists();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un vinyle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Ajouter un vinyle</h1>
    <form method="post" action="add_script.php" enctype="multipart/form-data">
        <label for="title">Titre:</label>
        <input type="text" id="title" name="title" required>
        <label for="artist">Artiste:</label>
        <select id="artist" name="artist" required>
            <?php foreach ($artists as $artist): ?>
                <option value="<?php echo $artist['artist_id']; ?>"><?php echo $artist['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="year">Année:</label>
        <input type="number" id="year" name="year" required>
        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" required>
        <label for="label">Label:</label>
        <input type="text" id="label" name="label" required>
        <label for="price">Prix:</label>
        <input type="number" id="price" name="price" required>
        <label for="picture">Image:</label>
        <input type="file" id="picture" name="picture">
        <button type="submit">Ajouter</button>
    </form>
    <a href="index.php">Retour</a>
</body>
</html>