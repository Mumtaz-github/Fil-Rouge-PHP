<?php

// Database connection details
$db_host = "localhost";
$db_user = "admin";
$db_password = "Afpa1234";
$db_name = "record";

// Connect to the database

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Error handling for database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to fetch all discs from the "disc" table
function getDiscs() {
    global $conn;
    $sql = "SELECT * FROM disc";
    $result = mysqli_query($conn, $sql);
    $discs = array();
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $discs[] = $row;
        }
    }
    return $discs;
}

// Function to fetch details of a disc by its ID
function getDiscById($disc_id) {
    global $conn;
    $sql = "SELECT * FROM disc WHERE disc_id = '$disc_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return false;
}

// Function to fetch all artists from the "artist" table
function getArtists() {
    global $conn;
    $sql = "SELECT * FROM artist";
    $result = mysqli_query($conn, $sql);
    $artists = array();
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $artists[] = $row;
        }
    }
    return $artists;
}

// Function to add a new disc record to the database
// function addDisc($title, $artist_id, $year, $genre, $label, $price, $picture) {
//     global $conn;
//     $sql = $conn->prepare("INSERT INTO disc (disc_title, artist_id, disc_year, disc_genre, disc_label, disc_price, disc_picture) VALUES ('$title', '$artist_id', '$year', '$genre', '$label', '$price', '$picture')");
//     $sql->execute();

//     if (mysqli_query($conn, $sql)) {
//         return true;
//     } else {
//         return false;
//     }
// }

// Function to update a disc record in the database
function updateDisc($disc_id, $title, $artist_id, $year, $genre, $label, $price, $picture) {
    global $conn;
    $sql = "UPDATE disc SET title = '$title', artist_id = '$artist_id', year = '$year', genre = '$genre', label = '$label', price = '$price', picture = '$picture' WHERE disc_id = '$disc_id'";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Function to update the picture path for a disc in the database
// function updateDiscPicture($disc_id, $picture) {
//     global $conn;
//     $sql = "UPDATE disc SET picture = '$picture' WHERE disc_id = '$disc_id'";
//     if (mysqli_query($conn, $sql)) {
//         return true;
//     } else {
//         return false;
//     }
// }

// Function to delete a disc record from the database
function deleteDisc($disc_id) {
    global $conn;
    $sql = "DELETE FROM disc WHERE disc_id = '$disc_id'";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Function to upload a picture file
// function uploadPicture($file) {
//     $target_dir = "pictures/";
//     $target_file = $target_dir . basename($file["name"]);
//     $uploadOk = 1;

//     // Check if image file is a actual image or fake image
//     if ($uploadOk == 1) {
//         if (move_uploaded_file($file["tmp_name"], $target_file)) {
//             echo "File is complete.";
//         } else {
//             echo "File is not complete.";
//         }
//     }
// }

        ?>