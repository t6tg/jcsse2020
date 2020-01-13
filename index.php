<?php
    require_once("./Database/jcsse2020-database.php");
    $sql = "SELECT * FROM notice WHERE notice_id='1'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $notice = $row['notice_val'];
?>
<!doctype html>
<html lang="en">

<head>
    <title>JCSSE 2020</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:image" content="https://thanawatgulati.com/event/src/img/promote.jpg" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/animate.css">
    <link rel="icon" href="./src/img/favicon.png">
    <link rel="stylesheet" href="./src/css/main.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg  bg-light">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" style="background-color:#a7a7a7;" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="float:right"><i class="fa fa-chevron-circle-down"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./main/call-for-papers.php">Call For Papers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./main/cameraready-submission.php">Camera-Ready Submission</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./main/paper-submission.php">Paper Submission</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./main/registration-policy.php">Registration Policy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./main/history.php">History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./main/organization.php">Committee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./main/keynote.php">Keynote Speakers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./main/information.php">Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./main/contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./main/workshop.php">Workshop</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="black">
        <img src="./src/img/banner.jpg" id="banner" srcset="">
        <div class="hello zoomIn animated">
            <img src="./src/img/jcsse.png" class="jcsse-logo" alt="jcsse-logo"><br><br>
            <span>Ideation to Reality<br></span>
            <span> The 17th International Joint Conference on Computer Science and Software Engineering (JCSSE2020) at
                Chiangmai, Thailand. May 6 - 8, 2020</span>
        </div>
    </div>
    <div class="container">
        <?php if($notice != ""){?>
            <br>
            <div>
                <h3> <img width="50px" src="./src/img/megaphone.svg"> Announce : </h3>
                <?php echo $notice ;?>
            </div>
            <hr>
        <?php  } ?>
        <div class="menu-card"><br><BR>
            <center><button type="button" onclick="authorlogin()" style="background-color:#3c94db;color:#fff" class="btn btn">AUTHOR LOGIN</button> <button type="button" class="btn btn" onclick="authorregis()" style="background-color:#3c94db;color:#fff">AUTHOR REGISTRATION</button></center>
            <center><button type="button" onclick="pregis()" style="margin-top:2px;background-color:green;color:#fff" class="btn btn">PARTICIPANT REGISTRATION</button> <button type="button" class="btn btn" onclick="pregisST()" style="background-color:green;color:#fff">PARTICIPANT REGISTRATION STATUS</button>
            </center>
            <center><button type="button" onclick="wsauthorlogin()" style="margin-top:2px;background-color:orange;color:#fff" class="btn btn">AUTHOR LOGIN ( WORKSHOP )</button> <button type="button" class="btn btn" onclick="wsauthorregis()" style="background-color:orange;color:#fff">AUTHOR REGISTRATION ( WORKSHOP )</button>
            </center>
            <center><button type="button" onclick="wspregis()" style="margin-top:2px;background-color:red;color:#fff" class="btn btn">PARTICIPANT REGISTRATION ( WORKSHOP )</button>
                <button type="button" class="btn btn" onclick="pregisST()" style="background-color:red;color:#fff">PARTICIPANT REGISTRATION STATUS ( WORKSHOP )</button>
            </center>
        </div>
        <div class="row">
            <div class="col-md-6">
                <center><img src="./src/img/welcome.png" class="welcome" alt=""></center>
            </div>
            <div class="col-md-6 welcome-text">
                <h3>WELCOME</h3>
                <br>
                <span>The 17th International Joint Conference on Computer Science and Software Engineering
                    (JCSSE2020)
                    will be held on May 6 - 8, 2020 at Chiangmai, Thailand, organized by Department of Computer and
                    Information Science, Faculty of Applied Science, King Mongkut’s University of Technology North
                    Bangkok, Bangkok, Thailand The theme of JCSSE2020 is “Ideation to Reality”. The conference will
                    bring together researchers, scientists and engineers from around the world to present their
                    novel
                    accomplishments, innovations and future directions in computer science and software engineering
                    along with their applications.</span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 important">
                <h3><b>IMPORTANT DATES</b></h3>
                <table align="center" style="width: 70%" class="table table-striped table-inverse">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Topic</th>
                            <th>DATE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">SUBMISSION DEADLINE</td>
                            <td>January 14, 2020</td>
                        </tr>
                        <tr>
                            <td scope="row">NOTIFICATION OF ACCEPTANCE</td>
                            <td>February 14, 2020</td>
                        </tr>
                        <tr>
                            <td scope="row">EARLY BIRD REGISTRATION</td>
                            <td>February 15, 2020</td>
                        </tr>
                        <tr>
                            <td scope="row">CAMERA-READY SUBMISSION DEADLINE</td>
                            <td> March 31, 2020</td>
                        </tr>
                        <tr>
                            <td scope="row">CONFERENCE DATES</td>
                            <td>May 6 - 8, 2020</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 sponsored">
                <h3><b>SPONSORED</b></h3><br>
                <img src="./src/img/logo-spondor.png" class="timeline" alt="">
                <img src="./src/img/logo.png" class="logo" alt="">
            </div>
        </div>
    </div><br>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 foot-organiz">
                    <h5><b>Organized by</b></h5>
                    <li>Department of Computer and Information Science, Faculty of Applied Science</li>
                    <li>King Mongkut’s University of Technology North Bangkok, Bangkok, Thailand</li>
                </div>
                <div class="col-md-6 foot-contact">
                    <h5><b>Contact</b></h5>
                    <span>Contact
                        Tel. 02-555-2000 to 4601, 4602 <br>
                        Email : jcsse2020@sci.kmutnb.ac.th</span>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="scrollToTop">Top</a>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="./src/script/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
        function authorregis() {
            window.open('./regis/portal/register.php', '_blank');
        }
        function authorlogin() {
            window.open('./regis/', '_blank');
        }

        function authorregisST() {
            window.open('./main/author-regis-status.php', '_blank');
        }

        function pregis() {
            window.open('./regis/participant/', '_blank');
        }

        function wsauthorlogin() {
            window.open('./workshop/portal/', '_blank');
        }

        function wsauthorregis() {
            window.open('./workshop/portal/register.php', '_blank');
        }
        function wspregis() {
            window.open('./workshop/participant/', '_blank');
        }
        function pregisST() {
            window.open('./main/participant-regis-status.php', '_blank');
        }
    </script>
</body>

</html>