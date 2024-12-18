<?php include("inc/top.php"); ?>
    
  <div class="row">
    <div class="col-sm-9">      

      <h3 class="text-info"><?php echo $dcct["tendochoi"]; ?></h3>
      
      <div><img width="500px" src="../<?php echo $dcct["hinhanh"]; ?>"></div>

      
      <div>
      <h4 class="text-primary">Giá gốc: 
        <span class="text-danger"><?php echo number_format($dcct["giagoc"]); ?> VND</span>
      </h4>
  		<form method="post" class="form-inline">
    		<input type="hidden" name="action" value="chovaogio">
    		<input type="hidden" name="id" value="<?php echo $dcct["id"]; ?>">
        <div class="row">
          <div class="col">
            <input type="number" class="form-control" name="soluong" value="1">
          </div>
          <div class="col">
            <input type="submit" class="btn btn-primary" value="Chọn mua">
          </div>
        </div>		
    	</form>  	  
  	  </div>
	  
      <div>
        <h4 class="text-primary">Thương hiệu: </h4>
        <p><?php echo $dcct["thuonghieu"]; ?></p>
      </div>

      <div>
        <h4 class="text-primary">Xuất xứ: </h4>
        <p><?php echo $dcct["xuatxu"]; ?></p>
      </div>

      <div>
        <h4 class="text-primary">Năm sản xuất: </h4>
        <p><?php echo $dcct["namsanxuat"]; ?></p>
      </div>

      <div>
        <h4 class="text-primary">Độ tuổi: </h4>
        <p><?php echo $dcct["dotuoi"]; ?></p>
      </div>

      <div>
        <h4 class="text-primary">Mô tả sản phẩm: </h4>
        <p><?php echo $dcct["mota"]; ?></p>
      </div>

      <!-- <div>
        <h3 class="text-primary">Đánh giá sản phẩm: </h3>
        <p><?php echo $dcct["danhgia"]; ?></p>
      </div> -->

      <div class = "Đánh giá">
          <h5 class="text-primary">Đánh giá sản phẩm: </h5>
          
			    <textarea name="binhluan" id="" cols="100" rows="10"></textarea>
          <input type="submit" class="btn btn-primary" value="Gửi đánh giá">
      </div>


        <!-- <div class="danhgia">
          <iframe src="danhgia.php?iddc=<?=$_GET['id']?>"width="100%" height="400px" frameborder="0"></iframe>
      </div> -->
      
      <br>
    </div>
    <div class="col-sm-3"> 
      
      <h3 class="text-warning">Cùng danh mục:</h3>

      <?php
      foreach($dochoi as $m):  
        if($m["id"] != $dcct["id"]){
      ?>
      <div>
        <div class="col mb-5">
        <div class="card h-100 shadow">
            <!-- Sale badge-->
            <?php if ($m["giam"] > 0){ ?>
            <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Giảm giá</div>
            <?php } // end if ?>
            <!-- Product image-->
            <a href="?action=detail&id=<?php echo $m["id"]; ?>">
                <img class="card-img-top" src="../<?php echo $m["hinhanh"]; ?>" alt="<?php echo $m["tendochoi"]; ?>" />
            </a>
            <!-- Product details-->
            <div class="card-body p-4">
                <div class="text-center">
                    <!-- Product name-->
                    <a class="text-decoration-none" href="?action=detail&id=<?php echo $m["id"]; ?>"><h5 class="fw-bolder text-info"><?php echo $m["tendochoi"]; ?></h5></a>
                    <!-- Product reviews-->
                    <div class="d-flex justify-content-center small text-warning mb-2">
                        <div class="bi-star-fill"></div>
                        <div class="bi-star-fill"></div>
                        <div class="bi-star-fill"></div>
                        <div class="bi-star-fill"></div>
                        <div class="bi-star-fill"></div>
                    </div>
                    <!-- Product price-->
                    <?php if ($m["giam"] > 0){ ?>
                    <span class="text-muted text-decoration-line-through"><?php echo number_format($m["giagoc"]); ?> VND</span><?php } // end if ?> <br>
                    <span class="text-danger fw-bolder"><?php echo number_format($m["giagoc"]-$m["giagoc"]*$m["giam"]/100); ?> VND</span>
                </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-info mt-auto" href="index.php?action=chovaogio&id=<?php echo $m["id"]; ?>">Chọn mua</a></div>
            </div>
        </div>
    </div>
          
      </div>
      <?php 
        }
      endforeach; 
      ?>

      

    </div>    
  </div>
  

<?php include("inc/bottom.php"); ?>