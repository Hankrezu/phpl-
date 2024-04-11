<!-- xoa thong tin bang data -->
<?php
// Kiểm tra xem có IDNV được truyền vào hay không
if (isset($_GET['IDNV'])) {
    $idnv = $_GET['IDNV'];

    // Thực hiện kết nối đến cơ sở dữ liệu
  
$conn = new mysqli("localhost", "root", "", "dulieu");
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}  

    // Thực hiện truy vấn SQL để xóa nhân viên dựa trên IDNV
    $sql = "DELETE FROM nhanvien WHERE IDNV = '$idnv'";
    $result = $conn->query($sql);

    // Đóng kết nối
    $conn->close();
}

// Tải lại trang trước đó
header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
?>