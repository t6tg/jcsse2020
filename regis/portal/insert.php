<?php
require_once "../../Database/jcsse2020-database.php";
$total = 0;
$fname = html_entity_decode(trim($_POST['fname']));
$lname = html_entity_decode(trim($_POST['lname']));
$username = html_entity_decode(trim($_POST['username']));
$password = md5(html_entity_decode(trim($_POST['password'])));
$nation = html_entity_decode(trim($_POST['nation']));
$identify = html_entity_decode(trim($_POST['identify']));
$organization = html_entity_decode(trim($_POST['organization']));
$section = html_entity_decode(trim($_POST['section']));
$title = html_entity_decode(trim($_POST['mytitle']));
$exbanquet = html_entity_decode(trim($_POST['exbanquet']));
$welcome = html_entity_decode(trim($_POST['welcome']));
$country = html_entity_decode(trim($_POST['country']));
$email = html_entity_decode(strtolower(trim($_POST['email'])));
$phone = html_entity_decode(trim($_POST['phone']));
$banquet = html_entity_decode(trim($_POST['banquet']));
$special = html_entity_decode(trim($_POST['special']));
$workshop = html_entity_decode(trim($_POST['workshop']));
$menu = html_entity_decode(trim($_POST['menu']));
$note = html_entity_decode(trim($_POST['note']));
$ieee = html_entity_decode(trim($_POST['ieee']));
$file = html_entity_decode(trim($_POST['ieeefile']));
$payment = html_entity_decode(trim($_POST['payment']));
$foreigner = 0;
$unique = md5(uniqid($fname + $lname + rand(), true));
$date = 1582650000000;
$price_early = [4500, 5500];
$price_general = [5500, 6500];
$time_stamp = Date('d-m-Y h:i:s');
$ieee_ch = 1;

$row_ch = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `author` WHERE ( `username` = '" . $_POST['username'] . "' )"));
if ($row_ch > 0) {?>
<script>
alert("Sorry, this username already exists in the system.");
window.location = "register.php";
</script>
<?php
} else if (round(microtime(true) * 1000) < $date){
    if ($fname != "" && $title != "" && $lname != "" && $username != "" && $password != "" && $identify != "" && $welcome != "" && $welcome != "" && $exbanquet != "" && $organization != "" && $section != "" && $country != "" && $email != "" && $phone != "" && $banquet != "" && $special != "" && $ieee != "" && $payment != "") {
        if ($ieee == '1') {
            move_uploaded_file($_FILES["ieeefile"]["tmp_name"], "fad5725438f4a054f71d6b9aa9a13fa3/" . $username . ".jpg");
            if (round(microtime(true) * 1000) < $date) {
                $total += $price_early[0];
            } else {
                $total += $price_general[0];
            }
            if ($country != 'Thailand') {
                $total += $foreigner;
            }
            if ($special == 'other') {
                $special = $menu;
            }
            $ieee_ch = 0;
        } else if ($ieee == '0') {
            if (round(microtime(true) * 1000) < $date) {
                $total += $price_early[1];
            } else {
                $total += $price_general[1];
            }
            if ($country != 'Thailand') {
                $total += $foreigner;
            }
            if ($special == 'other') {
                $special = $menu;
            }
        }
        //pay
        if ($payment == '1') {
            $sql = "INSERT INTO author (username,password,title,fname,lname,identity,organization,section,country,nationality,email,phone,banquet,extra_banquet,welcome,food,note,member,payment_method,pay_st,workshop,member_ch) VALUES ('$username','$password','$title','$fname','$lname','$identify','$organization','$section','$country','$nation','$email','$phone','$banquet','$exbanquet','$welcome','$special','$note','$ieee','$payment','','$workshop','$ieee_ch')";
            if (mysqli_query($conn, $sql)) {
                header("Refresh:0,url=./");
            } else {
                echo "<script>alert('ERROR')</script>";
                header("Refresh:0,url=./register.php");
            }
        } else {
            $sql = "INSERT INTO author (username,password,title,fname,lname,identity,organization,section,country,nationality,email,phone,banquet,extra_banquet,welcome,food,note,member,payment_method,pay_st,workshop,member_ch) VALUES ('$username','$password','$title','$fname','$lname','$identify','$organization','$section','$country','$nation','$email','$phone','$banquet','$exbanquet','$welcome','$special','$note','$ieee','$payment','','$workshop','$ieee_ch')";
            if (mysqli_query($conn, $sql)) {
                header("Refresh:0,url=./");
            } else {
                echo "<script>alert('ERROR')</script>";
                header("Refresh:0,url=./register.php");
            }
        }
        ////
    } else {
          echo '<script>alert("timeout")</script>';
          header('Refresh:0,url=index.php');
    }
}
mysqli_close($conn);
?>
