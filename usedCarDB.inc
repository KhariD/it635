<?php

class CarAccess
{

    private $db;

    public function __construct($database)
    {
        $this->db = new mysqli("localhost", "ubuntu", "monkey", $database);
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

    public function validateUser($username, $password)
    {
        $u = $this->db->real_escape_string($username);
        $p = $this->db->real_escape_string($password);

        $q = "select * from users where username = '$u';";

        while ($row = $q->fetch_assoc())
        {
            if ($row["pass"] == $p)
            {
                return true;            
            }
        }
        return false;
    }

    public function addVehicle($vin, $make, $model, $year, $miles, $type, $color, $trans, $price)
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
            echo "failed to insert record for ".$studentName.PHP_EOL;
        }
    }

    public function listVehicles()
    {
        //list vehicles based on automatic, manual or both
        $sql = "select * from vehicle;";

        $sqlResponse = $this->db->query($sql);
        
        $response = array();

        while ($row = $sqlResponse->fetch_assoc())
        {
            $response = $row;
        }

        echo "executing SQL statement:\n".$sql."\n";
        if (!$this->db->query($sql))
        {
            return "failed to insert list vehicles".PHP_EOL; 
        }

        return $response;
    }

    public function showVehicle($vin)
    {
        $sql = "select * from vehicle where vin = '$vin';";

        $sqlResponse = $this->db->query($sql);

        $response = $sqlResponse->fetch_assoc();

        echo "executing SQL statement:\n".$sql."\n";
        if (!$this->db->query($sql))
        {
            return "Vehicle with vin: ".$vin." Does not exist".PHP_EOL; 
        }

        return $response;
    }

    public function createRep($user, $fname, $lname, $phone, $com)
    {
        
        $u = $this->db->real_escape_string($user);
        $f = $this->db->real_escape_string($fname);
        $l = $this->db->real_escape_string($lname);
        $p = $this->db->real_escape_string($phone);
        $c = $this->db->real_escape_string($com);

        $sql = "insert into reps (user, fname, lname, phone, com) values ('$u', '$f', '$l', '$p', '$c');";

        echo "executing SQL statement:".PHP_EOL.$sql.PHP_EOL;
        if (!$this->db->query($sql))
        {
            echo "failed to insert record for ".$user.PHP_EOL;
        }

    }



}

?>