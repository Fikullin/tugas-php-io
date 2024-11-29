<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $servername = "localhost";
    $username = "root"; 
    $password = "";
    $dbname = "login";

   
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

   
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']); 

   
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        
        if (password_verify($password, $row['password'])) {
        
            $_SESSION['username'] = $row['username'];
            echo "Login berhasil! Selamat datang, " . $row['username'];

       
            if ($remember) {
                setcookie("username", $row['username'], time() + (86400 * 30), "/"); 
                setcookie("password", $password, time() + (86400 * 30), "/"); 
            } else {
              
                if (isset($_COOKIE['username'])) {
                    setcookie("username", "", time() - 3600, "/");
                }
                if (isset($_COOKIE['password'])) {
                    setcookie("password", "", time() - 3600, "/");
                }
            }

            
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }

 
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <style>

    </style>
</head>
<body>
    <h2>Form Login</h2>
    <form action="login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>" required><br><br>

        <input type="checkbox" id="remember" name="remember" <?php echo isset($_COOKIE['username']) ? 'checked' : ''; ?>>
        <label for="remember">Ingat saya</label><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>