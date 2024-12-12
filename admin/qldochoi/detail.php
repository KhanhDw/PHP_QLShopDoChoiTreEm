<?php include("../inc/top.php"); ?>

<a href="index.php">Trở về danh sách</a>
<h3><?php echo $m["tendochoi"]; ?></h3> 
<img src="../../<?php echo $m["hinhanh"]; ?>" width="400" class="img-thumbnail"></a>

<p><strong>Giá gốc: </strong><?php echo number_format($m["giagoc"]); ?>VND</p>
<p><strong>Giá giảm: </strong><?php echo number_format($m["giam"]); ?>VND</p>
<p><strong>Thương hiệu: </strong><?php echo $m["thuonghieu"]; ?></p>
<p><strong>Độ tuổi: </strong><?php echo $m["dotuoi"]; ?></p>
<p><strong>Xuất xứ: </strong><?php echo $m["xuatxu"]; ?></p>
<p><strong>Năm sản xuất: </strong><?php echo $m["namsanxuat"]; ?></p>
<p><strong>Mô tả: </strong><br><?php echo $m["mota"]; ?></p>
<p><strong>Lượt xem: </strong><?php echo $m["luotxem"]; ?></p>
<p><strong>Lượt mua: </strong><?php echo $m["luotmua"]; ?></p>
<p><strong>Số lượng tồn kho: </strong><?php echo $m["soluong"]; ?></p>
<p><a class="btn btn-warning" href="index.php?action=sua&id=<?php echo $m["id"]; ?>"><i class="align-middle" data-feather="edit"></i> Sửa</a> 
<a class="btn btn-danger" href="index.php?action=xoa&id=<?php echo $m["id"]; ?>"><i class="align-middle" data-feather="trash-2"></i> Xóa</a></p>	

<a href="index.php">Trở về danh sách</a>
<?php include("../inc/bottom.php"); ?>
