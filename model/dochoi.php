<?php
class DOCHOI{
    // khai báo các thuộc tính
    private $id;
    private $tendochoi;
    private $thuonghieu;
    private $danhmuc_id;
    private $xuatxu;
    private $dotuoi;
    private $namsanxuat;
    private $hinhanh;
    private $mota;
    private $giagoc;
    private $soluong;
    private $giam;
    private $luotxem;
    private $luotmua;
    private $luotdanhgia;

    public function getid(){ return $this->id; }
    public function setid($value){ $this->id = $value; }
    public function gettendochoi(){ return $this->tendochoi; }
    public function settendochoi($value){ $this->tendochoi = $value; }
    public function getthuonghieu(){ return $this->thuonghieu; }
    public function setthuonghieu($value){ $this->thuonghieu = $value; }
    public function getmota(){ return $this->mota; }
    public function setmota($value){ $this->mota = $value; }
    public function getgiagoc(){ return $this->giagoc; }
    public function setgiagoc($value){ $this->giagoc = $value; }
    public function getsoluong(){ return $this->soluong; }
    public function setsoluong($value){ $this->soluong = $value; }
    public function gethinhanh(){ return $this->hinhanh; }
    public function sethinhanh($value){ $this->hinhanh = $value; }
    public function getdanhmuc_id(){ return $this->danhmuc_id; }
    public function setdanhmuc_id($value){ $this->danhmuc_id = $value; }
    public function getluotxem(){ return $this->luotxem; }
    public function setluotxem($value){ $this->luotxem = $value; }
    public function getluotmua(){ return $this->luotmua; }
    public function setluotmua($value){ $this->luotmua = $value; }
    public function getluotdanhgia(){ return $this->luotdanhgia; }
    public function setluotdanhgia($value){ $this->luotdanhgia = $value; }
    public function getxuatxu(){ return $this->xuatxu; }
    public function setxuatxu($value){ $this->xuatxu = $value; }
    public function getdotuoi(){ return $this->dotuoi; }
    public function setdotuoi($value){ $this->dotuoi = $value; }
    public function getnamsanxuat(){ return $this->namsanxuat; }
    public function setnamsanxuat($value){ $this->namsanxuat = $value; }
    public function getgiam(){ return $this->giam; }
    public function setgiam($value){ $this->giam = $value; }


    // Lấy danh sách
    public function laydochoi(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM dochoi ORDER BY id DESC";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
	// Lấy danh sách mặt hàng thuộc 1 danh mục
    public function laydochoitheodanhmuc($danhmuc_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM dochoi WHERE danhmuc_id=:madm" ;
            $cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":madm",$danhmuc_id);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy mặt hàng theo id
    public function laydochoitheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM dochoi WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->fetch();             
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật lượt xem
    public function tangluotxem($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE dochoi SET luotxem=luotxem+1 WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Lấy mặt hàng xem nhiều
    public function laydochoixemnhieu(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM dochoi ORDER BY luotxem DESC LIMIT 3";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }



}
?>
