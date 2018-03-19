<?php
require 'db.php';
/* Displays user information and some useful messages */
echo "DEALERSHIP OWNER<BR>";
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
    echo "Commission %: ".$com."<br>";
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