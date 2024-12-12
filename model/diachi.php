<?php
class DIACHI{
	
	// Thêm địa chỉ mới, trả về khóa của dòng mới thêm
	private $id;
	private $nguoidung_id;
	private $thongtindiachi;

	public function getid(){ return $this->id; }
    public function setid($value){ $this->id = $value; }
	public function getnguoidung_id(){ return $this->nguoidung_id; }
    public function setnguoidung_id($value){ $this->nguoidung_id = $value; }
	public function getthongtindiachi(){ return $this->thongtindiachi; }
    public function setthongtindiachi($value){ $this->thongtindiachi = $value; }

	public function themdiachi($nguoidung_id,$thongtindiachi){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO diachi(nguoidung_id, thongtindiachi) VALUES(:nguoidung_id, :thongtindiachi)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':nguoidung_id',$nguoidung_id);			
			$cmd->bindValue(':thongtindiachi',$thongtindiachi);			
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

	// Lấy địa chỉ của khách
    public function laydiachikhachhang($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM diachi WHERE nguoidung_id=:id AND macdinh=1 LIMIT 1";
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

}
?>
