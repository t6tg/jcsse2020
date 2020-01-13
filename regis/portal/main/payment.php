<?php

session_start();
require_once "../../../Database/jcsse2020-database.php";
if ($_SESSION['username'] == "" || $_SESSION['permission'] != "author") {
    header("Location:../logout.php");
}
$username = $_SESSION['username'];
$name = $_SESSION['name'];
$sql = "SELECT * FROM author where username='$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql_edas = "SELECT * FROM edas where author_name='$name'";
$result_edas = $conn->query($sql_edas);

$sql_edas2 = "SELECT * FROM author where username='$username'";
$result_edas2 = $conn->query($sql_edas2);
$row_edas2 = $result_edas2->fetch_assoc();
$val1 = $row_edas2['chbox'];
$val = explode(",", $val1);

$member = [4500, 5000];
$for_price = 0;
// ieee , non

?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>JCSSE2020-Portal</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <link rel="icon" href="../../../src/img/favicon.png">
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <style>
        .omise-checkout-button {
            background-color: #3c94db;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 10px;
            margin-top: 20px;
        }

        </style>
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <header class="main-header">
            <a href="./" class="logo">
                <span class="logo-mini"><b>JC</b>S..</span>
                <span class="logo-lg"><b>JCSSE</b>2020</span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="./" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="./" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="dist/img/avatar04.png" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $_SESSION['name']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="dist/img/avatar04.png" class="img-circle" alt="User Image">
                                    <p>
                                        AUTHOR
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </nav>
        </header>

        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="dist/img/avatar04.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $_SESSION['name']; ?></p>
                        <a href="./"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active treeview menu-open">
                    <li>
                        <a href="./author.php">
                            <i class="fa fa-book" aria-hidden="true"></i> <span>Register Paper</span>
                        </a>
                    </li>
                    <li>
                        <a href="./payment.php">
                            <i class="fa fa-credit-card" aria-hidden="true"></i> <span>Payment</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <?php if ($row['pay_st'] == "" || $row['pay_st'] == "0" || $row['pay_st'] == "-1" || $row['pay_st'] == "1") {?>

        <div class="content-wrapper">
            <div class="container"><br>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">YOUR PAPER</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tbody>
                                <tr>
                                    <th><i class="fa fa-check" aria-hidden="true"></i></th>
                                    <th>Author Name</th>
                                    <th>Paper Name</th>
                                    <th>Categories Name</th>
                                    <th>Page</th>
                                </tr>
                                <?php while ($row_edas = $result_edas->fetch_assoc()) {?>
                                <tr>
                                    <?php if ($row['pay_st'] == "1" || $row['pay_st'] == "-1") {?>
                                    <form action="" method="post">
                                        <th>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="<?php echo $row_edas['paper_id']; ?>"
                                                        aria-label="Text for screen reader"
                                                        <?php for ($k = 0; $k < count($val); $k++) {if ($row_edas['paper_id'] == $val[$k]) {echo 'checked';}}?>
                                                        disabled>
                                                </label>
                                            </div>
                                        </th>
                                        <td><?php echo $row_edas['author_name']; ?></td>
                                        <td><?php echo $row_edas['paper_name']; ?></td>
                                        <td><?php echo $row_edas['catagories']; ?></td>
                                        <td><?php echo $row_edas['jpage']; ?></td>
                                </tr>
                                <?php } else {?>
                                <form action="" method="post">
                                    <th>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" name="chbox[]" type="checkbox"
                                                    value="<?php echo $row_edas['paper_id']; ?>"
                                                    aria-label="Text for screen reader">
                                            </label>
                                        </div>
                                    </th>
                                    <td><?php echo $row_edas['author_name']; ?></td>
                                    <td><?php echo $row_edas['paper_name']; ?></td>
                                    <td><?php echo $row_edas['catagories']; ?></td>
                                    <td><?php echo $row_edas['jpage']; ?></td>
                                    </tr>
                                    <?php }?>
                                    <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <?php if ($row['pay_st'] == "0" || $row['pay_st'] == "") {?>
                <input type="submit" class="btn btn-primary" name="calculate" value="calculate">
                <?php }?>
                </form>
                <br><br>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Payment</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th style="width: 20px;">#</th>
                                    <th>Topic</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                                <tr>
                                    <td>1.</td>
                                    <td><?php if ($row['member'] == '0') {echo "Non IEEE Member";} else if ($row['member'] == '1') {echo "IEEE Member";}?>
                                    </td>
                                    <td>1</td>
                                    <td><?php if ($row['member'] == '0') {echo $member[1];} else if ($row['member'] == '1') {echo $member[0];}?>
                                    </td>
                                </tr>
                                <?php if ($row['mypage'] != 0) {?>
                                <td>2.</td>
                                <td>Total Page</td>
                                <td><?php echo $row['mypage']; ?></td>
                                <td><?php echo $row['mypage'] * 1000; ?></td>
                                <?php }?>
                                <tr>
                                    <td>2.</td>
                                    <td>Workshop</td>
                                    <td><?php if ($row['workshop'] != '0') {echo "1";
    $for_price += 2000;} else {echo "-";}?>
                                    </td>
                                    <td><?php if ($row['workshop'] != '0') {echo "2000";} else {echo "0";}?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><b>Total <i class="fa fa-angle-double-right" aria-hidden="true"></i></b></td>
                                    <td><?php echo $row['price']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <?php if ($row['mypage'] != 0) {?>
                <?php if ($row['payment_method'] == '1') {?>
                <?php if ($row['pay_st'] == '0') {echo "<span><h3><b>Payment : </b><span style='color:red'>Fail</span></h3></span>";} else if ($row['pay_st'] == "-1") {echo "<span><h3><b>Payment : </b><span style='color:orange'>Awating Review</span></h3></span>";} else if ($row['pay_st'] == "1") {echo "<span><h3><b>Payment : </b><span style='color:green'>Successful</span></h3></span>";}?>
                <?php if ($row['member'] == '1' && $row['member_ch'] == '-1') {echo "<span><h3><b>IEEE : </b><span style='color:red'>Fail</span></h3></span>";} else if ($row['member'] == '1' && $row['member_ch'] == '0') {echo "<span><h3><b>IEEE : </b><span style='color:orange'>Awating Review</span></h3></span>";} else if ($row['member'] == '1' && $row['member_ch'] == '1') {echo "<span><h3><b>IEEE : </b><span style='color:green'>Successful</span></h3></span>";}?>
                <?php if ($row['pay_st'] == "0" || $row['pay_st'] == "") {?>
                <form id="checkoutForm" class="btn" method="POST" action="">
                    <script type="text/javascript" src="https://cdn.omise.co/omise.js"
                        data-key="pkey_test_5hf4ps01m8g5qxyrzw7" data-amount="<?php echo $row['price'] * 100; ?>"
                        data-frame-label="KMUTNB"
                        data-image="https://www.pnglot.com/pngfile/detail/119-1193996_download-rubber-duck-png-clipart-rubber-duck-clip.png"
                        data-frame-description="king mongkut's university of technology north bangkok"
                        data-submit-label="Checkout" data-currency="THB" data-button-label="Click To Pay"
                        data-default-payment-method="credit_card">
                    < input type = "hidden"
                    name = "id"
                    value = "<?php echo $row['unique_code']; ?>" >
                    </script>
                </form>
                <?php }?>
                <?php }?>
                <?php if ($row['payment_method'] == '2') {?>
                <?php if ($row['pay_st'] == '0') {echo "<span><h3><b>Payment : </b><span style='color:red'>Fail</span></h3></span>";} else if ($row['pay_st'] == "-1") {echo "<span><h3><b>Payment : </b><span style='color:orange'>Awating Review</span></h3></span>";} else if ($row['pay_st'] == "1") {echo "<span><h3><b>Payment : </b><span style='color:green'>Successful</span></h3></span>";}?>
                <?php if ($row['member'] == '1' && $row['member_ch'] == '-1') {echo "<span><h3><b>IEEE : </b><span style='color:red'>Fail</span></h3></span>";} else if ($row['member'] == '1' && $row['member_ch'] == '0') {echo "<span><h3><b>IEEE : </b><span style='color:orange'>Awating Review</span></h3></span>";} else if ($row['member'] == '1' && $row['member_ch'] == '1') {echo "<span><h3><b>IEEE : </b><span style='color:green'>Successful</span></h3></span>";}?>
                <?php if ($row['pay_st'] == "0" || $row['pay_st'] == "") {?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Upload Bank Transfer Slip</label>
                        <input type="file" class="form-control-file" name="slip_file" id="" placeholder=""
                            aria-describedby="fileHelpId"><br>
                        <input class="btn btn-primary" type="submit" value="submit" name="pay_slip">
                    </div>
                </form>
                <?php }?>
                <?php }?>
                <?php }?>
            </div>
        </div>

        <?php }?>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; <?php echo Date('Y'); ?> <a
                    href="http://jcsse2020.cs.kmutnb.ac.th">JCSSE</a>.</strong>
            All rights
            reserved.
        </footer>
        <script type='text/javascript'>
        (function() {
            if (window.localStorage) {
                if (!localStorage.getItem('firstLoad')) {
                    localStorage['firstLoad'] = true;
                    window.location.reload();
                } else
                    localStorage.removeItem('firstLoad');
            }
        })();
        </script>
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="bower_components/fastclick/lib/fastclick.js"></script>
        <script src="dist/js/adminlte.min.js"></script>
        <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="bower_components/chart.js/Chart.js"></script>
        <script src="dist/js/pages/dashboard2.js"></script>
        <script src="dist/js/demo.js"></script>

</html>

<?php

if (isset($_POST['pay_slip']) && ($row['pay_st'] == "0" || $row['pay_st'] == "")) {
    if (isset($_FILES['slip_file'])) {
        echo "<script>alert('error')</script>";
        move_uploaded_file($_FILES["slip_file"]["tmp_name"], "slip_transfer_bank/" . $username . ".jpg");
        $sql_receipt = "UPDATE author SET pay_st='-1' WHERE username='$username'";
        if (mysqli_query($conn, $sql_receipt)) {
            echo "<script>alert('update successful')</script>";
        } else {
            echo "<script>alert('error')</script>";
        }
        header("Refresh:0");
    } else {
        header("Refresh:0");
    }
}

if (isset($_POST['calculate'])) {
    $price = 0;
    for ($i = 0; $i < count($_POST["chbox"]); $i++) {
        if (trim($_POST["chbox"][$i]) != "") {
            $id = $_POST["chbox"][$i];
            $sql_cal = "SELECT * FROM edas where author_name='$name'";
            $result_cal = $conn->query($sql_cal);
            while ($row_cal = $result_cal->fetch_assoc()) {
                if ($row_cal['paper_id'] == $id) {
                    $price += $row_cal['jpage'];
                    $datas[] = $row_cal['paper_id'];
                }
            }
        }
    }
    $price *= 1;
    $sql_page = "UPDATE author SET mypage='$price' where username='$username'";
    $conn->query($sql_page);
    if ($row['member'] == 0) {
        $price *= 1000;
        $price += $for_price;
        $price += $member[1];
        $sql_price = "UPDATE author SET price='$price' where username='$username'";
    } else {
        $price *= 1000;
        $price += $for_price;
        $price += $member[0];
        $sql_price = "UPDATE author SET price='$price' where username='$username'";
    }
    $conn->query($sql_price);
    $comma_separated = implode(",", $datas);
    $sql_ch = "UPDATE author SET chbox='$comma_separated' where username='$username'";
    $conn->query($sql_ch);
}
?>
<?php

require_once './omisephp/lib/Omise.php';
define('OMISE_PUBLIC_KEY', 'pkey_test_5hf4ps01m8g5qxyrzw7');
define('OMISE_SECRET_KEY', 'skey_test_5ezwuh1uatm5fpq1zr2');
$charge = OmiseCharge::create(array(
    'amount' => $row['price'] * 100,
    'currency' => 'thb',
    'card' => $_POST['omiseToken'],
));
if ($charge['status'] == 'successful') {
    $sql_paid = "UPDATE author SET pay_st='1' WHERE username='$username'";
    mysqli_query($conn, $sql_paid);
} else {
    $sql_paid = "UPDATE author SET pay_st='0' WHERE username='$username'";
    mysqli_query($conn, $sql_paid);
}
mysqli_close($conn);
?>
