<?php
    if (isset($_POST['selected'])) {
        $selected = $_POST['selected'];

        // Thực hiện kết nối đến cơ sở dữ liệu
        $conn = new mysqli("localhost", "root", "", "dulieu");
        if ($conn->connect_error) {
            die("Kết nối không thành công: " . $conn->connect_error);
        }

        // Xóa các nhân viên được chọn
        foreach ($selected as $idnv) {
            $sql = "DELETE FROM nhanvien WHERE IDNV = '$idnv'";
            $result = $conn->query($sql);
        }

        // Đóng kết nối
        $conn->close();
    }

    // Tải lại trang trước đó
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
?>