<?php 
session_start();
if(!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/donhang.php");
require("../../model/ctdonhang.php");
require("../../model/sach.php");
require("../../model/diachi.php");


// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$dh = new DONHANG();
$ctdh = new CHITIETDONHANG();
$s = new DOCHOI();
$dc = new DIACHI();

switch($action){
    case "xem":
        $donhang = $dh->laydonhang();
        $trangthai = $tt->laytrangthai();
		include("main.php");
        break;	
    case "chitiet":
        if(isset($_GET["id"])){ 
            $sach = $s->laysach();
            $diachi = $dc->laydiachi();
            $ctdonhang = $ctdh->layctdonhangtheoiddonhang($_GET["id"]);
            $h = $dh->laydonhangtheoid($_GET["id"]);  
            $trangthai = $tt->laytrangthai();      
            include("detail.php");
        }
        else{
            $donhang = $dh->laydonhang();        
            include("main.php");            
        }
        break;
    case "loai":
        $dhcn = new DONHANG();
        $dhcn->setid($_GET["mdh"]);
        $dhcn->setloai_trangthai($_GET["trangthai"]);
        $ctdonhang = $ctdh->layctdonhangtheoiddonhang($_GET["mdh"]);
        $sach = $s->laysach();
        if($_GET["trangthai"]==3){
            foreach($ctdonhang as $ct)
                foreach($sach as $s)
                    if($ct["sach_id"]==$s["id"] && $ct["soluong"]>$s["soluong"]){
                        $message = "Số lượng sách không đủ - ID: " . $s["id"] . " - Tên sách: " . $s["tensach"];
                        echo '<script> alert("' . $message . '"); </script>';
                        $donhang = $dh->laydonhang();  
                        $trangthai = $tt->laytrangthai();  
                        include("main.php");
                        return;
                    }          
        }
        foreach($ctdonhang as $ct)
            foreach($sach as $sh)
                if($ct["sach_id"]==$sh["id"]){
                    $ss = new SACH();
                    $ss->capnhatsoluong($sh["id"], $ct["soluong"]);
                }          
        $dh->capnhattrangthai($dhcn);        
        // hiển thị ds
        $donhang = $dh->laydonhang();  
        $trangthai = $tt->laytrangthai();  
        include("main.php");
        break;
    default:
        break;
}
?>
