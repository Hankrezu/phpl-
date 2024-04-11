<?php
$user = $_REQUEST['username'];
$pass = $_REQUEST['password'];

if ($user == "" || $pass == "") {
    header("Location: login.php");
    exit(); // Thoát khỏi script sau khi chuyển hướng
}

$conn = new mysqli("localhost", "root", "", "dulieu");
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

$query = "SELECT * FROM admin WHERE username = ? AND password = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $user, $pass);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Người dùng được xác thực
    // Thực hiện các hành động tiếp theo hoặc chuyển hướng đến trang thành công
    header("Location: Trangchu.php");
} else {
    // Xác thực người dùng thất bại
    // Chuyển hướng đến trang lỗi hoặc hiển thị thông báo lỗi
    $error_message = "Xác thực người dùng thất bại.";
    header("Location: error.php?error_message=" . urlencode($error_message));
}

$stmt->close();
$conn->close();
?>