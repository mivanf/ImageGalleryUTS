<?php
    include 'db.php';
    session_start();

    $id = $_GET['id'];
    $query = "SELECT * FROM data WHERE id = $id";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Details</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h4>Image Details</h4>
        <h2><?php echo "<b>" . $row['judul'] . "</b>"; ?></h2>
        <?php if (!empty($row['gambar'])): ?>
            <img src="uploads/<?php echo $row['gambar']; ?>" alt="Gambar" class="img-detail">
        <?php else: ?>
            <p>Gambar belum diupload</p>
        <?php endif; ?>
        <br>
        <p><b>Title:</b> <?php echo "<b>" . $row['judul'] . "</b>"; ?></p>
        <p>Description: <?php echo $row['deskripsi']; ?></p>
        <p>Uploader Name: <?php echo $row['nama_uploader']; ?></p>
        <p>Uploader Email: <?php echo $row['email_uploader']; ?></p>
        <p>Upload Date: <?php echo date('d-m-Y', strtotime($row['tanggal_upload'])); ?></p>
        <br>
        <a href="home.php" class="back">Back to Home</a>
        <?php
            echo "| ";
            echo "<a href='edit.php?id=" . $row['id'] . "' class='btn-edit'>Edit</a>";
            echo " ";
            echo "<a href='delete.php?id=" . $row['id'] . "' class='btn-delete'>Delete</a>";
        ?>
    </div>
</body>
</html>