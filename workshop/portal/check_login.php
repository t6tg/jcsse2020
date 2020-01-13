<?php
if (!$_POST['username']) {
    echo "<script>alert('No value input')</script>";
    header("Refresh:0; url=index.php");
} else {
    session_start();
    require_once("../../Database/jcsse2020-database.php");
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $sql = "select * from workshop_author where username='" . $username . "' and password='" . $password . "'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
    if (!$result) {
        echo "<script>alert('username or password wrong')</script>";
        header("Refresh:0 , url=logout.php");
    } else {
        
        $_SESSION['username'] = $result['username'];
        $_SESSION['name'] = $result['fname']. " " . $result['lname'];
        $_SESSION['permission'] = $result['permission'];
        $_SESSION['email'] = $result['email'];
        header("location: ./main");
        session_write_close();
    }
}
mysqli_close($conn);
