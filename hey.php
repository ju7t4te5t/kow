<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target_dir = "uploads/";
    // Ensure the uploads directory exists
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    $fileName = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $fileName;
    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.<br>";
        $uploadOk = 0;
    }

    // Optional: Check file size (e.g., max 50MB)
    if ($_FILES["fileToUpload"]["size"] > 50 * 1024 * 1024) { // 50MB limit
        echo "Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }

    // If all checks pass, attempt to upload the file
    if ($uploadOk) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars($fileName) . " has been uploaded successfully.<br>";
        } else {
            echo "Sorry, there was an error uploading your file.<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple PHP File Upload</title>
</head>
<body>
    <h2>Upload a File</h2>
    <form action="index.php" method="post" enctype="multipart/form-data">
        Select file to upload:<br><br>
        <input type="file" name="fileToUpload" id="fileToUpload" required><br><br>
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>
