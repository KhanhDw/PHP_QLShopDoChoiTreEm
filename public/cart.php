<?php
include("inc/top.php");
?>
<?php if(count($giohang)==0){ ?>
<h3 class="text-info">Giỏ hàng rỗng!</h3>
<p>Vui lòng chọn sản phẩm...</p>    
<?php 
} 
else{ 
?>
<h3 class="text-info">Giỏ hàng của bạn:</h3>
<form method="post" action="index.php">
<table class="table table-hover">
    <tr><th></th><th>Hình ảnh</th><th>Tên hàng</th><th>Đơn giá</th><th>Số lượng</th><th>Thành tiền</th></tr>
<?php foreach($giohang as $gh)
        foreach($dochoi as $d)
        if($gh["dochoi_id"]==$d["id"]){   ?>
    <tr>
        <td><input type="checkbox" name="ghchon[]" value="<?php echo $gh["id"]; ?>"></td>
        <td><img width="50" src="../<?php echo $d["hinhanh"]; ?>"></td>
        <td><?php echo $d["tendochoi"]; ?></td>
        <td><?php echo number_format($d["giagoc"]-$d["giagoc"]*$d["giam"]/100); ?>đ</td>
        <td>
            <a class="btn btn-warning" href="?action=doisoluong&idgh=<?php echo $gh["id"]; ?>&soluong=<?php echo $gh["soluong"]-1; ?>">-</a>
            <input type="number" name="soluong[<?php echo $d["id"]; ?>]" value="<?php echo $gh["soluong"]; ?>">
            <a class="btn btn-warning" href="?action=doisoluong&idgh=<?php echo $gh["id"]; ?>&soluong=<?php echo $gh["soluong"]+1; ?>">+</a>
        </td>
        <td><?php echo number_format(($d["giagoc"]-$d["giagoc"]*$d["giam"]/100)*$gh["soluong"]); ?> VND</td>
    </tr>
<?php } ?>
    <!-- <tr><td colspan="3"></td><td class="fw-bold">Tổng tiền</td><td class="text-danger fw-bold"><?php //echo number_format(tinhtiengiohang()); ?>đ</td></tr> -->
</table>
    <!-- <div class="text-danger fw-bold">Lưu ý: trước khi nhấn nút "Cập nhật" hoặc "Thanh toán" thì kiểm tra nếu số lượng mua > số lượng có trong csdl thì không được thực hiện. </div> -->

<div class="row">
    <!-- <div class="col"><a href="index.php?action=xoagiohang">Xóa tất cả</a> (Xóa một mặt hàng nhập số lượng = 0)</div> -->
    <div class="col text-end">    
    <input type="hidden" name="action" value="lapdon">
    <input type="submit" class="btn btn-warning" value="Thanh toán">
    <!-- <a href="index.php?action=lapdon" class="btn btn-success">Thanh toán</a> -->
    </div>
</div>
</form>
<?php } // end if ?>
<?php
include("inc/bottom.php");
?>