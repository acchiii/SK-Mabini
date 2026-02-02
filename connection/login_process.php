<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        // Fetch user by username
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Secure password check
            if (password_verify($password, $user['password'])) {
                $_SESSION['role'] = $user['role'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['dob'] = $user['name'];
                $_SESSION['location'] = $user['name'];
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['profile'] = $user['profile'];

                if($user['role'] == 'Admin' || $user['role'] == 'Official' ){
                header("Location: ../page/admin");
                }else{
                header("Location: ../page/user"); 
                }
                exit;
            } else {
                echo "<script>window.location.href='../index.php?user=".base64_encode($username). "&err=" .base64_encode("Incorrect Password")."&loginrequired=".base64_encode("1")."';</script>";
            }
        } else {
            echo "<script>window.location.href='../index.php?err=" .base64_encode("User not Found")."&loginrequired=1"."';</script>";
        }
    } else {
        echo "<script> window.location.href='../index.php?err=" .base64_encode("Try Again")."&loginrequired=".base64_encode("1")."';</script>";
    }
}
?>
