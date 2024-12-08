<?php
session_start();

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "users"; 


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password_input = $_POST['password']; 

    $stmt = $conn->prepare("SELECT password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($stored_password, $role); 
        $stmt->fetch();

       
        if ($password_input === $stored_password) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role; 
            
            if ($role == 1) {
                header("Location: dashboard.php"); 
                exit(); 
            } else {
                echo "Đăng nhập thành công! Chào mừng, " . htmlspecialchars($username);
                header("Location: home/index.php");
                exit();
            }
        } else {
            echo "Mật khẩu không đúng.";
        }
    } else {
        echo "Tài khoản không tồn tại.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Đăng Nhập</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Tài Khoản</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mật Khẩu</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Đăng Nhập</button>
        </form>
    </div>
</body>
</html>