<?php
// Tentukan folder tujuan
$targetDir = "uploads/";

// Ambil nama file
$fileName = basename($_FILES["fileUpload"]["name"]);
$targetFilePath = $targetDir . $fileName;

// Cek apakah ada error saat upload
if (isset($_POST["submit"]) || isset($_FILES["fileUpload"])) {

    // Cek tipe file (boleh tambahin validasi sesuai kebutuhan)
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $allowedTypes = array("jpg", "jpeg", "png", "pdf", "doc", "docx", "ppt", "pptx");

    if (in_array($fileType, $allowedTypes)) {
        // Pindahkan file ke folder uploads/
        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $targetFilePath)) {
            echo "<script>
                    alert('File berhasil diupload!');
                    window.location.href='index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal mengupload file.');
                    window.location.href='index.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Hanya file dengan format JPG, PNG, PDF, DOC, PPT yang diperbolehkan.');
                window.location.href='index.php';
              </script>";
    }
}
