<?php
require_once 'functions.php'; // Include your functions file

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from the form
    $disc_id = $_POST['disc_id'];
    $title = $_POST['title'];
    $artist_id = $_POST['artist'];
    $year = $_POST['year'];
    $genre = $_POST['genre'];
    $label = $_POST['label'];
    $price = $_POST['price'];

    // Upload the picture file (if a new picture is provided)
    if (isset($_FILES['picture']) && $_FILES['picture']['size'] > 0) {
        $picture = uploadPicture($_FILES['picture']);
        // Update the picture path in the database
        updateDiscPicture($disc_id, $picture);
    } else {
        // No new picture uploaded, keep the existing one
        $picture = $_POST['old_picture']; // You'll need to include the previous picture path in the form
    }

    // Update the disc record in the database
    $result = updateDisc($disc_id, $title, $artist_id, $year, $genre, $label, $price, $picture);

    // Redirect to the details page
    if ($result) {
        header('Location: details.php?disc_id=' . $disc_id);
        exit;
    } else {
        echo "Erreur lors de la modification du disque.";
    }
} else {
    echo "Accès non autorisé.";
}
?>