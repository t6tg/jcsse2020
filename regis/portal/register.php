<?php 
  require_once('../../Database/jcsse2020-database.php');
  $sql_country = "select country from country";
  $result_country = $conn->query($sql_country);
?>
<!doctype html>
<html lang="en">

<head>
    <title>JCSSE-2020</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./regis_author.css">
    <link rel="icon" href="../../src/img/favicon.png">
</head>

<body>
    <div class="container">
        <div class="card-regis"><br>
            <h3 align="center" style="margin-top:30px">AUTHOR REGISTRATION</h3><br>
            <center>
                <form class="form-regis" name="myForm" enctype="multipart/form-data" action="insert.php" method="post">
                    <div lass="form-group">
                        <!-- Title  -->
                        <div class="form-group">
                            <label><b>Title <span style="color:red">*</span></b></label>
                            <select class="form-control" name="" id="">
                                <option value="-1" disabled selected>-- Please select --</option>
                                <option value="mr">Mr.</option>
                                <option value="mrs">Mrs.</option>
                                <option value="ms">Ms</option>
                                <option value="professor">Professor</option>
                                <option value="assistant">Assistant Professor</option>
                                <option value="associate">Associate Professor</option>
                            </select>
                        </div>
                        <!-- firstname -->
                        <label><b>First Name <span style="color:red">*</span></b></label>
                        <input type="text" class="form-control" name="fname" id="" aria-describedby="helpId"
                            placeholder="First name">
                        <!-- lastname --><br>
                        <label><b>Last Name <span style="color:red">*</span></b></label>
                        <input type="text" class="form-control" name="lname" id="" aria-describedby="helpId"
                            placeholder="Last name">
                        <!-- Badge --><br>
                        <label><b>Identity Card / Passport <span style="color:red">*</span></b></label>
                        <input type="text" class="form-control" name="badge" id="" aria-describedby="helpId"
                            placeholder="Identity card or passport"><br>
                        <label><b>Name Of Organization <span style="color:red">*</span></b></label>
                        <input type="text" class="form-control" name="badge" id="" aria-describedby="helpId"
                            placeholder="Name Of Organization"><br>
                        <label><b>Name Of Dept/Section <span style="color:red">*</span></b></label>
                        <input type="text" class="form-control" name="badge" id="" aria-describedby="helpId"
                            placeholder="Name Of Dept/Section">
                        <!-- Affiliation --><br>
                        <label><b>Username <span style="color:red">*</span></b></label>
                        <input type="text" class="form-control" name="username" id="username"
                            aria-describedby="helpId" placeholder="Username"><br>
                        <label><b>Password <span style="color:red">*</span></b></label>
                        <input type="text" class="form-control" name="password" id="password"
                            aria-describedby="helpId" placeholder="Password"><br>
                        <label><b>Confirm Password <span style="color:red">*</span></b></label>
                        <input type="text" class="form-control" name="cfpassword" id="cfpassword"
                            aria-describedby="helpId" placeholder="Confirm Password">
                    </div>
                    <!-- country --><br>
                    <div class="form-group">
                        <label><b>Country <span style="color:red">*</span></b></label>
                        <select class="form-control" name="country" id="">
                            <?php while($row_country = $result_country->fetch_assoc()){ ?>
                            <option value="<?php echo $row_country['country']; ?>">
                                <?php echo $row_country['country']; ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                    <!-- email -->
                    <label><b>Email <span style="color:red">*</span></b></label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId"
                        placeholder="Email">
                    <!-- phone --><br>
                    <label for=""><b>Phone: <span style="color:red">*</span></b></label>
                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone">
                    <!-- Banquet --><br>
                    <label><b>Banquet <span style="color:red">*</span></b></label>
                    <div class="form-group">
                        <select class="form-control" name="banquet" id="banquet">
                            <option value="-1" disabled selected>-- Please select --</option>
                            <option value="1">Attend</option>
                            <option value="0">Not Attend</option>
                        </select>
                    </div>
                    <label><b>Extra Banquet Ticket <span style="color:red">*</span></b></label>
                    <div class="form-group">
                        <select class="form-control" name="banquet" id="banquet">
                            <option value="0" selected>0</option>
                            <?php for($i = 1 ; $i <= 10 ;$i++){ ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <label><b>Welcome Reception <span style="color:red">*</span></b></label>
                    <div class="form-group">
                        <select class="form-control" name="banquet" id="banquet">
                            <option value="-1" disabled selected>-- Please select --</option>
                            <option value="1">Join</option>
                            <option value="0">Not Join</option>
                        </select>
                    </div>
                    <!-- special menu -->
                    <label><b>Special Menu <span style="color:red">*</span></b></label>
                    <div class="form-group">
                        <select class="form-control" onchange="food()" name="special" id="special">
                            <option value="-1" disabled selected>-- Please select --</option>
                            <option value="normal">Normal</option>
                            <option value="halal">Halal</option>
                            <option value="vegeterian">vegeterian</option>
                            <option value="other">Other (Please Specific)</option>
                        </select>
                    </div>
                    <div class="form-group" id="other-menu" style="display:none">
                        <label><b>Special Menu <span style="color:red">*</span></b></label>
                        <input type="text" class="form-control" name="menu" id="menu" /><br>
                    </div>
                    <!-- Note (optional) -->
                    <div class="form-group">
                        <label><b>Note (optional)</b></label>
                        <textarea class="form-control" name="note" id="" rows="3"></textarea>
                    </div>
                    <!-- Participant Status -->
                    <label><b>Participant Status <span style="color:red">*</span></b></label>
                    <div class="form-group">
                        <select class="form-control" onchange="calculate()" name="ieee" id="ieee">
                            <option value="-1" disabled selected>-- Please select --</option>
                            <option value="1">IEEE Member</option>
                            <option value="0">Non-IEEE Member/Accompanying person/Student</option>
                            <option value="2">JCSSE Committee/ JCSSE Reviewer</option>
                            <option value="3">Student Observer</option>
                        </select>
                        <div class="form-group" id="ieee-div"
                            style="border:1px solid;border-radius:10px;padding:20px;display:none;margin-top:10px">
                            <label for=""><b>IEEE Member File <span style="color:red">*</span></b></label>
                            <input type="file" class="form-control-file" name="ieeefile" id="ieee-file" placeholder=""
                                aria-describedby="fileHelpId">
                            <br>
                        </div>
                    </div>
                    <div class="price">
                        <p><label id="price">0.00</label>THB</p>
                        <input type="hidden" name="totalfee" id="totalfee" value="0">
                    </div> <b style="color:red">* foreigner +2000 THB</b><br>
                    <!-- Payment Method * --><br>
                    <label><b>Payment Method <span style="color:red">*</span></b></label>
                    <div class="form-group">
                        <select class="form-control" name="payment" id="payment">
                            <option value="-1" disabled selected>-- Please select --</option>
                            <option value="1">Credit Card</option>
                            <option value="2">Bank Transfer</option>
                        </select>
                    </div>
                    <!-- submit -->
                    <button onclick="validateForm()" class="btn"><b>REGISTRATION</b></button>
                    <br><br><br>
                    <center><a href="../participant/"><b>Paritcipant Registration</b></a><br><br><Br></center>
                </form>
            </center>
        </div>
    </div>
    <script>
    function validateForm() {
        var fname = document.forms["myForm"]["fname"].value;
        var lname = document.forms["myForm"]["lname"].value;
        // var badge = document.forms["myForm"]["badge"].value;
        var email = document.forms["myForm"]["email"].value;
        var affiliation = document.forms["myForm"]["affiliation"].value;
        var country = document.forms["myForm"]["country"].value;
        var username = document.forms["myForm"]["username"].value;
        var password = document.forms["myForm"]["password"].value;
        var cfpassword = document.forms["myForm"]["cfpassword"].value;
        var banquet = document.forms["myForm"]["banquet"].value;
        var special = document.forms["myForm"]["special"].value;
        var menus = document.forms["myForm"]["menu"].value;
        var ieees = document.forms["myForm"]["ieee"].value;
        var ieeefile = document.forms["myForm"]["ieee-file"].value;
        var payment = document.forms["myForm"]["payment"].value;
        var phone = document.forms["myForm"]["phone"].value;
        if (fname == "") {
            alert("Please Input First Name");
            return false;
        }
        if (lname == "") {
            alert("Please Input Last Name");
            return false;
        }
        if(username == ""){
            alert("Please Input Username");
            return false;
        }if(password == ""){
            alert("Please Input Password");
            return false;
        }
        if(cfpassword == ""){
            alert("Please Input Confirm-Password");
            return false;
        }if(password != cfpassword){
            alert("Please set your password for the same.");
            return false;
        }
        if (country == "") {
            alert("Please Input Country");
            return false;
        }
        if (email == "") {
            alert("Please Input Email");
            return false;
        }
        if (phone == "") {
            alert("Please input phone number");
            return false;
        }
        if (banquet == '-1') {
            alert("Please choose Banquet");
            return false;
        }
        if (special == '-1') {
            alert("Please choose Special Menu");
            return false;
        }
        if (special == 'other') {
            if (menus == '') {
                alert("Please input Special Menu");
                return false;
            }
        }
        if (ieees == '-1') {
            alert("Please choose Participant Status");
            return false;
        }
        if (ieees == "") {
            alert("Please choose Participant Status");
            return false;
        }
        if (ieees == '1') {
            if (ieeefile == "") {
                alert("Please choose IEEE member File");
                return false;
            }
        }
        if (payment == '-1') {
            alert("Please choose Payment Method");
            return false;
        }
        if (payment == "") {
            alert("Please choose Payment Method");
            return false;
        }
        if (confirm("Confirm your information")) {
            document.getElementById("myForm").submit();
        }
    }

    function food() {
        var food = document.getElementById("special").value;
        var menus = document.getElementById("menu").value;
        if (food == 'other') {
            document.getElementById("other-menu").style.display = 'inline';
        } else {
            document.getElementById("other-menu").style.display = 'none';
        }
    }

    function calculate() {
        var ieee = document.getElementById("ieee").value;
        var time = 1579107600000;
        var total = 0;
        if (ieee == 1) {
            if (Date.now() < time) {
                total = 4500;
                document.getElementById("ieee-div").style.display = 'inline-block';
            } else {
                total = 5500;
                document.getElementById("ieee-div").style.display = 'inline-block';
            }
        } else if (ieee == 0) {
            if (Date.now() < time) {
                total = 5500;
                document.getElementById("ieee-div").style.display = 'none';
            } else {
                total = 6500;
                document.getElementById("ieee-div").style.display = 'none';
            }
        } else if (ieee == 2) {
            if (Date.now() < time) {
                total = 4500;
                document.getElementById("ieee-div").style.display = 'none';
            } else {
                total = 5500;
                document.getElementById("ieee-div").style.display = 'none';
            }
        } else if (ieee == 3) {
            if (Date.now() < time) {
                total = 3000;
                document.getElementById("ieee-div").style.display = 'none';
            } else {
                total = 3500;
                document.getElementById("ieee-div").style.display = 'inline-block';
            }
        }
        document.getElementById("price").innerHTML = total;
        document.getElementById("totalfee").value = total;
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>