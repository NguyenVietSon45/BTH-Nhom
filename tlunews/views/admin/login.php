<?php
session_start();

// Thông tin kết nối
$servername = "localhost"; // Địa chỉ máy chủ
$username = "root"; // Tên đăng nhập MySQL
$password = ""; // Mật khẩu MySQL
$dbname = "users"; // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $username = $_POST['username'];
    $password_input = $_POST['password']; // Tên biến đã thay đổi

    // Truy vấn để lấy thông tin người dùng
    $stmt = $conn->prepare("SELECT password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Kiểm tra xem người dùng có tồn tại không
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($stored_password, $role); // Lưu mật khẩu từ CSDL vào biến
        $stmt->fetch();

        // So sánh mật khẩu trực tiếp
        if ($password_input === $stored_password) {
            // Đăng nhập thành công
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role; // Lưu vai trò người dùng vào session
            
            // Chuyển hướng đến dashboard nếu là quản trị viên
            if ($role == 1) {
                header("Location: dashboard.php"); // Đường dẫn đến trang dashboard
                exit(); // Ngừng thực thi script sau khi chuyển hướng
            } else {
                echo "Đăng nhập thành công! Chào mừng, " . htmlspecialchars($username);
                // Bạn có thể chuyển hướng đến trang người dùng nếu cần
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