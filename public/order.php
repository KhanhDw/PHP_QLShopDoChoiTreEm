<?php
include("inc/top.php");
?>
<a href="index.php">Trở về danh sách</a>
<h3>THANH TOÁN ĐƠN HÀNG</h3>
<form method="post" enctype="multipart/form-data" action="index.php">
	
<h4>Địa chỉ nhận hàng: </h4>
<div class="my-3">    
	<label>Nhập địa chỉ: </label>    
	<input class="form-control" type="text" name="txtdiachi" required value="">
</div> 
	<br> <br> 
	<h3>Chi tiết đơn hàng:</h3>
	<table class="table table-hover">
		<tr>
			<th>ID đồ chơi</th>
			<th>Tên đồ chơi</th>
			<th>Đơn giá</th>
			<th>Số lượng</th>
			<th>Thành tiền</th>
		</tr>
		<?php
		$numbers = [];
		foreach($giohang as $gh)
		foreach($dochoi as $dc)
		foreach($chons as $chon)
			if($gh["dochoi_id"]==$dc["id"] && $gh["id"]==$chon){
				$dongia = $dc["giagoc"] - $dc["giagoc"]*$dc["giam"]/100;
				$numbers[] = $gh["id"];
		?>
		<tr>
			<td><?php echo $dc["id"]; ?></td>
			<td><?php echo $dc["tendochoi"]; ?></td>
			<td><?php echo number_format($dongia); ?> VND</td>
			<td><?php echo $gh["soluong"]; ?></td>
			<td><?php echo number_format($dongia*$gh["soluong"]); ?> đ</td>
		</tr>
		<?php } 
		$_SESSION["numbers"] = $numbers; 
		?>
	</table>
	<br><hr><br>
	
	<br><hr><br>
	<table class="table table-hover">
	<h3>Hóa đơn:</h3>
		<tr>
			<th><h4>Tổng tiền: <p style="color: gray;"><?php echo number_format($tongtien); ?> VND</p></h4></th>
			<th><h4>Tiền giảm: <p style="color: gray;"><?php echo number_format($tiengiam); ?> VND</p></h4></th>
			<th><h4>Thành tiền: <p style="color: gray;"><?php echo number_format($thanhtien); ?> VND</p></h4></th>
		</tr>
	</table>
	<div class="col text-end">    
		<input type="hidden" name="action" value="thanhtoan">
    	<input type="submit" class="btn btn-warning" value="Thanh toán">
    </div>
</form>
<?php
include("inc/bottom.php");
?>