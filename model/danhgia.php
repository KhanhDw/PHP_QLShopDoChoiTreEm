<?php
class DANHGIA{
    private $id;
    private $dochoi_id;
    private $nguoidung_id;
    private $binhluan;
    private $chatluong;

    public function getid(){
        return $this->id;
    }

    public function setid($value){
        $this->id = $value;
    }

    public function getdochoi_id(){
        return $this->dochoi_id;
    }

    public function setdochoi_id($value){
        $this->dochoi_id = $value;
    }

    public function getnguoidung_id(){
        return $this->nguoidung_id;
    }

    public function setnguoidung_id($value){
        $this->nguoidung_id = $value;
    }

    public function getbinhluan(){
        return $this->binhluan;
    }

    public function setbinhluan($value){
        $this->binhluan = $value;
    }

    public function getchatluong(){
        return $this->chatluong;
    }

    public function setchatluong($value){
        $this->chatluong = $value;
    }


    public function laydanhgia(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM danhgia";
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

    public function laydanhgiatheoiddochoi($dochoi_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM danhgia WHERE dochoi_id=:dochoi_id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":dochoi_id", $dochoi_id);
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

    public function themdanhgia($danhgia){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO danhgia(dochoi_id, nguoidung_id, binhluan, chatluong) VALUES(:dochoi_id, :nguoidung_id, :binhluan, :chatluong)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":dochoi_id", $danhgia->dochoi_id);
            $cmd->bindValue(":nguoidung_id", $danhgia->nguoidung_id);
            $cmd->bindValue(":binhluan", $danhgia->binhluan);
            $cmd->bindValue(":chatluong", $danhgia->chatluong);
            $result = $cmd->execute();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function suadanhgia($danhgia){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE danhgia SET binhluan=:binhluan, chatluong=:chatluong WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":binhluan", $danhgia->binhluan);
            $cmd->bindValue(":chatluong", $danhgia->chatluong);
            $cmd->bindValue(":id", $danhgia->id);
            $result = $cmd->execute();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function xoadanhgia($danhgia){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM danhgia WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $danhgia->id);
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