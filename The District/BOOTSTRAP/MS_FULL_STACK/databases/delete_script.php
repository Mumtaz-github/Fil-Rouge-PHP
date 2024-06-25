<?php
require_once 'functions.php'; // Include your functions file

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the disc ID from the form
    $disc_id = $_POST['disc_id'];

    // Delete the disc record from the database
    $result = deleteDisc($disc_id);

    // Redirect to the list page
    if ($result) {
        header('Location: index.php');
        exit;
    } else {
        echo "Erreur lors de la suppression du disque.";
    }
} else {
    echo "Accès non autorisé.";
}
?>