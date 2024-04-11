<!DOCTYPE html>
<html>
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
<head>
    <title>Cập nhật phòng ban</title>
</head>
<body>
    <h2>Cập nhật phòng ban</h2>

    <form action="xulycapnhat.php" method="post">
        <table>
            <tr>
                <th>ID phòng ban</th>
                <th>Tên phòng ban</th>
                <th>Mô tả phòng ban</th>
            </tr>
            <?php
            // Thực hiện kết nối tới cơ sở dữ liệu MySQL
            $conn = new mysqli("localhost", "root", "", "dulieu");
            if ($conn->connect_error) {
                die("Kết nối không thành công: " . $conn->connect_error);
            }
            // Lấy dữ liệu từ bảng phongban dựa trên IDPB
            $idpb = $_GET['IDPB']; // Giá trị IDPB từ biểu mẫu
            $sql = "SELECT * FROM phongban WHERE IDPB = '$idpb'";
            $result = $conn->query($sql);
            // Điền dữ liệu vào bảng
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $idpb = $row['IDPB'];
                    $tenpb = $row['Tenpb'];
                    $motapb = $row['Mota'];

                    echo "
                    <tr>
                        <td>
                            <input type='text' name='idpb' readonly value='$idpb'>
                        </td>
                        <td>
                            <input type='text' name='tenpb' value='$tenpb'>
                        </td>
                        <td>
                            <input type='text' name='motapb' value='$motapb'>
                        </td>
                    </tr>
                    ";
                }
            }
            $conn->close();
            ?>
        </table>
        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>