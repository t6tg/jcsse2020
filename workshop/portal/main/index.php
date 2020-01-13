<?php 
    session_start();
    require_once("../../../Database/jcsse2020-database.php");
    if($_SESSION['username'] == "" || $_SESSION['permission'] != "author_workshop"){
        header("Location:../logout.php");
    }
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM author where username='$username'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
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
                            <img src="dist/img/avatar04.png" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo $_SESSION['name']?></span>
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
                    <p><?php echo $_SESSION['name']?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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

    <div class="content-wrapper">
        <div class="container">
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Firstname</label>
                        <?php $title = $row['title']; ?>
                        <input type="text" class="form-control" aria-describedby="helpId"
                            placeholder="<?php echo strtoupper($title[0]).substr($title,1). ". ".$row['fname'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" aria-describedby="helpId"
                            placeholder="<?php echo $row['email'] ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Country</label>
                      <input type="text"
                        class="form-control"  aria-describedby="helpId" placeholder="<?php echo $row['country'] ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Name of Organization</label>
                      <input type="text"
                        class="form-control"  aria-describedby="helpId" placeholder="<?php echo $row['organization'] ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Special Menu</label>
                      <input type="text"
                        class="form-control"  aria-describedby="helpId" placeholder="<?php echo strtoupper($row['food'][0]).substr($row['food'],1) ?>" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Lastname</label>
                        <input type="text" class="form-control" aria-describedby="helpId"
                            placeholder="<?php echo $row['lname'] ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Phone</label>
                      <input type="text"
                        class="form-control"  aria-describedby="helpId" placeholder="<?php echo $row['phone'] ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Nationality</label>
                      <input type="text"
                        class="form-control"  aria-describedby="helpId" placeholder="<?php echo $row['nationality'] ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="">Name Of Dept/Section</label>
                      <input type="text"
                        class="form-control"  aria-describedby="helpId" placeholder="<?php echo $row['section'] ?>" disabled>
                    </div>
                </div>
            </div>
            <div class="form-group">
              <label>Note : </label>
              <textarea class="form-control" name="" id="" rows="3" disabled><?php echo $row['note']?></textarea>
            </div>
        </div>
    </div>


    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; <?php  echo Date('Y');?> <a href="http://jcsse2020.cs.kmutnb.ac.th">JCSSE</a>.</strong>
        All rights
        reserved.
    </footer>

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