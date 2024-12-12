<?php include("../inc/top.php"); ?>

<h3>Thêm mã giảm giá</h3> 
<br>
<form method="post" enctype="multipart/form-data" action="index.php">
<input type="hidden" name="action" value="xulythem">

<div class="mb-3 mt-3">
	<label for="txtchuongtrinhgiam" class="form-label">Chương trình giảm giá</label>
	<input class="form-control" type="text" name="txtchuongtrinhgiam" placeholder="Nhập chương trình giảm giá" required>
</div>
<div class="mb-3 mt-3">
	<label for="txtphantramgiamgia" class="form-label">Phần trăm giảm giá</label>
	<input class="form-control" type="number" name="txtphantramgiamgia" required>
</div>
<div class="mb-3 mt-3">
	<label for="txttiengiamtoida" class="form-label">Tiền giảm tối đa</label>
	<input class="form-control" type="number" name="txttiengiamtoida" required>
</div>
<div class="mb-3 mt-3">
	<label for="txtdonhangtoithieu" class="form-label">Đơn hàng tối thiểu</label>
	<input class="form-control" type="number" name="txtdonhangtoithieu" required>
</div>
<div class="mb-3 mt-3">
	<label for="txttgbatdau" class="form-label">Thời gian bắt đầu:</label>
	<input class="form-control" type="date" name="txttgketthuc" required>
</div>
<div class="mb-3 mt-3">
	<label for="txttgkethuc" class="form-label">Thời gian kết thúc:</label>
	<input class="form-control" type="date" name="txttgbatdau" required>
</div>

<div class="mb-3 mt-3">
	<input type="submit" value="Lưu" class="btn btn-success">
	<input type="reset" value="Hủy" class="btn btn-warning">
</div>
</form>

<?php include("../inc/bottom.php"); ?>