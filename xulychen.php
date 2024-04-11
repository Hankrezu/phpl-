<?php
// Kiểm tra xem có dữ liệu được gửi từ biểu mẫu hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $idnv = $_POST["idnv"];
    $hoten = $_POST["hoten"];
    $idpb = $_POST["idpb"];
    $diachi = $_POST["diachi"];
    
    // Thực hiện xử lý dữ liệu ở đây, ví dụ:
    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli("localhost", "root", "", "dulieu");
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }
    
    // Thực hiện truy vấn hoặc thao tác với cơ sở dữ liệu ở đây
    $sql = "INSERT INTO nhanvien (IDNV, Hoten, IDPB, Diachi)
            VALUES ('$idnv', '$hoten', '$idpb', '$diachi')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: chen.php?");
        exit();
    } else {
        // Chuyển hướng đến trang error.php và truyền thông báo lỗi
        $error_message = "Lỗi: " . $sql . "<br>" . $conn->error;
        header("Location: error.php?message=" . urlencode($error_message));
        exit();
    }
    
    // Đóng kết nối
    $conn->close();
}
?>