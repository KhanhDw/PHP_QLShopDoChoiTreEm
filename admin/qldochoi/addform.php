<?php include("../inc/top.php"); ?>

<h3>Thêm đồ chơi</h3> 
<br>
<form method="post" enctype="multipart/form-data" action="index.php">
<input type="hidden" name="action" value="xulythem">
<div class="mb-3 mt-3">
	<label for="optdanhmuc" class="form-label">Danh mục sản phẩm</label>
	<select class="form-select" name="optdanhmuc">
	<?php
	foreach($danhmuc as $d):
	?>
		<option value="<?php echo $d["id"]; ?>"><?php echo $d["tendanhmuc"]; ?></option>
	<?php
	endforeach;
	?>
	</select>
</div>
<div class="mb-3 mt-3">
	<label for="txttendochoi" class="form-label">Tên đồ chơi</label>
	<input class="form-control" type="text" name="txttendochoi" placeholder="Nhập tên" required>
</div>
<div class="mb-3 mt-3">
	<label for="txtthuonghieu" class="form-label">Tên thương hiệu</label>
	<input class="form-control" type="text" name="txtthuonghieu" placeholder="Nhập tên thương hiệu" required>
</div>
<div class="mb-3 mt-3">
	<label for="txtxuatxu" class="form-label">Xuất xứ</label>
	<input class="form-control" type="text" name="txtxuatxu" placeholder="Nhập xuất xứ" required>
</div>
<div class="mb-3 mt-3">
	<label for="txtdotuoi" class="form-label">Độ tuổi</label>
	<input class="form-control" type="text" name="txtdotuoi" placeholder="Nhập độ tuổi" required>
</div>
<div class="mb-3 mt-3">
	<label for="txtnamsanxuat" class="form-label">Năm sản xuất</label>
	<input class="form-control" type="number" name="txtnamsanxuat" placeholder="Nhập năm sản xuất" required>
</div>
<div class="mb-3 mt-3">
	<label for="txtgiagoc" class="form-label">Giá góc</label>
	<input class="form-control" type="number" name="txtgiagoc" value="0">
</div>
<div class="mb-3 mt-3">
	<label for="txtgiam" class="form-label">Giảm</label>
	<input class="form-control" type="number" name="txtgiam" value="0">
</div>
<div class="mb-3 mt-3">
	<label for="txtsoluong" class="form-label">Số lượng</label>
	<input class="form-control" type="number" name="txtsoluong" value="0">
</div>
<div class="mb-3 mt-3">
	<label for="txtmota" class="form-label">Mô tả</label>
	<textarea id="txtmota" rows="5" class="form-control" name="txtmota" placeholder="Nhập mô tả" required></textarea>
</div>
<div class="mb-3 mt-3">
	<label>Hình ảnh</label>
	<input class="form-control" type="file" name="filehinhanh">
</div>
<div class="mb-3 mt-3">
	<input type="submit" value="Lưu" class="btn btn-success">
	<input type="reset" value="Hủy" class="btn btn-warning">
</div>
</form>

<?php include("../inc/bottom.php"); ?>