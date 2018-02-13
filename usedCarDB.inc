<?php

class CarAccess
{

private $db;

public function __construct($database)
{
    $this->db = new mysqli("localhost", "root", "monkey", $database);
    if ($this->db->connect_errno != 0)
    {
        echo "error connecting to database: ".$this->db->connect_error.PHP_EOL;
        exit();
    }
}

public function __destruct()
{
    if (isset($this->db))
    {
        $this->db->close();
    }
}

public function addVehicleRecord($vin, $make, $model, $year, $miles, $type, $color, $trans, $price)
{
    $v = $this->db->real_escape_string($vin);
    $m = $this->db->real_escape_string($make);
    $mo = $this->db->real_escape_string($model);
    $y = $this->db->real_escape_string($year);
    $mi = $this->db->real_escape_string($miles);
    $t = $this->db->real_escape_string($type);
    $c = $this->db->real_escape_string($color);
    $tr = $this->db->real_escape_string($trans);
    $p = $this->db->real_escape_string($price);

    $query = "insert into vehicle(vin,make,model,year,miles,type,color,trans,price) VALUES ('$v','$m','$mo','$y','$mi','$t','$c','$tr','$p');";

    echo "executing SQL statement:\n".$query."\n";
    if (!$this->db->query($query))
    {
        echo "failed to insert record for $studentName".PHP_EOL;
    }
}

}

?>