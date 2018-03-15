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

        echo "Showing Vehicles";
        
        
        $sql = "select * from vehicle";
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