<?php
    include 'db.php';

    $id = $_GET['id'];
    $query = "DELETE FROM data WHERE id = $id";

    if (mysqli_query($db, $query)) {
        echo "Data berhasil dihapus.";
        header("Location: index.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($db);
    }
?>