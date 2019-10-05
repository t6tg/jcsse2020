<?php 
    $id = $_GET['id'];
    require_once('../../Database/jcsse2020-database.php');
    $sql = "select * from general_ticket where unique_code='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="./regis-paticipant.css">
    <link rel="stylesheet" href="../../src/css/main.css">
    <link rel="icon" href="../../src/img/favicon.png">
</head>

<body>
    <div class="container">
        <center>
            <div class="card-regis" style="margin-bottom: 40px;"><br>
                <h3 align="center" style="margin-top:30px">PARTICIPANT REGISTRATION ( PAYMENT )</h3><br>
                <div class="callout" style="width: 70%;border-left: 4px orange solid">
                    <p style="text-align:left"><b>If you wish to pay later, please copy the link so you can return to
                            proceed with the payment.</b></p>
                </div><br>
                <div>
                    <input type="text" style="padding:10px;width:60%;background-color: #eee;border:none;color:#333;"
                        value="<?php echo "http://jcsse2020.cs.kmutnb.ac.th/regis/participant/payment.php?id=",$id ;?>"
                        id="myInput" readonly />
                    <button style="padding:10px;width:10%;color:#fff;background-color:#777" onclick="myFunction()"><i
                            class="fa fa-clipboard"></i></button></div><br>
                <span><input type="text"
                        style="padding:10px;width:40%;background-color: orange;border:none;color:#fff;border-radius: 10px;text-align:center"
                        value="Price : <?php echo $row['price'];?> THB." readonly /></span><br><br>
                <?php if($row['pay_method'] == "1"){ ?>
                <?php if($row['pay_st'] == ""){?>
                <!-- //row1 -->
                <div class="row">
                    <div class="col-md-6">
                        <h4><b>Credit Card Payment</b></h4>
                        <form id="checkoutForm" method="POST" action="">
                            <script type="text/javascript" src="https://cdn.omise.co/omise.js"
                                data-key="pkey_test_5hf4ps01m8g5qxyrzw7" data-amount="<?php echo $row['price'] * 100;?>"
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
                    </div>
                    <div class="col-md-6"><br>
                        <div class="status-fail status" id="status">
                            <span>NOT PAID</span>
                        </div>
                    </div>
                </div> <?php }else{ ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="status-success status" id="status">SUCCESSFUL</div><br>
                        <?php if($row['receipt_name'] == ""){ ?>
                        <form action="" style="width:70%" method="post">
                            <div class="form-group">
                                <label style="float:left"><b>Receipt Name <span style="color:red;">*</span></b></label>
                                <input type="text" name="receipt_name" id="" class="form-control"
                                    placeholder="Receipt Name" aria-describedby="helpId">
                                <br>
                                <label style="float:left"><b>Receipt Addrees <span
                                            style="color:red;">*</span></b></label>
                                <div class="form-group">
                                    <textarea class="form-control" name="receipt_address" id="" rows="3"></textarea>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <?php }else{  ?>
                        <form action="" style="width:70%" method="post">
                            <div class="form-group">
                                <label style="float:left"><b>Receipt Name <span style="color:red;">*</span></b></label>
                                <input type="text" id="" class="form-control" value="<?php echo $row['receipt_name'] ?>"
                                    disabled>
                                <br>
                                <label style="float:left"><b>Receipt Addrees <span
                                            style="color:red;">*</span></b></label>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="<?php echo $row['receipt_address']; ?>"
                                        id="" rows="3" disabled></textarea>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <button type="submit" class="btn btn-primary" disabled>Submit</button>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
                        <?php }else { 
                                if($row['receipt_name'] != ""){ ?>
                                <?php if($row['pay_st'] == '-1'){ ?>
                                         <div class="status-success status" style="background-color:orange" id="status">Awaiting review</div><br>
                                <?php }else if($row['pay_st'] == '1'){ ?>
                                    <div class="status-success status"  id="status">SUCCESSFUL</div><br>
                                <?php }else if($row['pay_st'] == '0'){ ?>
                                    <div class="status-success"  style="background-color:red" id="status">FAIL</div><br>
                                <?php } ?>
                                
                                        <form action="transfer.php" style="width:70%;text-align:left"  method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                          <label for=""><b>Receipt Name<span style="color:red">*</span></b></label>
                                          <input type="text"  class="form-control" id="" aria-describedby="helpId" placeholder="<?php echo $row['receipt_name'] ?>" disabled/><br>
                                          <label for=""><b>Receipt Adress<span style="color:red">*</span></b></label>
                                        <textarea class="form-control" placeholder="<?php echo $row['receipt_address'];?>" id="" rows="3" disabled></textarea><br>
                                        <input type="submit" class="btn btn-primary" disabled>
                                    </div>
                               </form>
                               <?php  }else { ?>
                                <form action="transfer.php" style="width:70%;text-align:left"  method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                        <label for=""><b>File upload <span style="color:red">*</span></b></label><br>
                                          <input type="file" class="form-control-file" name="slip_file" id="" placeholder="" aria-describedby="fileHelpId"/><br>
                                          <label for=""><b>Receipt Name<span style="color:red">*</span></b></label>
                                          <input type="text"  class="form-control" name="receipt_name" id="" aria-describedby="helpId" placeholder=""/><br>
                                          <label for=""><b>Receipt Adress<span style="color:red">*</span></b></label>
                                        <textarea class="form-control" name="receipt_address" id="" rows="3"></textarea><br>
                                        <input type="hidden" name="myid" value="<?php echo $id ;?>">
                                        <input type="submit" name="submit" class="btn btn-primary">
                                    </div>
                               </form>
                        <?php } } ?>
                <br>
            </div>
        </center>
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
        <script>
        function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
            alert("Copied the text: " + copyText.value);
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
<?php 
        $r_n = html_entity_decode(trim($_POST['receipt_name']));
        $r_a = html_entity_decode(trim($_POST['receipt_address']));
        if($r_n != "" && $r_a != ""){
        $sql_receipt = "UPDATE general_ticket SET receipt_name='$r_n' , receipt_address='$r_a' WHERE unique_code='$id'";

        if(mysqli_query($conn,$sql_receipt)){
            echo "<script>alert('update successful')</script>";
        }else{
            echo "<script>alert('error')</script>";
        }
    }
    $id = $_GET['id'];
    require_once('../../Database/jcsse2020-database.php');
    $sql = "select * from general_ticket where unique_code='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    require_once './omisephp/lib/Omise.php';
    define('OMISE_PUBLIC_KEY', 'pkey_test_5hf4ps01m8g5qxyrzw7');
    define('OMISE_SECRET_KEY', 'skey_test_5ezwuh1uatm5fpq1zr2');
    $charge = OmiseCharge::create(array(
        'amount' => $row['price'] * 100,
        'currency' => 'thb',
        'card' => $_POST['omiseToken']
    ));
    if($charge['status'] == 'successful'){
        $sql_paid = "UPDATE general_ticket SET pay_st='1' WHERE unique_code='$id'";
        mysqli_query($conn,$sql_paid);
    }
    mysqli_close($conn);
?>