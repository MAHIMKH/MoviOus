<?php
session_start();

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "user_database";

// Establish connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user details
    $sql = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($password === $user['password']) { // Plain-text password comparison
            // Store session and redirect
            $_SESSION['username'] = $user['username'];
            echo "<div style='color:green; font-size:30px; text-align:center;'>Login successful. Welcome, " . $_SESSION['username'] . "!</div>";
            header("Location: profile.php"); // Redirect to dashboard
            exit();
        } else {
            echo "<div style='color:red; font-size:30px; text-align:center;'>Invalid password. Please try again.</div>";
        }
    } else {
        echo "<div style='color:red;'>Email not found. Please sign up first.</div>";
    }
}

$conn->close();
?>
