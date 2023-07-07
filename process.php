<?php
include('controller/session.php');

$targetDir = 'galleryImage/'; // Specify the target directory to store the uploaded images

// Create the target directory if it doesn't exist
if (!file_exists($targetDir)) {
  mkdir($targetDir, 0777, true);
}

$galleryimageid = $_SESSION['galleryimageid']  ;
// Process each uploaded file
// foreach ($_FILES['file']['tmp_name'] as $key => $tmpName) {
    
//     // Move the uploaded file to the target directory
// }
$targetFile = $targetDir . $_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'], $targetFile);
$filename = $_FILES['file']['name'];

// Return a response (optional)
$sql = $dbusers->multiImage($galleryimageid, $filename);

$response = ['message' => 'Images uploaded successfully'];
header('Content-Type: application/json');
echo json_encode($response);

// $targetDirectory = '../galleryImage/';

// // Iterate through the uploaded files
// for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
//     $filename = $_FILES['file']['name'][$i];
//     $tempFilePath = $_FILES['file']['tmp_name'][$i];
//     $targetFilePath = $targetDirectory . $filename;
//     $galleryimageid = $_SESSION['galleryimageid']  ;

//     // Move the temporary file to the target directory
//     $sql = $dbusers->multiImage($galleryimageid, $filename);
//     if (move_uploaded_file($tempFilePath, $targetFilePath) && $sql) {
//         $response = ['message' => ' uploaded successfully'];
//         header('Content-Type: application/json');
//         echo json_encode($response);
//     } else {
//         $response = ['message' => 'Failed To Upload'];
//         header('Content-Type: application/json');
//         echo json_encode($response);    
//     }
// }
?>