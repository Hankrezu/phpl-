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
    <title>Xem Thông Tin Phòng Ban và Nhân Viên</title>
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

    <?php
    if (isset($_REQUEST['IDPB'])) {
        $IDPB = $_REQUEST['IDPB'];
        // Truy vấn dữ liệu từ bảng phongban và nhanvien
        $sql = "SELECT *
                FROM nhanvien nv
                WHERE IDPB = '$IDPB'";
        $result = $conn->query($sql);

        // Hiển thị kết quả
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>IDNV</th><th>Tên NV</th><th>Phòng Ban</th><th>Địa chỉ</th><th></th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["IDNV"] . "</td>";
                echo "<td>" . $row["Hoten"] . "</td>";
                echo "<td>" . $row["IDPB"] . "</td>";
                echo "<td>" . $row["Diachi"] . "</td>";
                echo "<td><a href='xoa.php?IDNV=" . $row["IDNV"] . "'>Xóa</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Không có dữ liệu";
        }
        $conn->close();
    }
    ?>

    <br>
    <button onclick="goBack()">Back</button>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>