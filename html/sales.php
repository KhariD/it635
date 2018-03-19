<?php
require 'db.php';

/* Displays user information and some useful messages */
echo "SALES REPRESENTATIVE<BR>";
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) 
{
  $_SESSION['message'] = "You must log in before viewing your profile page!";

}
else 
{
    // Makes it easier to read
    echo "successfully logged in!!! :))<br>";

    $user = $_SESSION['user'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $phone = $_SESSION['phone'];
    $com = $_SESSION['commission'];

    echo "User: ".$user."<br>";
    echo "First: ".$fname."<br>";
    echo "Last: ".$lname."<br>";
    echo "Phone #: ".$phone."<br>";
    echo "Commission %: ".$com."<br>";
}
?>

<!DOCTYPE html>
<html>
<body>
  <div class="veh">
    <div id="veh">   
        <h1>Welcome Back!</h1>
        <form action="sales.php" method="post" autocomplete="off">
            <button class="button button-block" name="veh" />Show Vehicles</button>
        </form>
    </div><!-- tab-content -->
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{   
    if (isset($_POST['veh'])) 
    { 
        //user logging in
        //display vehicles

        echo "Showing Vehicles For Sale";
        
        
        $sql = "select * from unsold";
        $result = $conn->query($sql);

        echo "<table border='1'>
        <tr>
        <th>Vin</th>
        <th>Make</th>
        <th>Model</th>
        <th>Year</th>
        <th>Miles</th>
        <th>Type</th>
        <th>Color</th>
        <th>Trans</th>
        <th>Price</th>
        </tr>";

        while($row = $result->fetch_assoc())
        {
            echo "<tr>";
            echo "<td>" . $row['vin'] . "</td>";
            echo "<td>" . $row['make'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['year'] . "</td>";
            echo "<td>" . $row['miles'] . "</td>";
            echo "<td>" . $row['type'] . "</td>";
            echo "<td>" . $row['color'] . "</td>";
            echo "<td>" . $row['trans'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
}
?>

<!DOCTYPE html>
<html>
<body>
  <div class="showVeh">
    <div id="veh">   
        <form action="sales.php" method="post" autocomplete="off">
            <br>
            <label>
                Show Vehicle
            </label>
            <br>
            <input type="text" name="showVeh" placeholder="enter vin"/>
            <button class="button button-block" name="showButton" />Show Vehicle</button>
        </form>
    </div><!-- tab-content -->
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{   
    if (isset($_POST['showButton'])) 
    { 
        //user logging in
        //display vehicles

        $vin = $_POST['showVeh'];
        
        $sql = "select * from vehicle where vin = '$vin';";
        $result = $conn->query($sql);
        
        if ($result->num_rows == 0 )
        {
            echo "Vehicle doesn't exist<br>";
            
        }
        else
        {
            echo "<table border='1'>
            <tr>
            <th>Vin</th>
            <th>Make</th>
            <th>Model</th>
            <th>Year</th>
            <th>Miles</th>
            <th>Type</th>
            <th>Color</th>
            <th>Trans</th>
            <th>Price</th>
            </tr>";

            while($row = $result->fetch_assoc())
            {
                echo "<tr>";
                echo "<td>" . $row['vin'] . "</td>";
                echo "<td>" . $row['make'] . "</td>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>" . $row['year'] . "</td>";
                echo "<td>" . $row['miles'] . "</td>";
                echo "<td>" . $row['type'] . "</td>";
                echo "<td>" . $row['color'] . "</td>";
                echo "<td>" . $row['trans'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";

        }
    }
}
?>


<!DOCTYPE html>
<html>
<body>
  <div class="sales">
    <div id="sales">   
        <form action="sales.php" method="post" autocomplete="off">
            <button class="button button-block" name="salesButton" />Show Sales</button>
        </form>
    </div><!-- tab-content -->
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{   
    if (isset($_POST['salesButton'])) 
    { 
        //user logging in
        //display vehicles
        
        $sql = "select * from sales where user = '$user';";
        $result = $conn->query($sql);

        
        if ($result->num_rows == 0 )
        {
            echo "<br>No sales made yet<br>";
        }
        else
        {
            echo "<br>Showing sales made by: <strong>".$fname." ".$lname."!!</strong><br>";
            echo "<table border='1'>
            <tr>
            <th>Date</th>
            <th>Commission</th>            
            <th>Vin</th>
            <th>Make</th>
            <th>Model</th>
            <th>Year</th>
            <th>Miles</th>
            <th>Type</th>
            <th>Color</th>
            <th>Trans</th>
            <th>Price</th>
            </tr>";

            while($row1 = $result->fetch_assoc())
            {
                $sql = "select * from vehicle where vin = '".$row1['vin']."';";
                $res = $conn->query($sql);

                $row = $res->fetch_assoc();

                $commission = $com * $row['price'];

                echo "<tr>";
                echo "<td>" . $row1['date'] . "</td>";
                echo "<td>" . $commission . "</td>";
                echo "<td>" . $row['vin'] . "</td>";
                echo "<td>" . $row['make'] . "</td>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>" . $row['year'] . "</td>";
                echo "<td>" . $row['miles'] . "</td>";
                echo "<td>" . $row['type'] . "</td>";
                echo "<td>" . $row['color'] . "</td>";
                echo "<td>" . $row['trans'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";

        }
    }
}

?>