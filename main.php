<?php include("../inc/top.php"); ?>

<h3>Quản lý đơn hàng</h3> 
<br>
<br>
<table class="table table-hover">
	<tr>
        <th>ID</th>
		<th>ID khách hàng</th>
		<th>Tổng tiền</th>
        <th>Tiền giảm</th>
        <th>Thành tiền</th>
	</tr>
	<?php
	foreach($donhang as $dh):
	?>
	<tr>
        <td><a href="index.php?action=chitiet&id=<?php echo $dh["id"]; ?>"><?php echo $dh["id"]; ?></a></td>
        <td><?php echo $dh["nguoidung_id"]; ?></td>
        <td><?php echo number_format($dh["tongtien"]); ?> đ</td>
        <td><?php echo number_format($dh["tiengiam"]); ?> đ</td>
		<td><?php echo number_format($dh["thanhtien"]); ?> đ</td>	
	</tr>
	<?php
	endforeach;
	?>
</table>

<?php include("../inc/bottom.php"); ?>
