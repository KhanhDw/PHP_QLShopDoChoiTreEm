<?php
class CHITIETDONHANG{
	
	private $id;
	private $donhang_id;
	private $dochoi_id;
	private $soluong;
	private $thanhtien;
	private $dongia;

	public function getid(){ return $this->id; }
    public function setid($value){ $this->id = $value; }
	public function getdonhang_id(){ return $this->donhang_id; }
    public function setdonhang_id($value){ $this->donhang_id = $value; }
	public function getdochoi_id(){ return $this->dochoi_id; }
    public function setdochoi_id($value){ $this->dochoi_id = $value; }
	public function getsoluong(){ return $this->soluong; }
    public function setsoluong($value){ $this->soluong = $value; }
	public function getthanhtien(){ return $this->thanhtien; }
    public function setthanhtien($value){ $this->thanhtien = $value; }
	public function getdongia(){ return $this->dongia; }
    public function setdongia($value){ $this->dongia = $value; }
	// Thêm chi tiết đơn hàng mới, trả về khóa của dòng mới thêm
	public function themchitietdonhang($donhang_id,$dochoi_id,$dongia,$soluong,$thanhtien){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO donhangct(donhang_id, dochoi_id, dongia, soluong, thanhtien) 
					VALUES(:donhang_id, :dochoi_id, :dongia, :soluong, :thanhtien)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':donhang_id',$donhang_id);			
			$cmd->bindValue(':mathang_id',$dochoi_id);
			$cmd->bindValue(':dongia',$dongia);
			$cmd->bindValue(':soluong',$soluong);
			$cmd->bindValue(':thanhtien',$thanhtien);
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

	public function layctdonhang(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM chitietdonhang ";
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

	public function themctdonhang($ctdonhang){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO ctdonhang(donhang_id, dochoi_id, dongia, soluong, thanhtien) VALUES(:donhang_id, :dochoi_id, :dongia, :soluong, :thanhtien)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":donhang_id", $ctdonhang->donhang_id);
            $cmd->bindValue(":dochoi_id", $ctdonhang->sach_id);
            $cmd->bindValue(":dongia", $ctdonhang->dongia);
            $cmd->bindValue(":soluong", $ctdonhang->soluong);
            $cmd->bindValue(":thanhtien", $ctdonhang->thanhtien);
            $result = $cmd->execute();
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
