<?php 
    session_start();
    require_once("../../../Database/jcsse2020-database.php");
    if($_SESSION['username'] == "" || $_SESSION['permission'] != "author"){
        header("Location:../logout.php");
    }
    $username = $_SESSION['username'];
    $name = $_SESSION['name'];
    $sql = "SELECT * FROM author where username='$username'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $sql_cat = "SELECT * FROM catagories";
    $result_cat = $conn->query($sql_cat);

    $sql_edas = "SELECT * FROM edas where author_name='$name'";
    $result_edas = $conn->query($sql_edas);
    
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
                        <i class="fa fa-book" aria-hidden="true"></i> <span>Register</span>
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
            <center>
                <h1>REGISTER YOUR PAPER</h1>
            </center>
            <?php if($row['pay_st'] == '1' || $row['pay_st'] == '-1'){ ?>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Paper name : </label>
                            <input type="text" class="form-control" aria-describedby="helpId" placeholder="" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Total Page :</label>
                            <input type="number" class="form-control" id="" aria-describedby="helpId" placeholder=""
                                disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><b>Categories : <span style="color:red">*</span></b></label>
                            <select class="form-control" id="" disabled>
                                <option value="-1" selected disabled>-- Please Select --</option>
                                <?php while($row_cat = $result_cat->fetch_assoc()){ ?>
                                <option value="<?php echo $row_cat['catagories_name']; ?>">
                                    <?php echo $row_cat['catagories_name']; ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label for="">Upload File :</label>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01" disabled>
                                <small id="helpId" class="form-text text-muted">PDF FILE ONLY</small>
                            </div>
                        </div>
                    </div>
                </div>
                <input id="" class="btn btn-primary" type="submit" value="Submit Form" role="button" disabled>
            </form>

            <?php }else{ ?>

            <form action="./sys/insert.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Paper name : </label>
                            <input type="text" class="form-control" name="paper_name" aria-describedby="helpId"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Total Page :</label>
                            <input type="number" class="form-control" name="page" id="" aria-describedby="helpId"
                                placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><b>Categories : <span style="color:red">*</span></b></label>
                            <select class="form-control" name="catagories" id="">
                                <option value="-1" selected disabled>-- Please Select --</option>
                                <?php while($row_cat = $result_cat->fetch_assoc()){ ?>
                                <option value="<?php echo $row_cat['catagories_name']; ?>">
                                    <?php echo $row_cat['catagories_name']; ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label for="">Upload File :</label>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01" name="paper_file">
                                <small id="helpId" class="form-text text-muted">PDF FILE ONLY</small>
                            </div>
                        </div>
                    </div>
                </div>
                <input name="" id="" class="btn btn-primary" type="submit" value="Submit Form" role="button">
            </form>

            <?php } ?>
            <hr>
            <?php if($row['pay_st'] == '1' || $row['pay_st'] == '-1'){ ?>

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">YOUR PAPER</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
                                <th>Author Name</th>
                                <th>Paper Name</th>
                                <th>Categories Name</th>
                                <th>Page</th>
                            </tr>
                            <?php while($row_edas = $result_edas->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row_edas['author_name']; ?></td>
                                <td><?php echo $row_edas['paper_name']; ?></td>
                                <td><?php echo $row_edas['catagories']; ?></td>
                                <td><?php echo $row_edas['jpage']; ?></td>
                                <?php if($row_edas['jfrom'] == 'jcsse'){ ?>
                                <td><a style="height: 30px;"
                                        class="btn btn-danger" disabled>x</a></td>
                                <?php }else{ ?>
                                <td><input type="submit" style="height: 30px;" class="btn btn-danger" value="x"
                                        disabled></td>
                                <?php } ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>

            <?php }else{ ?>

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">YOUR PAPER</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
                                <th>Author Name</th>
                                <th>Paper Name</th>
                                <th>Categories Name</th>
                                <th>Page</th>
                            </tr>
                            <?php while($row_edas = $result_edas->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row_edas['author_name']; ?></td>
                                <td><?php echo $row_edas['paper_name']; ?></td>
                                <td><?php echo $row_edas['catagories']; ?></td>
                                <td><?php echo $row_edas['jpage']; ?></td>
                                <?php if($row_edas['jfrom'] == 'jcsse'){ ?>
                                <td><a style="height: 30px;"
                                        onclick="delete_edas('<?php echo $row_edas['paper_id'] ?>','<?php echo $row_edas['paper_name'] ?>')"
                                        name="delete" class="btn btn-danger">x</a></td>
                                <?php }else{ ?>
                                <td><input type="submit" style="height: 30px;" class="btn btn-danger" value="x"
                                        disabled></td>
                                <?php } ?>
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
        <strong>Copyright &copy; <?php  echo Date('Y');?> <a href="http://jcsse2020.cs.kmutnb.ac.th">JCSSE</a>.</strong>
        All rights
        reserved.
    </footer>

    <script>
    function delete_edas(value, name) {
        if (confirm('You want to delete ' + name + '...!!!')) {
            window.location.href = "./sys/delete.php?paper=" + value;
        } else {}
    }
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