<?php
include '../../../connection/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $venue = mysqli_real_escape_string($conn, $_POST['venue']);
    $event_date = mysqli_real_escape_string($conn, $_POST['event_date']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
   $date_posted = date('Y-m-d H:i:s');

    $insert_query = "INSERT INTO events (title, description, date, venue, created_at) VALUES ('$title', '$content',  '$event_date', '$venue','$date_posted')";

    if ($conn->query($insert_query) === TRUE) {
        header('Location: ../events.php?msg='.base64_encode("Event added successfully!").'&msgtype='.base64_encode("success"));
        exit;
    } else {
        header('Location: ../events.php?msg='.base64_encode("Error adding event: " . $conn->error).'&msgtype='.base64_encode("error"));
        exit;
    }
} else {
    header('Location: ../events.php');
    exit;
}
?>