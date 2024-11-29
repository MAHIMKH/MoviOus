<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'user_database');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT id, username, email, password FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>MoviOus</title>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <h1>MoviOus</h1>
        </div>
        <a href="login.html" class="login">Log in</a>
    </div>
    
    <div class="SignUp">
        <h1>Sign Up</h1>
        <form action="signup.php" method="POST">
            <input type="text" class="input-box" name="username" placeholder="Username" required>
            <input type="text" class="input-box" name="email" placeholder="Email or mobile number" required>
            <input type="password" class="input-box" name="password" placeholder="Password" required>
            <button type="submit" class="sign-up-btn">Sign up</button>
        </form>
        <h4>Already have an account? <a href="login.html"> <button class="log">Log In</button></a></h4>
    </div>

    <div class="user-table">
    <h2>Registered Users</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['password']); ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $row['id']; ?>">Update</a> |
                            <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No users found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


    <?php $conn->close(); ?>
</body>
</html>
