<?php

session_start();
require_once "../../Database/jcsse2020-database.php";
if ($_SESSION['username'] == "" || $_SESSION['permission'] != "admin") {
    header("Location:../logout.php");
}
// $username = $_SESSION['username'];
// $sql = "SELECT * FROM author where username='$username'";
// $result = $conn->query($sql);
// $row = $result->fetch_assoc();
$sql_par = $conn->query("SELECT * FROM general_ticket where pay_st='1' and ieee_ch='1'");
$sql_author = $conn->query("SELECT * FROM author where pay_st='1' and member_ch='1'");
$sql_workshop_par = $conn->query("SELECT * FROM workshop_general_ticket where pay_st='1' and ieee_ch='1'");
$sql_workshop_author = $conn->query("SELECT * FROM workshop_author where pay_st='1' and member_ch='1'");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JCSSE2020-Portal</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../../regis/portal/main/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../regis/portal/main/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../regis/portal/main/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../../regis/portal/main/bower_components/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../../regis/portal/main/dist/css/AdminLTE.min.css">
    <link rel="icon" href="../../../../src/img/favicon.png">
    <link rel="stylesheet" href="../../regis/portal/main/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini" >
    <header class="main-header">
        <a href="#" class="logo">
            <span class="logo-mini"><b>JC</b>S..</span>
            <span class="logo-lg"><b>JCSSE</b>2020</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="../../regis/portal/main/dist/img/avatar04.png" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo $_SESSION['name']; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="../../regis/portal/main/dist/img/avatar04.png" class="img-circle" alt="User Image">
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
                    <img src="../../regis/portal/main/dist/img/avatar04.png" class="img-circle" alt="User Image">
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
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-ticket" aria-hidden="true"></i><span>Participant</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="./ieeevali.php?menu=participant"><i class="fa fa-circle-o"></i> IEEE
                                Validate</a></li>
                        <li><a href="./payvali.php?menu=participant"><i class="fa fa-circle-o"></i> Transfer
                                Slip</a></li>
                        <li><a href="./regis_scccuess.php?menu=participant"><i class="fa fa-circle-o"></i>Register
                                Successful</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i> <span>Author</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="./ieeevali.php?menu=author"><i class="fa fa-circle-o"></i> IEEE Validate</a>
                        </li>
                        <li><a href="./payvali.php?menu=author"><i class="fa fa-circle-o"></i> Transfer Slip</a>
                        </li>
                        <li><a href="./paper.php"><i class="fa fa-circle-o"></i> Paper</a></li>
                        <li><a href="./regis_success.php?menu=author"><i class="fa fa-circle-o"></i> Register
                                Successful</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-calendar-o"></i> <span>Workshop - Participant</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="./ieeevali.php?menu=wsparticipant"><i class="fa fa-circle-o"></i> IEEE Validate</a>
                        </li>
                        <li><a href="./payvali.php?menu=wsparticipant"><i class="fa fa-circle-o"></i> Transfer Slip</a>
                        </li>
                        <li><a href="./regis_success.php?menu=wsparticipant"><i class="fa fa-circle-o"></i> Register
                                Successful</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-calendar-o"></i> <span>Workshop - Author</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="./ieeevali.php?menu=wsauthor"><i class="fa fa-circle-o"></i> IEEE Validate</a>
                        </li>
                        <li><a href="./payvali.php?menu=wsauthor"><i class="fa fa-circle-o"></i> Transfer Slip</a>
                        </li>
                        <li><a href="./regis_success.php?menu=wsauthor"><i class="fa fa-circle-o"></i> Register
                                Successful</a></li>
                    </ul>
                </li>
                <li><a href="./logfile.php"> <i class="fa fa-file" aria-hidden="true"></i> Log File</a></li>
                <li><a href="./announce.php"> <i class="fa fa-microphone" aria-hidden="true"></i></i> Announce</a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
        <div class="container"><br><br>
            <?php if ($_GET['menu'] == "participant") { ?>

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Participant Registration Successful</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table id='tableData' class="table table-condensed">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>Phone</th>
                                    <th>Special Food</th>
                                    <th>Member</th>
                                    <th>Workshop</th>
                                </tr>
                                <?php $i = 1;
                                    while ($row_par = $sql_par->fetch_array()) { ?>
                                    <tr>
                                        <td><?php echo $i;
                                                    $i++; ?></td>
                                        <td><?php echo $row_par['fname'] . " " . $row_par['lname']; ?></td>
                                        <td><?php echo $row_par['email']; ?></td>
                                        <td><?php echo $row_par['country']; ?></td>
                                        <td><?php echo $row_par['phone']; ?></td>
                                        <td><?php echo $row_par['food']; ?></td>
                                        <td><?php if ($row_par['participant_st'] == '1') {
                                                        echo "IEEE Member";
                                                    } else if ($row_par['participant_st'] == '0') {
                                                        echo "NonIEEE Member";
                                                    } else if ($row_par['participant_st'] == '2') {
                                                        echo "JCSSE Committee / Reviewer";
                                                    } else if ($row_par['participant_st'] == '3') {
                                                        echo "Student Observer";
                                                    } ?>
                                        </td>
                                        <td><?php if ($row_par['workshop'] == '1') {
                                                        echo "<span style='color:green'>Join</span>";
                                                    } else if ($row_par['workshop'] == '0') {
                                                        echo "<span style='color:red'>No Join</span";
                                                    } ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

            <?php } else if ($_GET['menu'] == "author") { ?>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Author Registration Successful</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table id='tableData' class="table table-condensed">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>Phone</th>
                                    <th>Special Food</th>
                                    <th>Member</th>
                                    <th>Paper</th>
                                    <th>Workshop</th>
                                </tr>
                                <?php $i = 1;
                                    while ($row_author = $sql_author->fetch_array()) { ?>
                                    <tr>
                                        <td><?php echo $i;
                                                    $i++; ?></td>
                                        <td><?php echo $row_author['fname'] . " " . $row_author['lname']; ?></td>
                                        <td><?php echo $row_author['email']; ?></td>
                                        <td><?php echo $row_author['country']; ?></td>
                                        <td><?php echo $row_author['phone']; ?></td>
                                        <td><?php echo $row_author['food']; ?></td>
                                        <td><?php if ($row_author['member'] == '1') {
                                                        echo "IEEE Member";
                                                    } else if ($row_author['member'] == "0") {
                                                        echo "NonIEEE Member";
                                                    } ?>
                                        </td>
                                        <td><?php $data = explode(",", $row_author['chbox']);
                                                    for ($j = 0; $j < count($data); $j++) {
                                                        $name_author = $row_author['fname'] . " " . $row_author['lname'];
                                                        $sql_papers = "select paper_name from edas where paper_id='$data[$j]' and author_name='" . $row_author['fname'] . " " . $row_author['lname'] . "'";
                                                        $re_papers = mysqli_query($conn, $sql_papers);
                                                        $row_papers = mysqli_fetch_assoc($re_papers);
                                                        $p_name =  $row_papers['paper_name'];
                                                        $path = $p_name . "_" . $name_author . ".pdf";
                                                        echo '<a href="../../regis/portal/main/paper_jcsse2020_file_upload/' . $path . '" download>' . $data[$j] . "</a><br>";
                                                    } ?></td>
                                        <td><?php if ($row_author['workshop'] == "1") {
                                                        echo "<span style='color:green'>Join</span>";
                                                    } else {
                                                        echo "<span style='color:red'>No Join</span>";
                                                    } ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            <?php } else if ($_GET['menu'] == "wsparticipant") { ?>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Workshop Participant Registration Successful</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table id='tableData' class="table table-condensed">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>Phone</th>
                                    <th>Special Food</th>
                                    <th>Member</th>
                                </tr>
                                <?php $i = 1;
                                    while ($row_workshop_par = $sql_workshop_par->fetch_array()) { ?>
                                    <tr>
                                        <td><?php echo $i;
                                                    $i++; ?></td>
                                        <td><?php echo $row_workshop_par['fname'] . " " . $row_workshop_par['lname']; ?></td>
                                        <td><?php echo $row_workshop_par['email']; ?></td>
                                        <td><?php echo $row_workshop_par['country']; ?></td>
                                        <td><?php echo $row_workshop_par['phone']; ?></td>
                                        <td><?php echo $row_workshop_par['food']; ?></td>
                                        <td><?php if ($row_workshop_par['participant_st'] == '1') {
                                                        echo "IEEE Member";
                                                    } else if ($row_workshop_par['participant_st'] == '0') {
                                                        echo "NonIEEE Member";
                                                    } else if ($row_workshop_par['participant_st'] == '2') {
                                                        echo "JCSSE Committee / Reviewer";
                                                    } else if ($row_workshop_par['participant_st'] == '3') {
                                                        echo "Student Observer";
                                                    } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            <?php } else if ($_GET['menu'] == "wsauthor") {  ?>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Author Registration Successful ( Workshop ) </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table id='tableData' class="table table-condensed">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>Phone</th>
                                    <th>Special Food</th>
                                    <th>Member</th>
                                </tr>
                                <?php $i = 1;
                                    while ($row_workshop_author = $sql_workshop_author->fetch_array()) { ?>
                                    <tr>
                                        <td><?php echo $i;
                                                    $i++; ?></td>
                                        <td><?php echo $row_workshop_author['fname'] . " " . $row_workshop_author['lname']; ?></td>
                                        <td><?php echo $row_workshop_author['email']; ?></td>
                                        <td><?php echo $row_workshop_author['country']; ?></td>
                                        <td><?php echo $row_workshop_author['phone']; ?></td>
                                        <td><?php echo $row_workshop_author['food']; ?></td>
                                        <td><?php if ($row_workshop_author['member'] == '1') {
                                                        echo "IEEE Member";
                                                    } else if ($row_workshop_author['member'] == "0") {
                                                        echo "NonIEEE Member";
                                                    } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            <?php } ?>
            <button id='DLtoExcel' class="btn btn-primary">Export Table to Excel</button>
        </div>
    </div>


    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; <?php echo Date('Y'); ?> <a href="http://jcsse2020.cs.kmutnb.ac.th">JCSSE</a>.</strong>
        All rights
        reserved.
    </footer>
    <script src="../../regis/portal/main/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../../regis/portal/main/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../regis/portal/main/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="../../regis/portal/main/dist/js/adminlte.min.js"></script>
    <script src="../../regis/portal/main/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <script src="../../regis/portal/main/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../../regis/portal/main/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../../regis/portal/main/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../../regis/portal/main/bower_components/chart.js/Chart.js"></script>
    <script src="../../regis/portal/main/dist/js/pages/dashboard2.js"></script>
    <script src="../../regis/portal/main/dist/js/demo.js"></script>
    <script src="../../src/script/excelexportjs.js"></script>
    <script type="text/javascript">
        var $btnDLtoExcel = $('#DLtoExcel');
        $btnDLtoExcel.on('click', function() {
            $("#tableData").excelexportjs({
                containerid: "tableData",
                datatype: 'table'
            });
        });
    </script>

</html>