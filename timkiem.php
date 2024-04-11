<!-- 
    
tim kiem theo tung tieu chi cua bang nhanvien

IDNV Hoten Diachi

-->
<style>
  .radio-group {
    display: flex;
  }
</style>

<form action="xulytimkiem.php" method="GET">
<a href="trangchu.php">Quay về trang chủ</a>
  <div class="radio-group">
    <label>
      <input type="radio" name="option" value="IDNV">
      ID
    </label>
    <label>
      <input type="radio" name="option" value="Hoten">
      Tên
    </label>
    <label>
      <input type="radio" name="option" value="Diachi">
      Địa chỉ
    </label>
  </div>
  
  <br>
  <input type="text" name="search" placeholder="Enter search term">
  <input type="submit" value="Search">
</form>