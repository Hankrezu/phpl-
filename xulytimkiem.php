<?php

$conn = new mysqli("localhost", "root", "", "dulieu");
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Lấy thông tin từ ô tìm kiếm và radio button
$option = $_GET['option'];
$search = $_GET['search'];

// Thực hiện truy vấn SQL dựa trên thông tin tìm kiếm
$sql = "SELECT * FROM nhanvien WHERE $option LIKE '%$search%'";
$result = $conn->query($sql);

?>
<html>
<a href="trangchu.php">Quay về trang chủ</a>
<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
</style>
<table>
        <tr>
            <th>ID Nhân Viên</th>
            <th>Họ và Tên</th>
            <th>ID Phòng Ban</th>
            <th>Địa Chỉ</th>
            <th></th>
        </tr>
        <?php
        // Truy vấn dữ liệu từ bảng nhanvien
        // Hiển thị kết quả
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["IDNV"] . "</td>";
                echo "<td>" . $row["Hoten"] . "</td>";
                echo "<td>" . $row["IDPB"] . "</td>";
                echo "<td>" . $row["Diachi"] . "</td>";
                echo "<td><a href='xoa.php?IDNV=" . $row["IDNV"] . "'>Xóa</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Không có dữ liệu</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</html>