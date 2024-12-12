<?php
class GIOHANG{
    private $id;
    private $nguoidung_id;
    private $dochoi_id;
    private $soluong;

    public function getid(){
        return $this->id;
    }

    public function setid($value){
        $this->id = $value;
    }

    public function getnguoidung_id(){
        return $this->nguoidung_id;
    }

    public function setnguoidung_id($value){
        $this->nguoidung_id = $value;
    }

    public function getdochoi_id(){
        return $this->dochoi_id;
    }

    public function setdochoi_id($value){
        $this->dochoi_id = $value;
    }

    public function getsoluong(){
        return $this->soluong;
    }

    public function setsoluong($value){
        $this->soluong = $value;
    }

    public function laygiohangtheoidnguoidung($nguoidung_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM giohang WHERE nguoidung_id=:nguoidung_id";
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

    public function kiemtragiohang($giohang){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM giohang WHERE nguoidung_id=:nguoidung_id AND dochoi_id=:dochoi_id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":nguoidung_id", $giohang->nguoidung_id);
            $cmd->bindValue(":dochoi_id", $giohang->dochoi_id);
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
    
    public function themgiohang($giohang){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO giohang(nguoidung_id, dochoi_id, soluong) VALUES(:nguoidung_id, :dochoi_id, :soluong)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":nguoidung_id", $giohang->nguoidung_id);
            $cmd->bindValue(":dochoi_id", $giohang->dochoi_id);
            $cmd->bindValue(":soluong", $giohang->soluong);
            $result = $cmd->execute();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function capnhatsoluong($giohang){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE giohang SET soluong=:soluong WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":soluong", $giohang->soluong);
            $cmd->bindValue(":id", $giohang->id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function congsoluong($giohang){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE giohang SET soluong=soluong+1 WHERE nguoidung_id=:nguoidung_id AND dochoi_id=:dochoi_id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":nguoidung_id", $giohang->nguoidung_id);
            $cmd->bindValue(":dochoi_id", $giohang->dochoi_id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function xoagiohang($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM giohang WHERE id=:id";
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
}
?>