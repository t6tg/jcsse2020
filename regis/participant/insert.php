<?php
require_once "../../Database/jcsse2020-database.php";
$total = 0;
$fname = html_entity_decode(trim($_POST['fname']));
$lname = html_entity_decode(trim($_POST['lname']));
$badge = html_entity_decode(trim($_POST['badge']));
$affiliation = html_entity_decode(trim($_POST['affiliation']));
$country = html_entity_decode(trim($_POST['country']));
$email = html_entity_decode(strtolower(trim($_POST['email'])));
$phone = html_entity_decode(trim($_POST['phone']));
$banquet = html_entity_decode(trim($_POST['banquet']));
$special = html_entity_decode(trim($_POST['special']));
$menu = html_entity_decode(trim($_POST['menu']));
$workshop = html_entity_decode(trim($_POST['workshop']));
$note = html_entity_decode(trim($_POST['note']));
$ieee = html_entity_decode(trim($_POST['ieee']));
$file = html_entity_decode(trim($_POST['ieeefile']));
$payment = html_entity_decode(trim($_POST['payment']));
$foreigner = 0;
$shop = 3000;
$unique = md5(uniqid($fname + $lname + rand(), true));
$date = 1582995600000;
$price_early = [4500, 6000, 4500, 3000];
$price_general = [6000, 7500, 5500, 4500];
$time_stamp = Date('d-m-Y h:i:s');
$ieee_ch = 1;
if ($fname != "" && $lname != "" && $badge != "" && $affiliation != "" && $country != "" && $email != "" && $phone != "" && $banquet != "" && $special != "" && $ieee != "" && $payment != "") {
    // if($workshop == "1" ||){
    //     $total += $shop;
    // }
    if ($ieee == '1') {
        move_uploaded_file($_FILES["ieeefile"]["tmp_name"], "fad5725438f4a054f71d6b9aa9a13fa3/" . $unique . ".jpg");
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
    } else if ($ieee == '2') {
        if (round(microtime(true) * 1000) < $date) {
            $total += $price_early[2];
        } else {
            $total += $price_general[2];
        }
        if ($country != 'Thailand') {
            $total += $foreigner;
        }
        if ($special == 'other') {
            $special = $menu;
        }
    } else if ($ieee == '3') {
        if (round(microtime(true) * 1000) < $date) {
            $total += $price_early[3];
        } else {
            $total += $price_general[3];
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
        $sql = "INSERT INTO general_ticket (unique_code,fname,lname,badge,affiliation,country,email,phone,banquet,food,note,participant_st,pay_method,pay_st,price,workshop,ieee_ch) VALUES ('$unique','$fname','$lname','$badge','$affiliation','$country','$email','$phone','$banquet','$special','$note','$ieee','$payment','','$total','0','$ieee_ch')";
        if (mysqli_query($conn, $sql)) {
            header("Refresh:0,url=payment.php?id=$unique");
        } else {
            header("Refresh:0,url=index.php");
        }
    } else {
        $sql = "INSERT INTO general_ticket (unique_code,fname,lname,badge,affiliation,country,email,phone,banquet,food,note,participant_st,pay_method,pay_st,price,workshop,ieee_ch) VALUES ('$unique','$fname','$lname','$badge','$affiliation','$country','$email','$phone','$banquet','$special','$note','$ieee','$payment','','$total','0','$ieee_ch')";
        if (mysqli_query($conn, $sql)) {
            header("Refresh:0,url=payment.php?id=$unique");
        } else {
            header("Refresh:0,url=index.php");
        }
    }
    ////
} else {
    header('Refresh:0,url=index.php');
}
mysqli_close($conn);