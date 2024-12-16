<?php
class CHITIETDONHANG{
    
    // Private properties representing the details of an order item
    private $id;
    private $donhang_id;
    private $dochoi_id;
    private $soluong;
    private $thanhtien;
    private $dongia;

    // Getter and setter methods for each property
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

    /**
     * Add a new order detail to the database
     * 
     * @param int $donhang_id Order ID
     * @param int $dochoi_id Toy ID
     * @param float $dongia Unit price
     * @param int $soluong Quantity
     * @param float $thanhtien Total amount
     * @return int The ID of the newly inserted row
     */
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

    /**
     * Retrieve all order details from the database
     * 
     * @return array An array of all order details
     */
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

    /**
     * Add a new order detail to the database
     * 
     * @param object $ctdonhang An object containing order detail information
     * @return bool True if the insertion was successful, false otherwise
     */
    public function themctdonhang($ctdonhang){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO chitietdonhang(donhang_id, dochoi_id, dongia, soluong, thanhtien) VALUES(:donhang_id, :dochoi_id, :dongia, :soluong, :thanhtien)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":donhang_id", $ctdonhang->donhang_id);
            $cmd->bindValue(":dochoi_id", $ctdonhang->dochoi_id);
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

    /**
     * Retrieve order details for a specific order ID
     * 
     * @param int $donhang_id The ID of the order to retrieve details for
     * @return array An array of order details for the specified order
     */
    public function layctdonhangtheoiddonhang($donhang_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM ctdonhang WHERE donhang_id=:donhang_id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":donhang_id", $donhang_id);
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
