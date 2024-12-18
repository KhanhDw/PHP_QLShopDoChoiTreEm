<?php 
session_start();
if(!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/donhang.php");
require("../../model/chitietdonhang.php");
require("../../model/dochoi.php");
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
$d = new DOCHOI();
$dc = new DIACHI();

switch($action){
    case "xem":
        $donhang = $dh->laydonhang();
		include("main.php");
        break;	
    case "chitiet":
        if(isset($_GET["id"])){ 
            $sach = $d->laydochoi();
            $diachi = $dc->laydiachi();
            $ctdonhang = $ctdh->layctdonhangtheoiddonhang($_GET["id"]);
            $h = $dh->laydonhangtheoid($_GET["id"]);   
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
        $ctdonhang = $ctdh->layctdonhangtheoiddonhang($_GET["mdh"]);
        $sach = $d->laydochoi();
        if($_GET["trangthai"]==3){
            foreach($ctdonhang as $ct)
                foreach($sach as $d)
                    if($ct["sach_id"]==$d["id"] && $ct["soluong"]>$d["soluong"]){
                        $message = "Số lượng đồ chơi không đủ - ID: " . $d["id"] . " - Tên đồ chơi: " . $d["tendochoi"];
                        echo '<script> alert("' . $message . '"); </script>';
                        $donhang = $dh->laydonhang();  
                        include("main.php");
                        return;
                    }          
        }
        foreach($ctdonhang as $ct)
            foreach($sach as $sh)
                if($ct["dochoi_id"]==$sh["id"]){
                    $ss = new DOCHOI();
                    $ss->capnhatsoluong($sh["id"], $ct["soluong"]);
                }               
        // hiển thị ds
        $donhang = $dh->laydonhang();  
        include("main.php");
        break;
    default:
        break;
}
?>
