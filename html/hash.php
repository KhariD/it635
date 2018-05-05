<?php
require 'db.php';

$sql = "select * from users";
$result = $conn->query($sql);


while($row = $result->fetch_assoc())
{
    $user = $row['user'];
    $hash = password_hash($row['pass'], PASSWORD_DEFAULT);
    $sql = "update users set pass = '$hash' where user = $user";
    mysqli_query($conn, $sql);
    echo $user.PHP_EOL;
    echo $hash.PHP_EOL;
    echo $sql.PHP_EOL;
}
?>