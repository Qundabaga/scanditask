<?php

interface Products{
    public function add_Product($post);
}

trait Displaying{
    public function displayProduct()
    {
        $query = "SELECT * FROM product";
        $result = $this->con->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] =  $row;
            }
            return $data;
        } else {
            echo "No found records";
        }
    }
}

trait Deletion{
    public function delete($sku)
    {
        $query = "DELETE FROM product WHERE SKU = '$sku'";
        $sql = $this->con->query($query);
    }
}

class Product{
    private $servername = "localhost";
    private $username = "id18695872_productdata";
    private $password = "88131RITCjmR=A";
    private $database = "id18695872_product";
    public $con;
    public $errors = [];

    use Displaying;
    use Deletion;

    public function __construct()
    {
        $this->con = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if (mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
        } else {
            return $this->con;
        }
    }
}
class DVD extends Product implements Products{
    public function add_Product($post){
        $SKU = $this->con->escape_string($_POST['sku']);
        $Name = $this->con->escape_string($_POST['name']);
        $Price = $this->con->escape_string($_POST['price']);
        $Type = $this->con->escape_string($_POST['productType']);
        $Size = $this->con->escape_string($_POST['size']);
        $query = "INSERT INTO `product` (`SKU`,`Name`,`Price`,`Type`,`Size`) VALUES ('$SKU','$Name','$Price','$Type','$Size')";
        $sql = $this->con->query($query);
        if ($sql == true) {
            echo "ok";
        }else{
            echo "bad"; 
        }
    }
}

class Furniture extends Product implements Products{
    public function add_Product($post){
        $SKU = $this->con->escape_string($_POST['sku']);
        $Name = $this->con->escape_string($_POST['name']);
        $Price = $this->con->escape_string($_POST['price']);
        $Type = $this->con->escape_string($_POST['productType']);
        $Width = $this->con->escape_string($_POST['width']);
        $Length = $this->con->escape_string($_POST['length']);
        $Height = $this->con->escape_string($_POST['height']);
        $query = "INSERT INTO `product` (`SKU`,`Name`,`Price`,`Type`,`Width`,`Length`,`Height`) VALUES ('$SKU','$Name','$Price','$Type','$Width','$Length','$Height')";
        $sql = $this->con->query($query);
        if ($sql == true) {
            echo "ok";
        }else{
            echo "bad"; 
        }
    }
}

class Book extends Product implements Products{
    public function add_Product($post){
        $SKU = $this->con->escape_string($_POST['sku']);
        $Name = $this->con->escape_string($_POST['name']);
        $Price = $this->con->escape_string($_POST['price']);
        $Type = $this->con->escape_string($_POST['productType']);
        $Weight = $this->con->escape_string($_POST['weight']);
        $query = "INSERT INTO `product` (`SKU`,`Name`,`Price`,`Type`,`Weight`) VALUES ('$SKU','$Name','$Price','$Type','$Weight')";
        $sql = $this->con->query($query);
        if ($sql == true) {
            echo "ok";
        }else{
            echo "bad"; 
        }
    }
}

?>
