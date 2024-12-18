<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="preconnect" href="https://fonts.gstatic.com">

	<title>Trang quản trị - Shop Đồ chơi PNK</title>

	<link href="../inc/css/app.css" rel="stylesheet">
	<script src="../inc/js/app.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="">
          <span class="align-middle">Shop Đồ chơi PNK</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header text-info">
						HỆ THỐNG
					</li>

					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"ktnguoidung") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../ktnguoidung/index.php">
						<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Bảng điều khiển </span>
						</a>
					</li>

				<?php if(isset($_SESSION["nguoidung"]) && $_SESSION["nguoidung"]["quyen"]==1){ ?>
					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"qlnguoidung") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qlnguoidung/index.php">
						<i class="align-middle" data-feather="users"></i> <span class="align-middle">Quản lý người dùng</span>
						</a>
					</li>
				<?php } ?>

					<li class="sidebar-header text-info">
						DANH MỤC
					</li>

					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"qldanhmuc") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qldanhmuc/index.php">
						<i class="align-middle" data-feather="grid"></i> <span class="align-middle">Quản lý danh mục</span>
						</a>
					</li>

					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"qldochoi") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qldochoi/index.php">
						<i class="align-middle" data-feather="package"></i> <span class="align-middle">Quản lý hàng hóa</span>
						</a>
					</li>

					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"qldanhgia") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qldanhgia/index.php">
						<i class="align-middle" data-feather="package"></i> <span class="align-middle">Quản lý đánh giá</span>
						</a>
					</li>

					<li class="sidebar-header text-info">
						KINH DOANH
					</li>

					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"qldonhang") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qldonhang/index.php">
						<i class="align-middle" data-feather="truck"></i> <span class="align-middle">Quản lý đơn hàng</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="">
						<i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Quản lý doanh thu</span>
						</a>
					</li>

					<li class="sidebar-item <?php if(strpos($_SERVER['REQUEST_URI'],"qlgiamgia") != false) echo "active"; ?>">
						<a class="sidebar-link" href="../qlgiamgia/index.php">
						<i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">Chương trình khuyến mãi</span>
						</a>
					</li>

					
					
					<li class="sidebar-header text-info">
						CẤU HÌNH WEBSITE
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="">
						<i class="align-middle" data-feather="book"></i> <span class="align-middle">Thông tin</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="">
						<i class="align-middle" data-feather="image"></i> <span class="align-middle">Hình ảnh</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>




			<main class="content">
				<div class="container-fluid p-0">