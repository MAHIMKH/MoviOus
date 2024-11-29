<?php
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
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   // $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    // Check if email already exists
    $check_email = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $result = $check_email->get_result();

    if ($result->num_rows > 0) {
        echo "<div style='color:red;'>Email is already registered. Please log in.</div>";
    } else {
        // Insert new user
        $sql = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $sql->bind_param("sss", $username, $email, $password);
        
        if ($sql->execute()) {
            echo "<div style='color:green; font-size:30px; text-align:center;'>
                    You have registered successfully!<br>
                    <a href='login.html'>
                        <button style='font-size:17px; padding:10px 20px; background-color:red; color:white; border:none; border-radius:9px; cursor:pointer;'>
                            Login
                        </button>
                    </a>
                  </div>";
                  header("Location: index.php");
        }
        
         else {
            echo "<div style='color:red;'>Error: " . $sql->error . "</div>";
        }
    }
}

$conn->close();
?>
<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>