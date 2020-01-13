<?php

require_once '../../Database/jcsse2020-database.php';
if ($_POST['submit']) {
    $id = $_POST['myid'];
    if (isset($_FILES['slip_file'])) {
        move_uploaded_file($_FILES["slip_file"]["tmp_name"], "slip_transfer_bank/" . $id . ".jpg");
        $r_n = html_entity_decode(trim($_POST['receipt_name']));
        $r_a = html_entity_decode(trim($_POST['receipt_address']));
        if ($r_n != "" && $r_a != "") {
            $sql_receipt = "UPDATE workshop_general_ticket SET receipt_name='$r_n' , receipt_address='$r_a' , pay_st='-1' WHERE unique_code='$id'";
            if (mysqli_query($conn, $sql_receipt)) {
                echo "<script>alert('update successful')</script>";
            } else {
                echo "<script>alert('error')</script>";
            }
            header("Refresh:0,url=payment.php?id=$id");
        }
        header("Refresh:0,url=payment.php?id=$id");
    }
}