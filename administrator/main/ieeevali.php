<?php

session_start();
require_once "../../Database/jcsse2020-database.php";
if ($_SESSION['username'] == "" || $_SESSION['permission'] != "admin") {
    header("Location:../logout.php");
}
$name = $_SESSION['name'];
$num_row_par = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `general_ticket` where ieee_ch='0'"));
$sql_parti = $conn->query("SELECT * FROM general_ticket WHERE ieee_ch='0'");
$sql_workshop_parti = $conn->query("SELECT * FROM workshop_general_ticket WHERE ieee_ch='0'");
$sql_author = $conn->query("SELECT * FROM author WHERE member_ch='0'");
$sql_workshop_author = $conn->query("SELECT * FROM workshop_author WHERE member_ch='0'");

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

<body class="hold-transition skin-blue sidebar-mini" onload="startTime()">
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
                        <li><a href="./regis_success.php?menu=participant"><i class="fa fa-circle-o"></i> Register Successful</a></li>
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
                        <li><a href="./regis_success.php?menu=author"><i class="fa fa-circle-o"></i> Register Successful</a></li>
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
                        <h3 class="box-title">IEEE Member Validate</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Unique_code</th>
                                    <th>Name</th>
                                    <th><i class="fa fa-check" aria-hidden="true"></i> Pass</th>
                                    <th><i class="fa fa-close" aria-hidden="true"></i> NoPass</th>
                                    <th><i class="fa fa-image"></i> show</th>

                                </tr>
                                <?php while ($row_parti = $sql_parti->fetch_array()) { ?>
                                    <tr>
                                        <td>1.</td>
                                        <td><?php echo $row_parti['unique_code']; ?></td>
                                        <td><?php echo $row_parti['fname'] . " " . $row_parti['lname']; ?></td>
                                        <td><button name="" id="" class="btn btn-success" onclick="confirm_pass('participant','<?php echo $row_parti['unique_code']; ?>')" role="button"><i class="fa fa-check" aria-hidden="true"></i></button></td>
                                        <td><button name="" id="" class="btn btn-danger" onclick="confirm_nopass('participant','<?php echo $row_parti['unique_code']; ?>')" role="button"><i class="fa fa-close" aria-hidden="true"></i></button></td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#<?php echo $row_parti['unique_code']; ?>">
                                                <i class="fa fa-image"></i>
                                            </button>
                                            <!-- model - participant -->
                                            <div class="modal fade" id="<?php echo $row_parti['unique_code']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Bank Transfer
                                                                Slip</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img style="width: 100%" src="<?php echo "../../regis/participant/fad5725438f4a054f71d6b9aa9a13fa3/" . $row_parti['unique_code'] . ".jpg"; ?>" alt="transfer-slip">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end - model - participant -->
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

            <?php } else if ($_GET['menu'] == "author") {; ?>

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">IEEE Member Validate</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>username</th>
                                    <th>Name</th>
                                    <th><i class="fa fa-check" aria-hidden="true"></i> Pass</th>
                                    <th><i class="fa fa-close" aria-hidden="true"></i> NoPass</th>
                                    <th><i class="fa fa-image"></i> show</th>

                                </tr>
                                <?php while ($row_author = $sql_author->fetch_array()) { ?>
                                    <tr>
                                        <td>1.</td>
                                        <td><?php echo $row_author['username']; ?></td>
                                        <td><?php echo $row_author['fname'] . " " . $row_author['lname']; ?></td>
                                        <td><button name="" id="" class="btn btn-success" onclick="confirm_pass('author','<?php echo $row_author['username']; ?>')" role="button"><i class="fa fa-check" aria-hidden="true"></i></button></td>
                                        <td><button name="" id="" class="btn btn-danger" onclick="confirm_nopass('author','<?php echo $row_author['username']; ?>')" role="button"><i class="fa fa-close" aria-hidden="true"></i></button></td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#<?php echo $row_author['username']; ?>">
                                                <i class="fa fa-image"></i>
                                            </button>
                                            <!-- model - participant -->
                                            <div class="modal fade" id="<?php echo $row_author['username']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Bank Transfer
                                                                Slip</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img style="width: 100%" src="<?php echo "../../regis/portal/fad5725438f4a054f71d6b9aa9a13fa3/" . $row_author['username'] . ".jpg"; ?>" alt="transfer-slip">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end - model - participant -->
                                        </td>
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
                        <h3 class="box-title">IEEE Member Validate ( Workshop Participant )</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Unique_code</th>
                                    <th>Name</th>
                                    <th><i class="fa fa-check" aria-hidden="true"></i> Pass</th>
                                    <th><i class="fa fa-close" aria-hidden="true"></i> NoPass</th>
                                    <th><i class="fa fa-image"></i> show</th>

                                </tr>
                                <?php while ($row_workshop_parti = $sql_workshop_parti->fetch_array()) { ?>
                                    <tr>
                                        <td>1.</td>
                                        <td><?php echo $row_workshop_parti['unique_code']; ?></td>
                                        <td><?php echo $row_workshop_parti['fname'] . " " . $row_workshop_parti['lname']; ?></td>
                                        <td><button name="" id="" class="btn btn-success" onclick="confirm_pass('wsparticipant','<?php echo $row_workshop_parti['unique_code']; ?>')" role="button"><i class="fa fa-check" aria-hidden="true"></i></button></td>
                                        <td><button name="" id="" class="btn btn-danger" onclick="confirm_nopass('wsparticipant','<?php echo $row_workshop_parti['unique_code']; ?>')" role="button"><i class="fa fa-close" aria-hidden="true"></i></button></td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#<?php echo $row_workshop_parti['unique_code']; ?>">
                                                <i class="fa fa-image"></i>
                                            </button>
                                            <!-- model - participant -->
                                            <div class="modal fade" id="<?php echo $row_workshop_parti['unique_code']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Bank Transfer
                                                                Slip</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img style="width: 100%" src="<?php echo "../../workshop/participant/fad5725438f4a054f71d6b9aa9a13fa3/" . $row_workshop_parti['unique_code'] . ".jpg"; ?>" alt="transfer-slip">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end - model - participant -->
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

            <?php } else if ($_GET['menu'] == "wsauthor") { ?>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">IEEE Member Validate ( Author Workshop )</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>username</th>
                                    <th>Name</th>
                                    <th><i class="fa fa-check" aria-hidden="true"></i> Pass</th>
                                    <th><i class="fa fa-close" aria-hidden="true"></i> NoPass</th>
                                    <th><i class="fa fa-image"></i> show</th>

                                </tr>
                                <?php while ($row_workshop_author = $sql_workshop_author->fetch_array()) { ?>
                                    <tr>
                                        <td>1.</td>
                                        <td><?php echo $row_workshop_author['username']; ?></td>
                                        <td><?php echo $row_workshop_author['fname'] . " " . $row_workshop_author['lname']; ?></td>
                                        <td><button name="" id="" class="btn btn-success" onclick="confirm_pass('wsauthor','<?php echo $row_workshop_author['username']; ?>')" role="button"><i class="fa fa-check" aria-hidden="true"></i></button></td>
                                        <td><button name="" id="" class="btn btn-danger" onclick="confirm_nopass('wsauthor','<?php echo $row_workshop_author['username']; ?>')" role="button"><i class="fa fa-close" aria-hidden="true"></i></button></td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#<?php echo $row_workshop_author['username']; ?>">
                                                <i class="fa fa-image"></i>
                                            </button>
                                            <!-- model - participant -->
                                            <div class="modal fade" id="<?php echo $row_workshop_author['username']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Bank Transfer
                                                                Slip</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img style="width: 100%" src="<?php echo "../../workshop/portal/fad5725438f4a054f71d6b9aa9a13fa3/" . $row_workshop_author['username'] . ".jpg"; ?>" alt="transfer-slip">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end - model - participant -->
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            <?php } ?>
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
    <script>
        $('#mode-image').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })

        function confirm_pass(name, value) {
            if (confirm("Are you sure you want to update this..?") === true) {
                window.location.href = "ieeevali.php?menu=" + name + "&status=pass&id=" + value
                return true;
            } else {
                return false;
            }
        }

        function confirm_nopass(name, value) {
            if (confirm("Are you sure you want to update this..?") === true) {
                window.location.href = "ieeevali.php?menu=" + name + "&status=nopass&id=" + value
                return true;
            } else {
                return false;
            }
        }
    </script>
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

</html>
<?php

if ($_GET['menu'] == "participant") {
    if ($_GET['status'] == "pass" && $_GET['id'] != "") {
        $id = $_GET['id'];
        $sql_update_par = "UPDATE general_ticket SET ieee_ch='1' WHERE unique_code='$id'";
        $conn->query($sql_update_par);
        $sql_log = "INSERT INTO logfile (name,manage,type) VALUES('$id','ieee-pass','participant')";
        $conn->query($sql_log);
        echo "<script>window.location.href='ieeevali.php?menu=participant';</script>";
    } else if ($_GET['status'] == "nopass" && $_GET['id'] != "") {
        $id = $_GET['id'];
        $sql_update_par = "UPDATE general_ticket SET ieee_ch='-1' WHERE unique_code='$id'";
        $conn->query($sql_update_par);
        $sql_log = "INSERT INTO logfile (name,manage,type) VALUES('$id','ieee-nopass','participant')";
        $conn->query($sql_log);
        echo "<script>window.location.href='ieeevali.php?menu=participant';</script>";
    }
    header('Refresh: 0; URL=ieeevali.php?menu=author');
}
if ($_GET['menu'] == "wsparticipant") {
    if ($_GET['status'] == "pass" && $_GET['id'] != "") {
        $id = $_GET['id'];
        $sql_update_par = "UPDATE workshop_general_ticket SET ieee_ch='1' WHERE unique_code='$id'";
        $conn->query($sql_update_par);
        $sql_log = "INSERT INTO logfile (name,manage,type) VALUES('$id','ieee-pass','workshop-participant')";
        $conn->query($sql_log);
        echo "<script>window.location.href='ieeevali.php?menu=wsparticipant';</script>";
    } else if ($_GET['status'] == "nopass" && $_GET['id'] != "") {
        $id = $_GET['id'];
        $sql_update_par = "UPDATE workshop_general_ticket SET ieee_ch='-1' WHERE unique_code='$id'";
        $conn->query($sql_update_par);
        $sql_log = "INSERT INTO logfile (name,manage,type) VALUES('$id','ieee-nopass','workshop-participant')";
        $conn->query($sql_log);
        echo "<script>window.location.href='ieeevali.php?menu=wsparticipant';</script>";
    }
    header('Refresh: 0; URL=ieeevali.php?menu=author');
}
if ($_GET['menu'] == "author") {
    if ($_GET['status'] == "pass" && $_GET['id'] != "") {
        $id = $_GET['id'];
        $sql_update_par = "UPDATE author SET member_ch='1' WHERE username='$id'";
        $conn->query($sql_update_par);
        $sql_log = "INSERT INTO logfile (name,manage,type) VALUES('$id','ieee-pass','author')";
        $conn->query($sql_log);
        echo "<script>window.location.href='ieeevali.php?menu=author';</script>";
    } else if ($_GET['status'] == "nopass" && $_GET['id'] != "") {
        $id = $_GET['id'];
        $sql_update_par = "UPDATE author SET member_ch='-1' WHERE username='$id'";
        $conn->query($sql_update_par);
        $sql_log = "INSERT INTO logfile (name,manage,type) VALUES('$id','ieee-nopass','author')";
        $conn->query($sql_log);
        echo "<script>window.location.href='ieeevali.php?menu=author';</script>";
    }
    header('Refresh: 0; URL=ieeevali.php?menu=author');
}
if ($_GET['menu'] == "wsauthor") {
    if ($_GET['status'] == "pass" && $_GET['id'] != "") {
        $id = $_GET['id'];
        $sql_update_par = "UPDATE workshop_author SET member_ch='1' WHERE username='$id'";
        $conn->query($sql_update_par);
        $sql_log = "INSERT INTO logfile (name,manage,type) VALUES('$id','ieee-pass','workshop-author')";
        $conn->query($sql_log);
        echo "<script>window.location.href='ieeevali.php?menu=wsauthor';</script>";
    } else if ($_GET['status'] == "nopass" && $_GET['id'] != "") {
        $id = $_GET['id'];
        $sql_update_par = "UPDATE workshop_author SET member_ch='-1' WHERE username='$id'";
        $conn->query($sql_update_par);
        $sql_log = "INSERT INTO logfile (name,manage,type) VALUES('$id','ieee-nopass','workshop-author')";
        $conn->query($sql_log);
        echo "<script>window.location.href='ieeevali.php?menu=wsauthor';</script>";
    }
    header('Refresh: 0; URL=ieeevali.php?menu=author');
}
?>