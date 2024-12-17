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
        
         case "doisoluong":
                $ghang = new GIOHANG(); 
                if(isset($_GET["idgh"]))
                    $ghang->setid($_GET["idgh"]);
                if(isset($_GET["soluong"])){
                    if($_GET["soluong"]==0){
                        $gh->xoagiohang($_GET["idgh"]);
                        $giohang = $gh->laygiohangtheoidnguoidung($_SESSION["nguoidung"]["id"]);   
                        $dochoi = $dc->laydochoi();	   
                        include("cart.php");
                        break;
                    }else {
                        $ghang->setsoluong($_GET["soluong"]);
                    }
                }
                $ghang->setnguoidung_id($_SESSION["nguoidung"]["id"]);
                $gh->capnhatsoluong($ghang);
                $giohang = $gh->laygiohangtheoidnguoidung($_SESSION["nguoidung"]["id"]); 
                $dochoi = $dc->laydochoi();	     
                include("cart.php");
                break;
         case "xoagiohang":
                if(isset($_GET["id"]))
                    $gh->xoagiohang($_GET["id"]);
                $giohang = $gh->laygiohangtheoidnguoidung($_SESSION["nguoidung"]["id"]);   
                $dochoi = $dc->laydochoi();	   
                include("cart.php");
                break;
            case "lapdon":        
                $giohang = $gh->laygiohangtheoidnguoidung($_SESSION["nguoidung"]["id"]);   
                $dochoi = $dc->laydochoi();
                $giamgia = $gg->laygiamgia();
            // $h = $dh->laydonhangtheoid($_GET["id"]);
                $chons = $_POST['ghchon']; 
                if (!empty($chons)) {
                    $tongtien = 0;
                    $tiengiam = 0;
                    $thanhtien = 0;
                    foreach($giohang as $g)
                        foreach($dochoi as $sh)
                            foreach($chons as $chon)
                                if($g["dochoi_id"]==$sh["id"] && $g["id"]==$chon) {
                                    $tongtien += $sh["giagoc"]*$g["soluong"];
                                    $tiengiam += $sh["giagoc"]*$g["soluong"]*$sh["giam"]/100;
                                }
                    $thanhtien = $tongtien - $tiengiam;
                    include("order.php");
                }
                // $combo = $cb->laycombo();
                $giohang = $gh->laygiohangtheoidnguoidung($_SESSION["nguoidung"]["id"]);   
                $dochoi = $dc->laydochoi();	   
                include("cart.php");
                break;
        case "thanhtoan":
                if (!empty($_SESSION["numbers"])) {
                    $chons = $_SESSION["numbers"];
                    $dhang = new DONHANG();
                    $giohang = $gh->laygiohangtheoidnguoidung($_SESSION["nguoidung"]["id"]); 
                    $dochoi = $dc->laydochoi();
                    $tongtien = 0;
                    $tiengiam = 0;
                    $thanhtien = 0;
                    foreach($giohang as $g)
                        foreach($dochoi as $sh)
                            foreach($chons as $chon)
                                if($g["dochoi_id"]==$sh["id"] && $g["id"]==$chon) {
                                    $tongtien += $sh["giagoc"]*$g["soluong"];
                                    $tiengiam += $sh["giagoc"]*$g["soluong"]*$sh["giam"]/100;
                                }
                    $thanhtien = $tongtien - $tiengiam;
                    $dhang->setnguoidung_id($_SESSION["nguoidung"]["id"]);
                    $dhang->settongtien($tongtien);
                    $dhang->settiengiam($tiengiam);
                    $dhang->setthanhtien($thanhtien);
                    $dhang->setdiachi($_POST["txtdiachi"]);
                    $dh->themdonhang($dhang);
                    $dhang = $dh->laydonhangmoinhat();
                    foreach($giohang as $g)
                        foreach($dochoi as $sh)
                            foreach($chons as $chon)
                                if($g["dochoi_id"]==$sh["id"] && $g["id"]==$chon) {
                                    $ct = new CHITIETDONHANG();
                                    $ct->setdonhang_id($dhang["id"]);
                                    $ct->setdochoi_id($sh["id"]);
                                    $ct->setdongia($sh["giagoc"]-$sh["giagoc"]*$sh["giam"]/100);
                                    $ct->setsoluong($g["soluong"]);
                                    $ct->setthanhtien($ct->getdongia()*$ct->getsoluong());
                                    $ctdh->themctdonhang($ct);
                                    $gh->xoagiohang($g["id"]);
                                }
                    $_SESSION["numbers"] = []; 
                    
                    include("message.php");
                    break;
                }
                $dochoi = $dc->laydochoi();	
                include("main.php");
                break;
        case "dangnhap":
                include("loginform.php");
                break;
        case "xldangnhap":
                $email = $_POST["txtemail"];
                $matkhau = $_POST["txtmatkhau"];
                $nd = new NGUOIDUNG();
                if($nd->kiemtranguoidunghople($email,$matkhau)==TRUE){
                    $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
                    // đọc thông tin (đơn hàng) của kh
                    $donhang = $dh->laydonhangtheoidnguoidung($_SESSION["nguoidung"]["id"]);
                    $ctdonhang = $ctdh->layctdonhang();
                    $dochoi = $dc->laydochoi();
                    include("info.php");
                }
                else{
                    //$tb = "Đăng nhập không thành công!";
                    include("loginform.php");
                }
                break;
        case "thongtin":
                // đọc thông tin các đơn của khách
                    // đọc thông tin (đơn hàng) của kh
                $donhang = $dh->laydonhangtheoidnguoidung($_SESSION["nguoidung"]["id"]);
                $ctdonhang = $ctdh->layctdonhang();
                $dochoi = $dc->laydochoi();
                include("info.php"); // trang info.php hiển thị các đơn đã đặt
                break;
        case "dangxuat":
                unset($_SESSION["nguoidung"]);
                // chuyển về trang chủ
                $dochoi = $dc->laydochoi();   
                include("main.php");
                break;
            default:
                break;
    
        case "danhgia":
            $danhgia = $dg->laydanhgia($_SESSION["dochoi"]["id"]);
            $dochoi = $_POST['dochoi_id'];
            $nguoidung = $_SESSION['nguoidung_id'];
                    
        }
?>