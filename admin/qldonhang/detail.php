<?php include("../inc/top.php"); ?>

<a href="index.php">Trở về danh sách</a>
<h3>ID đơn hàng: <p style="color: gray;"><?php echo $h["id"]; ?></p></h3>
<h4>ID Khách hàng: <p style="color: gray;"><?php echo $h["nguoidung_id"]; ?></p></h4>
<h4>Tổng tiền: <p style="color: gray;"><?php echo number_format($h["tongtien"]); ?> VND</p></h4>
<h4>Tiền giảm: <p style="color: gray;"><?php echo number_format($h["tiengiam"]); ?> VND</p></h4>
<h4>Thành tiền: <p style="color: gray;"><?php echo number_format($h["thanhtien"]); ?> VND</p></h4>

<h4>Địa chỉ nhận hàng: <p style="color: gray;"><?php echo $dc["diachi"]; ?></p></h4>


<h3>Chi tiết đơn hàng:</h3>
<table class="table table-hover">
	<tr>
		<th>ID sách</th>
		<th>Tên sách</th>
		<th>Đơn giá</th>
		<th>Số lượng</th>
		<th>Thành tiền</th>
	</tr>
	<?php
    foreach($ctdonhang as $cts)
	foreach($dochoi as $dc)
    if($cts["sach_id"] == $dc["id"]){
	?>
	<tr>
		<td><?php echo $dc["id"]; ?></td>
		<td><?php echo $dc["tendochoi"]; ?></td>
		<td><?php echo number_format($cts["dongia"]); ?> VND</td>
		<td><?php echo $cts["soluong"]; ?></td>
		<td><?php echo number_format($cts["thanhtien"]); ?> VND</td>
	</tr>
	<?php } ?>
</table>



<a href="index.php">Trở về danh sách</a>
<?php include("../inc/bottom.php"); ?>
