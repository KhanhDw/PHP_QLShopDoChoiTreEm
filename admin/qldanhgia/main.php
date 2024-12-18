<?php include("../inc/top.php"); ?>


<h4 class="text-info">Danh sách đánh giá</h4> 
<table class="table table-hover">
	<tr><th>ID</th><th>Bình luận</th><th>Sửa</th><th>Xóa</th></tr>
	
<!-- <?php
	session_start();
	if(isset($_SESSION['id']) &&($_SESSION['sid']>0)){
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewprot" content="width=device-width, intial-scale=1.0">
	<title>Đánh giá sản phẩm</title>
</head>
<body>
	<hr>
		<form action= "danhgia.php" method="post">
			<input type ="text" name="name">
			<input type ="hidden" name="iddc" value="<?=$_GET['iddc']?>">
			<textarea name="binhluan" id="" cols="30" rows="10"></textarea>
			<input type="submit" class="btn btn-primary" value="Gửi đánh giá">
		</form>
	</hr>
</body>
</html>
<?php }else{
	echo "<a href='loginform.php?act=dangnhap'>Vui lòng đăng nhập</a>";
} ?> -->

