<?php
class DONHANG{
	
	private $id;
	private $nguoidung_id;
	private $tongtien;
	private $thanhtien;
	private $trangthai;
	private $tiengiam;
	private $giamgia;
	private $diachi;

	public function getid(){ return $this->id; }
    public function setid($value){ $this->id = $value; }
	public function getnguoidung_id(){ return $this->nguoidung_id; }
    public function setnguoidung_id($value){ $this->nguoidung_id = $value; }
	public function gettongtien(){ return $this->tongtien; }
    public function settongtien($value){ $this->tongtien = $value; }
	public function getthanhtien(){ return $this->thanhtien; }
    public function setthanhtien($value){ $this->thanhtien = $value; }
	public function gettrangthai(){ return $this->trangthai; }
    public function settrangthai($value){ $this->trangthai = $value; }
	public function gettiengiam(){ return $this->tiengiam; }
    public function settiengiam($value){ $this->tiengiam = $value; }
	public function getgiamgia(){ return $this->giamgia; }
    public function setgiamgia($value){ $this->giamgia = $value; }
	public function getdiachi(){ return $this->diachi; }
    public function setdiachi($value){ $this->diachi = $value; }
	// Thêm đơn hàng mới, trả về khóa của dòng mới thêm
	public function themdonhang($nguoidung_id,$diachi_id,$tongtien,$thanhtien,$trangthai,$tiengiam,$giamgia){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO donhang(nguoidung_id, diachi_id, tongtien, thanhtien, trangthai,tiengiam, giamgia) 
					VALUES(:nguoidung_id,:diachi_id,:tongtien,:thanhtien,:trangthai,:tiengiam,:giamgia)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':nguoidung_id',$nguoidung_id);			
			$cmd->bindValue(':diachi_id',$diachi_id);
			$cmd->bindValue(':tongtien',$tongtien);
			$cmd->bindValue(':thanhtien',$thanhtien);
			$cmd->bindValue(':trangthai',$trangthai);
			$cmd->bindValue(':tiengiam',$tiengiam);
			$cmd->bindValue(':giamgia',$giamgia);
			$cmd->execute();
			$id = $db->lastInsertId();
			return $id;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	public function laydonhangtheoidnguoidung($nguoidung_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM donhang WHERE nguoidung_id=:nguoidung_id ORDER BY id DESC";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":nguoidung_id", $nguoidung_id);
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

	public function laydonhangmoinhat(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM donhang ORDER BY id DESC LIMIT 1";
            $cmd = $dbcon->prepare($sql);
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
	// Đọc ds đơn hàng của 1 khách
}
?>
