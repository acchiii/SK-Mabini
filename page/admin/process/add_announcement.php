<?php 
include '../../../connection/config.php';
session_start();




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
   $date_posted = date('Y-m-d H:i:s');

    $insert_query = "INSERT INTO announcements (title, description, created_at) VALUES ('$title', '$content','$date_posted')";

    if ($conn->query($insert_query) === TRUE) {
        header('Location: ../announcements.php?msg='.base64_encode("Announcement added successfully!").'&msgtype='.base64_encode("success"));
        exit;
    } else {
        header('Location: ../announcements.php?msg='.base64_encode("Error adding announcement: " . $conn->error).'&msgtype='.base64_encode("error"));
        exit;
    }
} else {
    header('Location: ../announcements.php');
    exit;
}

?>