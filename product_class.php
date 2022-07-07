<?php


class Products 
{
    private $servername = "localhost";
    private $username = "id18695872_productdata";
    private $password = "88131RITCjmR=A";
    private $database = "id18695872_product";
    public $con;
    public $errors = [];

    public function __construct()
    {
        $this->con = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if (mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
        } else {
            return $this->con;
        }
    } 
    public function add_Product($post)
    {
        $SKU = $this->con->escape_string($_POST['sku']);
        $Name = $this->con->escape_string($_POST['name']);
        $Price = $this->con->escape_string($_POST['price']);
        $Type = $this->con->escape_string($_POST['productType']);
        if($Type == 'Furniture'){
            $Width = empty($this->con->escape_string($_POST['width'])) ? NULL : $this->con->escape_string($_POST['width']);
            $Length = empty($this->con->escape_string($_POST['length'])) ? NULL : $this->con->escape_string($_POST['length']);
            $Height = empty($this->con->escape_string($_POST['height'])) ? NULL : $this->con->escape_string($_POST['height']);
            $query = "INSERT INTO `product` (`SKU`,`Name`,`Price`,`Type`,`Width`,`Length`,`Height`) VALUES ('$SKU','$Name','$Price','$Type','$Width','$Length','$Height')";
        }
        elseif($Type == 'Book'){
            $Weight = empty($this->con->escape_string($_POST['weight'])) ? NULL : $this->con->escape_string($_POST['weight']);
            $query = "INSERT INTO `product` (`SKU`,`Name`,`Price`,`Type`,`Weight`) VALUES ('$SKU','$Name','$Price','$Type','$Weight')";
        }
        elseif($Type == 'DVD'){
            $Size = empty($this->con->escape_string($_POST['size'])) ? NULL : $this->con->escape_string($_POST['size']);
            $query = "INSERT INTO `product` (`SKU`,`Name`,`Price`,`Type`,`Size`) VALUES ('$SKU','$Name','$Price','$Type','$Size')";
        }
        /*$price_max = empty($_GET['price-max']) ? 999 : $_GET['price-max']
        $Weight = empty($this->con->escape_string($_POST['weight'])) ? NULL : $this->con->escape_string($_POST['weight']);
        if(empty($this->con->escape_string($_POST['weight']))){$Weight = NULL;} else {$Weight = $this->con->escape_string($_POST['weight']);}
        //$Size = empty($this->con->escape_string($_POST['size'])) ? NULL : $this->con->escape_string($_POST['size']);
        if(empty($this->con->escape_string($_POST['size']))){$Size = NULL;} else {$Size = $this->con->escape_string($_POST['size']);}
        $Width = empty($this->con->escape_string($_POST['width'])) ? NULL : $this->con->escape_string($_POST['width']);
        $Length = empty($this->con->escape_string($_POST['length'])) ? NULL : $this->con->escape_string($_POST['length']);
        $Height = empty($this->con->escape_string($_POST['height'])) ? NULL : $this->con->escape_string($_POST['height']);
        $query = "INSERT INTO `product` (`SKU`,`Name`,`Price`,`Type`,`Weight`,`Size`,`Width`,`Length`,`Height`) VALUES ('$SKU','$Name','$Price','$Type','$Weight','$Size','$Width','$Length','$Height')";*/
        $sql = $this->con->query($query);
        
        if ($sql == true) {
        echo "ok";
        }else{
           echo "bad"; 
        }
    }
    /*
    public function add_DVD($post)
    {
        $SKU = $this->con->escape_string($_POST['SKU']);
        $Name = $this->con->escape_string($_POST['Name']);
        $Price = $this->con->escape_string($_POST['Price']);
        $Type = 'DVD';
        $Size = $this->con->escape_string($_POST['Size']);
        $query = "INSERT INTO `product` (`SKU`,`Name`,`Price`,`Type`,`Size`) VALUES ('$SKU','$Name','$Price','$Type','$Size')";
        $sql = $this->con->query($query);
        if ($sql == true) {
        echo "ok";
        }else{
           echo "bad"; 
        }
    }

    public function add_Furniture($post)
    {
        $SKU = $this->con->escape_string($_POST['SKU']);
        $Name = $this->con->escape_string($_POST['Name']);
        $Price = $this->con->escape_string($_POST['Price']);
        $Type = 'Furniture';
        $Height =  $this->con->escape_string($_POST['Height']);
        $Width =  $this->con->escape_string($_POST['Width']);
        $Length =  $this->con->escape_string($_POST['Length']);
        $query = "INSERT INTO `product` (`SKU`,`Name`,`Price`,`Type`, `Height`, `Width`, `Length`) VALUES ('$SKU','$Name','$Price','$Type','$Height','$Width','$Length')";
        $sql = $this->con->query($query);
        if ($sql == true) {
        echo "ok";
        }else{
            echo "bad";
        }
    }
    */
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
    public function delete($sku)
    {
        $query = "DELETE FROM product WHERE SKU = '$sku'";
        $sql = $this->con->query($query);
        //if ($sql == true) {
        //    echo "ok";
        //} else {
        //    echo "Record does not delete try again";
        //}
    }
}