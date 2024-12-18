<?php include("inc/top.php"); ?>

<h3 class="text-info"><?php echo $tendm; ?></h3>
<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
<?php 
if($dochoi != null){
    foreach($dochoi as $m):
?>
    <div class="col mb-5">
        
    </div>
<?php 
    endforeach; 
    }
    else{
        echo "<p>Danh mục này hiện chưa có mặt hàng. Vui lòng xem danh mục khác...</p>";
    }
?>              
</div>
<ul class="pagination justify-content-center" style="margin:20px 0">
    <li class="page-item"><a class="page-link" href="#"><i class="bi bi-caret-left-fill"></i></a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#"><i class="bi bi-caret-right-fill"></i></a></li>
</ul>

<?php include("inc/bottom.php"); ?>