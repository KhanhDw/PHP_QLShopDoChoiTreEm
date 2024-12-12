<?php 
session_start();
if(!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/danhmuc.php");
require("../../model/dochoi.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$dm = new DANHMUC();
$dc = new DOCHOI();

switch($action){
    case "xem":
        $dochoi = $dc->laydochoi();
		include("main.php");
        break;
	case "them":
		$danhmuc = $dm->laydanhmuc();
		include("addform.php");
        break;
	case "xulythem":	
		// xử lý file upload
		$hinhanh = "images/products/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
		$duongdan = "../../" . $hinhanh; // nơi lưu file upload (đường dẫn tính theo vị trí hiện hành)
		move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
		// xử lý thêm		
        $dchoi = new DOCHOI();
		$dchoi->settendochoi($_POST["txttendochoi"]);
        $dchoi->setthuonghieu($_POST["txtthuonghieu"]);
        $dchoi->setxuatxu($_POST["txtxuatxu"]);
        $dchoi->setdotuoi($_POST["txtdotuoi"]);
        $dchoi->setnamsanxuat($_POST["txtnamsanxuat"]);
		$dchoi->setmota($_POST["txtmota"]);
		$dchoi->setgiagoc($_POST["txtgiagoc"]);
		$dchoi->setgiam($_POST["txtgiam"]);
		$dchoi->setsoluong($_POST["txtsoluong"]);
		$dchoi->setdanhmuc_id($_POST["optdanhmuc"]);
        $dchoi->sethinhanh($hinhanh);
		$dc->themdochoi($dchoi);
		$dochoi = $dc->laydochoi();
		include("main.php");
        break;
	case "xoa":
		if(isset($_GET["id"])){
            $dchoi = new DOCHOI();        
            $dchoi->setid($_GET["id"]);
			$dc->xoadochoi($dchoi);
        }
		$dochoi = $dc->laydochoi();
		include("main.php");
		break;	
    case "chitiet":
        if(isset($_GET["id"])){ 
            $m = $dc->laydochoitheoid($_GET["id"]);            
            include("detail.php");
        }
        else{
            $dochoi = $dc->laydochoi();        
            include("main.php");            
        }
        break;
    case "sua":
        if(isset($_GET["id"])){ 
            $m = $dc->laydochoitheoid($_GET["id"]);
            $danhmuc = $dm->laydanhmuc(); 
            include("updateform.php");
        }
        else{
            $dochoi = $dc->laydochoi();        
            include("main.php");            
        }
        break;
    case "xulysua":
        $dchoi = new DOCHOI();
        $dchoi->setid($_POST["txtid"]);
        $dchoi->setdanhmuc_id($_POST["optdanhmuc"]);
        $dchoi->settendochoi($_POST["txttendochoi"]);
        $dchoi->setthuonghieu($_POST["txtthuonghieu"]);
        $dchoi->setxuatxu($_POST["txtxuatxu"]);
        $dchoi->setdotuoi($_POST["txtdotuoi"]);
        $dchoi->setnamsanxuat($_POST["txtnamsanxuat"]);
        $dchoi->setmota($_POST["txtmota"]);
        $dchoi->setgiagoc($_POST["txtgiagoc"]);
        $dchoi->setgiam($_POST["txtgiam"]);
        $dchoi->setsoluong($_POST["txtsoluong"]);
        $dchoi->sethinhanh($_POST["txthinhcu"]);

        // upload file mới (nếu có)
        if($_FILES["filehinhanh"]["name"]!=""){
            // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ...       
            $hinhanh = "images/" . basename($_FILES["filehinhanh"]["name"]);// đường dẫn lưu csdl
            $dchoi->sethinhanh($hinhanh);
            $duongdan = "../../" . $hinhanh; // đường dẫn lưu upload file        
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }
        
        // sửa mặt hàng
        $dc->suadochoi($dchoi);         
    
        // hiển thị ds mặt hàng
        $dochoi = $dc->laydochoi();    
        include("main.php");
        break;

    default:
        break;
}
?>
