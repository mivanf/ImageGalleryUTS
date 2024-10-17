<?php
    include 'db.php';
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Gallery</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Image Gallery</h2>
        <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
        <a href="logout.php" class="btn-logout">Logout</a><br><br>
        <a href="add.php" class="btn-tambah">Add New Image (+)</a>
        <div class="gallery">
            <?php
                $query = "SELECT * FROM data";
                $result = mysqli_query($db, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='gallery-item'>";
                    
                    if (!empty($row['gambar'])) {
                        echo "<a href='detail.php?id=" . $row['id'] . "'>";
                        echo "<img src='uploads/" . $row['gambar'] . "' alt='" . $row['judul'] . "' class='gallery-image'>";
                        echo "</a>";
                    } else {
                        echo "<p>Gambar belum diupload</p>";
                    }

                    echo "<div class='gallery-info'>";
                        echo "<h3>" . $row['judul'] . "</h3>";
                        echo "<div class='btn-group'>";
                            echo "<a href='detail.php?id=" . $row['id'] . "' class='btn-detail'>‎ See Details‎ </a>";
                            echo "<a href='edit.php?id=" . $row['id'] . "' class='btn-edit'>‎ Edit‎ </a>";
                            echo "<a href='delete.php?id=" . $row['id'] . "' class='btn-delete'>‎ Delete‎ </a>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</body>
</html>