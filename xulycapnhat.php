<?php
// Thực hiện kết nối tới cơ sở dữ liệu MySQL
$conn = new mysqli("localhost", "root", "", "dulieu");
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Kiểm tra xem biểu mẫu đã được gửi đi và xử lý cập nhật
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idpb = $_POST['idpb'];
    $tenpb = $_POST['tenpb'];
    $motapb = $_POST['motapb'];

    // Cập nhật dữ liệu trong bảng nhanvien
    $sql = "UPDATE phongban SET Tenpb='$tenpb', Mota='$motapb' WHERE IDPB='$idpb'";
    if ($conn->query($sql) === TRUE) {
        header("Location: xemthongtinPB.php");
        exit();
    } else {
        echo "Cập nhật không thành công: " . $conn->error;
    }
}

$conn->close();
?>