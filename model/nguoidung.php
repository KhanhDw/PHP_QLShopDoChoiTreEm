<?php
class NGUOIDUNG{
	// khai báo các thuộc tính (SV tự viết)
	private $id;
    private $tennguoidung;
	private $email;
	private $matkhau;
	private $sodienthoai;
	private $quyen;
	private $trangthai;
	private $hinhanh;

    public function getid(){
        return $this->id;
    }

    public function setid($value){
        $this->id = $value;
    }

    public function gettennguoidung(){
        return $this->tennguoidung;
    }

    public function settennguoidung($value){
        $this->tennguoidung = $value;
    }

	public function getemail(){
		return $this->email;
	}

	public function setemail($value){
		$this->email = $value;
	}

	public function getmatkhau(){
		return $this->matkhau;
	}

	public function setmatkhau($value){
		$this->matkhau = $value;
	}

	public function getsodienthoai(){
		return $this->sodienthoai;
	}

	public function setsodienthoai($value){
		$this->sodienthoai = $value;
	}

	public function getquyen(){
		return $this->quyen;
	}

	public function setquyen($value){
		$this->quyen = $value;
	}

	public function gettrangthai(){
		return $this->trangthai;
	}

	public function settrangthai($value){
		$this->trangthai = $value;
	}

	public function gethinhanh(){
		return $this->hinhanh;
	}

	public function sethinhanh($value){
		$this->hinhanh = $value;
	}

	public function kiemtranguoidunghople($email,$matkhau){
		$db = DATABASE::connect();
		try{
			$sql = "SELECT * FROM nguoidung WHERE email=:email AND matkhau=:matkhau AND trangthai=1";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(":email", $email);
			$cmd->bindValue(":matkhau", md5($matkhau));
			$cmd->execute();
			$valid = ($cmd->rowCount () == 1);
			$cmd->closeCursor ();
			return $valid;			
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	
	// lấy thông tin người dùng có $email
	public function laythongtinnguoidung($email){
		$db = DATABASE::connect();
		try{
			$sql = "SELECT * FROM nguoidung WHERE email=:email";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(":email", $email);
			$cmd->execute();
			$ketqua = $cmd->fetch();
			$cmd->closeCursor();
			return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	
	// lấy tất cả ng dùng
	public function laydanhsachnguoidung(){
		$db = DATABASE::connect();
		try{
			$sql = "SELECT * FROM nguoidung";
			$cmd = $db->prepare($sql);			
			$cmd->execute();
			$ketqua = $cmd->fetchAll();			
			return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Thêm ng dùng mới, trả về khóa của dòng mới thêm
	// (SV nên truyền tham số là 1 đối tượng kiểu người dùng, không nên truyền nhiều tham số rời rạc như thế này)
	public function themnguoidung($email,$matkhau,$sodienthoai,$tennguoidung,$quyen){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO nguoidung(email,matkhau,sodienthoai,hoten,quyen) VALUES(:email,:matkhau,:sodienthoai,:hoten,:quyen)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':email',$email);
			$cmd->bindValue(':matkhau',md5($matkhau));
			$cmd->bindValue(':sodienthoai',$sodienthoai);
			$cmd->bindValue(':hoten',$tennguoidung);
			$cmd->bindValue(':quyen',$quyen);
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

	// Cập nhật thông tin ng dùng: họ tên, số đt, email, ảnh đại diện 
	// (SV nên truyền tham số là 1 đối tượng kiểu người dùng, không nên truyền nhiều tham số rời rạc như thế này)

}
?>
