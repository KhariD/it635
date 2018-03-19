<?php
require 'db.php';
/* Displays user information and some useful messages */
echo "<BR>DEALERSHIP OWNER<BR>";
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) 
{
  $_SESSION['message'] = "You must log in before viewing your profile page!";

}
else {
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
    echo "Commission: ".$com."<br>";
}
?>

<!DOCTYPE html>
<html>
<body>
  <div class="add">
    <div id="add">   
        <form action="owner.php" method="post" autocomplete="off">
            <br>
            <label>
                Add New Vehicle!
            </label>
            <br>
            <input type="text" name="vin" placeholder="Enter vin"/><br>
            <input type="text" name="make" placeholder="Enter make"/><br>
            <input type="text" name="model" placeholder="Enter model"/><br>
            <input type="text" name="year" placeholder="Enter year"/><br>
            <input type="text" name="miles" placeholder="Enter milage"/><br>
            <input type="text" name="type" placeholder="Enter type"/><br>
            <input type="text" name="color" placeholder="Enter color"/><br>
            <input type="text" name="trans" placeholder="Enter trans"/><br>
            <input type="text" name="price" placeholder="Enter price"/><br>
            <button class="button button-block" name="addVeh" />Add Vehicle</button>
        </form>
    </div><!-- tab-content -->
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{   
    if (isset($_POST['addVeh'])) 
    { 
        $vin = $conn->escape_string($_POST['vin']);
        $mk = $conn->escape_string($_POST['make']);
        $md = $conn->escape_string($_POST['model']);
        $yr = $conn->escape_string($_POST['year']);
        $mi = $conn->escape_string($_POST['miles']);
        $ty = $conn->escape_string($_POST['type']);
        $co = $conn->escape_string($_POST['color']);
        $tr = $conn->escape_string($_POST['trans']);
        $pr = $conn->escape_string($_POST['price']);

        //find out if vehicle exists
        $sql = "select * from vehicle where vin = '$vin';";
        $result = $conn->query($sql);
        $result->fetch_assoc();

        if($result->num_rows == 0 )
        {
            $sql = "insert into vehicle (vin, make, model, year, miles, type, color, trans, price)
            values ('$vin', '$mk', '$md', '$yr', '$mi', '$ty', '$co', '$tr', '$pr');";

            if ($conn->query($sql) === TRUE)
            {
                echo "<br>Vehicle Added successfully!<br>";
            }
            else
            {
                echo "<br>Error: ".$sql."<br>".$conn->error;
            }

            $sql = "insert into unsold (vin, make, model, year, miles, type, color, trans, price)
            values ('$vin', '$mk', '$md', '$yr', '$mi', '$ty', '$co', '$tr', '$pr');";

            if ($conn->query($sql) === TRUE)
            {
                echo "<br>:)<br>";
            }
            else
            {
                echo "<br>Error: ".$sql."<br>".$conn->error;
            }
        }
        else
        {
            echo "<br>This vehicle exists already!<br>";
        }
    }
}
?>