<?php
$conn = new mysqli("localhost", "root", "", "dulieu");
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem Thông Tin Nhân Viên</title>
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
</head>
<body>
    <h2>Danh sách Nhân Viên</h2>
    <a href="trangchu.php">Quay về trang chủ</a>
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
        $sql = "SELECT * FROM nhanvien";
        $result = $conn->query($sql);

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
    <br>
    <a href="xoatatca.php">Xóa tất cả</a>
    <button onclick="goBack()">Back</button>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>