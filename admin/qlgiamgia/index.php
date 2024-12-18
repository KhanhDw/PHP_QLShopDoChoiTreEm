<?php 
session_start();
if(!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/giamgia.php");
require("../../model/nguoidung.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$gg = new GIAMGIA();
$nd = new NGUOIDUNG();

switch($action){
    case "xem":
        $giamgia = $gg->laygiamgia();
		include("main.php");
        break;
	case "them":
		$giamgia = $gg->laygiamgia();
		include("addform.php");
        break;
	case "xulythem":	
		// xử lý thêm		
        $ggmoi = new GIAMGIA();
		$ggmoi->setchuongtrinhgiam($_POST["txtchuongtrinhgiam"]);
        $ggmoi->setphantramgiamgia($_POST["txtphantramgiamgia"]);
        $ggmoi->settiengiamtoida($_POST["txttiengiamtoida"]);
        $ggmoi->setdonhangtoithieu($_POST["txtdonhangtoithieu"]);
        $ggmoi->settgbatdau($_POST["txttgbatdau"]);
        $ggmoi->settgketthuc($_POST["txttgketthuc"]);
		$gg->themgiamgia($ggmoi);
		$giamgia = $gg->laygiamgia();
		include("main.php");
        break;

	case "xoa":
		if(isset($_GET["id"])){
            $m = new GIAMGIA();        
            $m->setid($_GET["id"]);
			$gg->xoagiamgia($m);
        }
		$giamgia = $gg->laygiamgia();
		include("main.php");
		break;	
    case "sua":
        if(isset($_GET["id"])){ 
            $m = $gg->laygiamgiatheoid($_GET["id"]);
            include("updateform.php");
        }
        else{
            $giamgia = $gg->laygiamgia();        
            include("main.php");            
        }
        break;
    case "xulysua":
        $ggmoi = new GIAMGIA();
        $ggmoi->setid($_POST["txtid"]);
        $ggmoi->setchuongtrinhgiam($_POST["txtchuongtrinhgiam"]);
        $ggmoi->setphantramgiamgia($_POST["txtphantramgiamgia"]);
        $ggmoi->settiengiamtoida($_POST["txttiengiamtoida"]);
        $ggmoi->setdonhangtoithieu($_POST["txtdonhangtoithieu"]);
        $ggmoi->settgbatdau($_POST["txttgbatdau"]);
        $ggmoi->settgketthuc($_POST["txttgketthuc"]);
        // sửa giảm giá
        $gg->suagiamgia($ggmoi);         
    
        // hiển thị ds 
        $giamgia = $gg->laygiamgia();    
        include("main.php");
        break;

    default:
        break;
}
?>
