<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mini Drive Aplikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Header -->
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">📂 Mini Drive</a>
        </div>
    </nav>

    <div class="container">
        <div class="card shadow-sm p-4">

            <!-- File List Section -->
            <h4 class="text-center bg-primary text-white p-2 rounded">Daftar File</h4>
            <table class="table table-bordered table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>File Name</th>
                        <th>Size</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $folder = "uploads/";
                    if (is_dir($folder)) {
                        $files = array_diff(scandir($folder), array('.', '..'));
                        foreach ($files as $file) {
                            $filePath = $folder . $file;
                            $fileSize = round(filesize($filePath) / 1024, 2) . " KB";
                            $fileDate = date("d-m-Y", filemtime($filePath));
                            echo "<tr>
                          <td>$file</td>
                          <td>$fileSize</td>
                          <td>$fileDate</td>
                          <td>
                            <a href='$filePath' class='btn btn-sm btn-success' download>Download</a>
                            <a href='delete.php?file=$file' class='btn btn-sm btn-danger'>Delete</a>
                          </td>
                        </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>

            <!-- Upload Section -->
            <div class="mt-4">
                <form action="upload.php" method="POST" enctype="multipart/form-data" class="d-flex">
                    <input type="file" class="form-control me-2" name="fileUpload" required>
                    <button class="btn btn-primary" type="submit" name="submit">Upload</button>
                </form>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>