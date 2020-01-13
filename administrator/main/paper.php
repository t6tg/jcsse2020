<?php

session_start();
require_once "../../Database/jcsse2020-database.php";
if ($_SESSION['username'] == "" || $_SESSION['permission'] != "admin") {
    header("Location:../logout.php");
}
$sql_paper = $conn->query("SELECT * FROM edas ");
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
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
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
                                <img src="../../regis/portal/main/dist/img/avatar04.png" class="user-image"
                                    alt="User Image">
                                <span class="hidden-xs"><?php echo $_SESSION['name']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="../../regis/portal/main/dist/img/avatar04.png" class="img-circle"
                                        alt="User Image">
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
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
                            <li><a href="./regis_success.php?menu=participant"><i class="fa fa-circle-o"></i>Register
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
                            <li><a href=""><i class="fa fa-circle-o"></i> Paper</a></li>
                            <li><a href="./regis_success.php?menu=author"><i class="fa fa-circle-o"></i> Register
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
            <div class="container"><br>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Paper</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tbody>
                                <tr>
                                    <th>Status</th>
                                    <th>Paper ID</th>
                                    <th>Paper Name</th>
                                    <th>Author Name</th>
                                    <th>Categories</th>
                                    <th>Total Page</th>
                                </tr>
                                <?php while ($row_paper = $sql_paper->fetch_array()) {?>
                                <tr>
                                    <td><?php echo $row_paper['jfrom']; ?></td>
                                    <td><?php echo '<a href="../../regis/portal/main/paper_jcsse2020_file_upload/' . $row_paper['paper_name'] . '_' . $row_paper['author_name'] . '.pdf" download>' . $row_paper['paper_id'] . '</a>'; ?>
                                    </td>
                                    <td><?php echo $row_paper['paper_name']; ?></td>
                                    <td><?php echo $row_paper['author_name']; ?></td>
                                    <td><?php echo $row_paper['catagories']; ?></td>
                                    <td><?php echo $row_paper['jpage']; ?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>


        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; <?php echo Date('Y'); ?> <a
                    href="http://jcsse2020.cs.kmutnb.ac.th">JCSSE</a>.</strong>
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

</html>
