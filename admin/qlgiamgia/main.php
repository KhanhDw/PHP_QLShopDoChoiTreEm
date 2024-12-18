<?php include("../inc/top.php"); ?>

<h3>Quản lý mã giảm giá</h3> 
<br>
<a href="addform.php" class="btn btn-info">
	<i class="align-middle" data-feather="plus-circle"></i> 
	Thêm chương trình giảm giá
</a>
<br> <br> 
<table class="table table-hover">
	<tr>
		<th>Chương trình giảm giá</th>
		<th>Phần trăm giảm Giá</th>
		<th>Tiền giảm tối đa</th>
        <th>Đơn hàng tối thiểu</th>
		<th>Bắt đầu</th>
		<th>Kết thúc</th>
		<th>Sửa</th>
        <th>Xóa</th>
	</tr>
	<?php
	foreach($giamgia as $gg):
	?>
	<tr>
		<td><?php echo $gg["chuongtrinhgiam"]; ?></td>
		<td><?php echo $gg["phantramgiamgia"]; ?></td>
		<td><?php echo number_format($gg["tiengiamtoida"]); ?> VND</td>
        <td><?php echo number_format($gg["donhangtoithieu"]); ?> VND</td>
		<td><?php echo $gg["tgbatdau"]; ?></td>
		<td><?php echo $gg["tgketthuc"]; ?></td>
		<td><a class="btn btn-warning" href="index.php?action=sua&id=<?php echo $gg["id"]; ?>"><i class="align-middle" data-feather="edit"></a></td>
		<td><a class="btn btn-danger" href="index.php?action=xoa&id=<?php echo $gg["id"]; ?>"><i class="align-middle" data-feather="trash-2"></a></td>
	</tr>
	<?php
	endforeach;
	?>
</table>

<?php include("../inc/bottom.php"); ?>
