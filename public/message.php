<?php include("inc/top.php"); ?>

<br><br>
<div class="container">  
  <div class="row"> 
    <h4 class="text-info">Cảm ơn quý khách!</h4>   
	<p>Đơn hàng mã số <?php echo $dhang["id"]; ?> trị giá <strong><?php echo number_format($tongtien) ?> VND</strong> sẽ được giao đến quý khách trong thời gian sớm nhất.<p>
	<p><a href="index.php?action=thongtin">Danh sách đơn hàng</a></p>
  </div>  
</div>

<?php include("inc/bottom.php"); ?>