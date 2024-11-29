<?php
$conn = new mysqli('localhost', 'root', '', 'user_database');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Fetch the current data for the user
    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    if (!$user) {
        echo "User not found.";
        exit;
    }
    
    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // Update the user in the database
        $updateQuery = "UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("sssi", $username, $email, $password, $id);
        
        if ($updateStmt->execute()) {
            //echo "<script>alert('User updated successfully!');</script>";
            echo "<script>window.location.href = 'index.php';</script>"; // Redirect to main page
        } else {
            echo "Error updating user: " . $conn->error;
        }
    }
} else {
    echo "Invalid ID.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="update-form">
        <h2>Update User</h2>
        <form method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            
            <label for="password">Password:</label>
            <input type="text" id="password" name="password" value="<?php echo htmlspecialchars($user['password']); ?>" required>
            
            <button type="submit">Update</button>
        </form>
        <a href="index.php" class="cancel">Cancel</a>
    </div>
</body>
</html>
