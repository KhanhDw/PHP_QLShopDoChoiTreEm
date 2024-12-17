<?php 
session_start();
require("../model/database.php");
require("../model/danhmuc.php");
require("../model/dochoi.php");
require("../model/giohang.php");
require("../model/nguoidung.php");
require("../model/donhang.php");
require("../model/chitietdonhang.php");
require("../model/giamgia.php");
require("../model/danhgia.php");


$dm = new DANHMUC();
$danhmuc = $dm->laydanhmuc();
$dc = new DOCHOI();
$dochoixemnhieu = $dc->laydochoixemnhieu();
$dh = new DONHANG();
$ctdh = new CHITIETDONHANG();
$gh = new GIOHANG();
$gg = new GIAMGIA();
$dg = new DANHGIA();

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="null"; 
}


switch($action)
{
    case "null": 	
    	$dochoi = $dc->laydochoi();	
        include("main.php");
        break;
    case "group": 
        if(isset($_REQUEST["id"])){
            $madm = $_REQUEST["id"];
            $dmuc = $dm->laydanhmuctheoid($madm);
            $tendm =  $dmuc["tendanhmuc"];   
            $dochoi = $dc->laydochoitheodanhmuc($madm);
            include("group.php");
        }
        else{
            include("main.php");
        }
        break;
    case "detail": 
        if(isset($_GET["id"])){
            $dochoi = $_GET["id"];
            // tăng lượt xem lên 1
            $dc->tangluotxem($dochoi);
            // lấy thông tin chi tiết đồ chơi
            $dcct = $dc->laydochoitheoid($dochoi);
            // lấy các đồ chơi cùng danh mục
            $madm = $dcct["danhmuc_id"];
            $dochoi = $dc->laydochoitheodanhmuc($madm);
            include("detail.php");
        }
        break;
    case "chovaogio":  
        if(!isset($_SESSION["nguoidung"])){
            include("loginform.php");
            break;
        }
        $ghang = new GIOHANG();  
        if(isset($_GET["id"]))
            $ghang->setdochoi_id($_GET["id"]);
            
        $ghang->setnguoidung_id($_SESSION["nguoidung"]["id"]);
        if(empty($gh->kiemtragiohang($ghang))){
            if(isset($_POST["soluong"]))
                 $ghang->setsoluong($_POST["soluong"]);
            else
                $ghang->setsoluong(1);
            $gh->themgiohang($ghang);
        } else {
            $gh->congsoluong($ghang);
        }
    
            $giohang = $gh->laygiohangtheoidnguoidung($_SESSION["nguoidung"]["id"]);  
            $dochoi = $dc->laydochoi();	 
            include("cart.php");
            break;
        case "giohang":  
            if(!isset($_SESSION["nguoidung"])){
                include("loginform.php");
                break;
            }
            $giohang = $gh->laygiohangtheoidnguoidung($_SESSION["nguoidung"]["id"]);   
            $dochoi = $dc->laydochoi();	   
            include("cart.php");
            break;
        }
?>