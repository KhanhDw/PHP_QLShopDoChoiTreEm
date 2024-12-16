<?php
class GIAMGIA{
    private $id;
    private $chuongtrinhgiam;
    private $phantramgiamgia;
    private $tiengiamtoida;
    private $donhangtoithieu;
    private $tgbatdau;
    private $tgketthuc;

    public function getid(){
        return $this->id;
    }
    public function setid($value){
        $this->id = $value;
    }

    public function getchuongtrinhgiam(){
        return $this->chuongtrinhgiam;
    }
    public function setchuongtrinhgiam($value){
        $this->chuongtrinhgiam = $value;
    }

    public function getphantramgiamgia(){
        return $this->phantramgiamgia;
    }
    public function setphantramgiamgia($value){
        $this->phantramgiamgia = $value;
    }
    
    public function gettiengiamtoida(){
        return $this->tiengiamtoida;
    }
    public function settiengiamtoida($value){
        $this->tiengiamtoida = $value;
    }

    public function getdonhangtoithieu(){
        return $this->donhangtoithieu;
    }
    public function setdonhangtoithieu($value){
        $this->donhangtoithieu = $value;
    }

    public function gettgbatdau(){
        return $this->tgbatdau;
    }
    public function settgbatdau($value){
        $this->tgbatdau = $value;
    }

    public function gettgketthuc(){
        return $this->tgketthuc;
    }

    public function settgketthuc($value){
        $this->tgketthuc = $value;
    }

    public function laygiamgia(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM giamgia";
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

    public function themgiamgia($giamgia){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO giamgia(chuongtrinhgiam, phantramgiamgia, tiengiamtoida, donhangtoithieu, tgbatdau, tgketthuc) 
                        VALUES(:chuongtrinhgiam, :phantramgiamgia, :tiengiamtoida, :donhangtoithieu, :tgbatdau, :tgketthuc)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":chuongtrinhgiam", $giamgia->chuongtrinhgiam);
            $cmd->bindValue(":phantramgiamgia", $giamgia->phantramgiamgia);
            $cmd->bindValue(":tiengiamtoida", $giamgia->tiengiamtoida);
            $cmd->bindValue(":donhangtoithieu", $giamgia->donhangtoithieu);
            $cmd->bindValue(":tgbatdau", $giamgia->tgbatdau);
            $cmd->bindValue(":tgketthuc", $giamgia->tgketthuc);
            $result = $cmd->execute();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function suagiamgia($giamgia){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE giamgia SET chuongtrinhgiam=:chuongtrinhgiam, 
                                        phantramgiamgia=:phantramgiamgia,
                                        tiengiamtoida=:tiengiamtoida,
                                        donhangtoithieu=:donhangtoithieu,
                                        tgbatdau=:tgbatdau,
                                        tgketthuc=:tgketthuc
                                        WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":chuongtrinhgiam", $giamgia->chuongtrinhgiam);
            $cmd->bindValue(":phantramgiamgia", $giamgia->phantramgiamgia);
            $cmd->bindValue(":tiengiamtoida", $giamgia->tiengiamtoida);
            $cmd->bindValue(":donhangtoithieu", $giamgia->donhangtoithieu);
            $cmd->bindValue(":tgbatdau", $giamgia->tgbatdau);
            $cmd->bindValue(":tgketthuc", $giamgia->tgketthuc);
            $cmd->bindValue(":id", $giamgia->id);
            $result = $cmd->execute();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function xoagiamgia($giamgia){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM giamgia WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $giamgia->id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function laygiamgiatheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM giamgia WHERE id=:id";
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
