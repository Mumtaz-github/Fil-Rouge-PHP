<?php
require_once 'fonctions.php'; // Include your functions file

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from the form
    $stock = $conn->prepare("SELECT * FROM artist WHERE artist_name = :artist;");
    $stock->bind_param(':artist', $_POST['artist']);
    $stock->execute();

    $artist_id = $stock->fetch()['artist_id'];

    $title = $_POST['title'];
    $artist_id = $artist_id;
    $year = $_POST['year'];
    $genre = $_POST['genre'];
    $label = $_POST['label'];
    $price = $_POST['price'];

    // Upload the picture file
    $picture = uploadPicture($_FILES['picture']);

    // Insert the new disc record into the database
    $result = addDisc($title, $artist_id, $year, $genre, $label, $price, $picture);

    // Redirect to the list page
    if ($result) {
        header('Location:index.php');
        exit;
    } else {
        echo "Erreur lors de l'ajout du disque.";
    }
} else {
    echo "Accès non autorisé.";
}
?>