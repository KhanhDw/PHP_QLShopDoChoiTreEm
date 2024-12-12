<?php include("../inc/top.php"); ?>
<div>
<h3>Cập nhật mã giảm giá</h3>
<form method="post" action="index.php" enctype="multipart/form-data">
<input type="hidden" name="action" value="xulysua">
<input type="hidden" name="txtid" value="<?php echo $m["id"]; ?>">

<div class="my-3">    
	<label>Chương trình giảm giá</label>    
	<input class="form-control" type="text" name="txtchuongtrinhgiam" value="<?php echo $m["chuongtrinhgiam"]; ?>" required>
</div> 
<div class="my-3">    
	<label>Phần trăm giảm giá</label>    
	<input class="form-control" type="number" name="txtphantramgiamgia" value="<?php echo $m["phantramgiamgia"]; ?>" required>
</div> 
<div class="my-3">    
	<label>Tiền giảm tối đa</label>    
	<input class="form-control" type="number" name="txttiengiamtoida" value="<?php echo $m["tiengiamtoida"]; ?>" required>
	</div> 
<div class="my-3">    
	<label>Đơn hàng tối thiểu</label>    
	<input class="form-control" type="number" name="txtdonhangtoithieu" value="<?php echo $m["donhangtoithieu"]; ?>" required>
</div> 
<div class="my-3">    
	<label>Thời gian bắt đầu</label>    
	<input class="form-control" type="date" name="txttgbatdau" value="<?php echo $m["tgbatdau"]; ?>" required>
</div> 
<div class="my-3">    
	<label>Thời gian kết thúc</label>    
	<input class="form-control" type="date" name="txttgketthuc" value="<?php echo $m["tgketthuc"]; ?>" required>
</div> 
<div class="my-3">
<input class="btn btn-primary"  type="submit" value="Lưu">
<input class="btn btn-warning"  type="reset" value="Hủy">
</div>
</form>
</div>
<?php include("../inc/bottom.php"); ?>