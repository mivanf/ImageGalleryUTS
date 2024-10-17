<?php
    include 'db.php';

    if (isset($_POST['submit'])) {
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $nama_uploader = $_POST['nama_uploader'];
        $email_uploader = $_POST['email_uploader'];
        $tanggal_upload = $_POST['tanggal_upload'];
        $gambar = '';

        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['gambar']['tmp_name'];
            $fileName = $_FILES['gambar']['name'];
            $destination = 'uploads/' . $fileName;

            if (move_uploaded_file($fileTmpPath, $destination)) {
                $gambar = $fileName;
            }
        }

        $query = "INSERT INTO data (judul, deskripsi, nama_uploader, email_uploader, tanggal_upload, gambar) VALUES ('$judul', '$deskripsi', '$nama_uploader', '$email_uploader', '$tanggal_upload', '$gambar')";
        if (mysqli_query($db, $query)) {
            header("Location: index.php");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($db);
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Form</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Add New Image</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label>Title:</label>
            <input type="text" name="judul" required><br>
            <label>Description:</label>
            <input type="text" name="deskripsi" required><br>
            <label>Uploader Name:</label>
            <input type="text" name="nama_uploader" required><br>
            <label>Uploader Email:</label>
            <input type="email" name="email_uploader" required><br>
            <label>Upload Date:</label>
            <input type="date" name="tanggal_upload" required><br>
            <label>Image:</label>
            <input type="file" name="gambar"><br>
            <input type="submit" name="submit" value="Save">
            <a href="home.php" class="btn-detail">Back to Home</a>
        </form>
    </div>
</body>
</html>