<?php 
    session_start();
    require_once("../../../../Database/jcsse2020-database.php");
    if($_SESSION['username'] == "" || $_SESSION['permission'] != "author"){
        header("Location:../../logout.php");
    }
    
    
    $name = $_SESSION['name'];
    $paper = $_POST['paper_name'] ;
    $paper_id = 'jcsse_'.md5($paper);
    $catagories = $_POST['catagories'];
    $page = $_POST['page'];
    $file = strtolower($_FILES['paper_file']['name']);
    $type= strrchr($file,".");

    if($type != ".pdf"){
        header("Location:../author.php");
    }
    else if($paper != "" && $catagories != "" && $page != "" && $file != ""){ 
        $row_ch = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `edas` WHERE `paper_name` = '$paper' and `author_name` = '$name'"));
        if($row_ch > 0){
            header("Location:../author.php");
        }
        else{
            move_uploaded_file($_FILES["paper_file"]["tmp_name"],"../paper_jcsse2020_file_upload/".$paper."_".$name.".pdf");
            $sql = "INSERT INTO edas (paper_id,author_name,paper_name,catagories,jpage,jfrom) 
            VALUES ('$paper_id','$name','$paper','$catagories','$page', 'jcsse')";
            if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('New record created successfully')</script>";
                    header("Refresh:0,url=../author.php");
                } else {
                header("Refresh:0,url=../author.php");
            }
        }
    }else{
        
    }


?>