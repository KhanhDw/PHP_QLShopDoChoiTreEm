<?php include("../inc/top.php"); ?>

<h3>Quản lý đồ chơi</h3> 
<br>
<a href="index.php?action=them" class="btn btn-info">
	<i class="align-middle" data-feather="plus-circle"></i> 
	Thêm đồ chơi
</a>
<br> <br> 
<table class="table table-hover">
	<tr>
		<th>Tên đồ chơi</th>
		<th>Giá bán</th>
		<th>Số lượng</th>
		<th>Hình ảnh</th>		
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php
	foreach($dochoi as $d):
	?>
	<tr>
		<td>
			<a href="index.php?action=chitiet&id=<?php echo $d["id"]; ?>">
			<?php echo $d["tendochoi"]; ?>
			</a>	
		</td>
		<td><?php echo number_format ($d["giagoc"]); ?> VND</td>
		<td><?php echo $d["soluong"]; ?></td>
		<td>
			<a href="index.php?action=chitiet&id=<?php echo $d["id"]; ?>">
			<img src="../../<?php echo $d["hinhanh"]; ?>" width="80" class="img-thumbnail"></a>
		</td>
		<td><a class="btn btn-warning" href="index.php?action=sua&id=<?php echo $d["id"]; ?>"><i class="align-middle" data-feather="edit"></a></td>
		<td><a class="btn btn-danger" href="index.php?action=xoa&id=<?php echo $d["id"]; ?>"><i class="align-middle" data-feather="trash-2"></a></td>
	</tr>
	<?php
	endforeach;
	?>
</table>

<?php include("../inc/bottom.php"); ?>
