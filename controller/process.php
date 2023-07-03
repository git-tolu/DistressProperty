<?php
$targetDir = "../galleryImage/"; // Folder to store the uploaded images
// $dbHost = "localhost"; // Database host
// $dbUser = "your_username"; // Database username
// $dbPassword = "your_password"; // Database password
// $dbName = "your_database"; // Database name
echo 'done';

// // Create a connection to the database
// $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
include("opendb.php");
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// Handle file upload
if (!empty($_FILES)) {
    $uploadedFiles = $_FILES['file'];

    $fileNames = array();
    $filePaths = array();

    // Loop through each uploaded file
    foreach ($uploadedFiles['name'] as $key => $name) {
        $tmpName = $uploadedFiles['tmp_name'][$key];
        $fileName = basename($name);
        $filePath = $targetDir . $fileName;
        $filePath1 =  $fileName;

        // Move the file to the target directory
        if (move_uploaded_file($tmpName, $filePath)) {
            $fileNames[] = $fileName;
            $filePaths[] = $filePath;
        }
    }

    // Insert file details into the database
    foreach ($fileNames as $key => $fileName) {
        $filePath = $filePaths[$key];
        $_SESSION['galleryimageid'] = $galleryimageid;
        $sql = $dbusers->multiImage($galleryimageid, $filePath1);
        echo 'done';
        // $sql = "INSERT INTO images (filename, filepath) VALUES ('$fileName', '$filePath')";
        // $conn->query($sql);
    }
}

// Close the database connection
$conn->close();
?>
