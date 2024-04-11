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
    <title>Xem Thông Tin Phòng Ban</title>
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
</head>
<body>
    <h2>Danh sách Phòng Ban</h2>
    <table>
        <tr>
            <th>IDPB</th>
            <th>Tên Phòng Ban</th>
            <th>Mô tả</th>
            <th>Danh sách Nhân Viên</th>
            <th>Cập nhật</th>
        </tr>
        <?php
        // Truy vấn dữ liệu từ bảng phongban
        $sql = "SELECT * FROM phongban";
        $result = $conn->query($sql);

        // Hiển thị kết quả
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["IDPB"] . "</td>";
                echo "<td>" . $row["Tenpb"] . "</td>";
                echo "<td>" . $row["Mota"] . "</td>";
                echo "<td><a href='xemthongtinNVPB.php?IDPB=" . $row["IDPB"] . "'>Xem Danh Sách Nhân Viên</a></td>";
                echo "<td><a href='form_capnhat.php?IDPB=" . $row["IDPB"] . "'>Cập Nhật</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Không có dữ liệu</td></tr>";
        }
        $conn->close();
        ?>
    </table>
    <button onclick="goBack()">Back</button>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
