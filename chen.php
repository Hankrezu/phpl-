<!DOCTYPE html>
<html>
<head>
    <title>Thêm nhân viên</title>
</head>
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
<body>
    <h2>Thêm nhân viên</h2>
    <a href="trangchu.php">Quay về trang chủ</a>
    <form action="xulychen.php" method="post">
        <table>
            <thead>
                <tr>
                    <th>ID Nhân Viên</th>
                    <th>Họ và Tên</th>
                    <th>ID Phòng Ban</th>
                    <th>Địa Chỉ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="idnv"></td>
                    <td><input type="text" name="hoten"></td>
                    <td><input type="text" name="idpb"></td>
                    <td><input type="text" name="diachi"></td>
                </tr>
            </tbody>
        </table>

        <button type="submit">Cập nhật</button>
    </form>
    <button onclick="goBack()">Back</button>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>