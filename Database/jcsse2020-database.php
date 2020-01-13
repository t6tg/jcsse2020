<?php
// if(round(microtime(true) * 1000) > "1606669200"){
//     echo "<center>";
//     echo "<h1 style='color:red;font-size:60;'>Server Closed</h1>";
//     echo "</center>";
// }else{
$host = "localhost";
$user = "root";
$pass = "root";
$dbname = "jcsse";
$conn = new mysqli($host, $user, $pass, $dbname);
mysqli_query($conn, "SET character_set_results=utf8");
if ($conn->connect_error) {
    echo "<center>";
    echo "<h1 style='color:red;font-size:60;'>Alert !!</h1>";
    echo "<h1>";
    die("Connection failed : " . $conn->connect_error);
    echo "</h1>";
}
// }
