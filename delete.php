<?php
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    $filePath = __DIR__ . "/uploads/" . basename($file); // pakai path absolut

    if (file_exists($filePath)) {
        unlink($filePath);
        echo "<script>
                alert('File berhasil dihapus!');
                window.location.href='index.php';
              </script>";
    } else {
        echo "<script>
                alert('File tidak ditemukan: $filePath');
                window.location.href='index.php';
              </script>";
    }
} else {
    header("Location: index.php");
}
