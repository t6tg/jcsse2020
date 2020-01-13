<?php 
    session_start();
    require_once("../../../../Database/jcsse2020-database.php");
    if($_SESSION['username'] == "" || $_SESSION['permission'] != "author"){
        header("Location:../../logout.php");
    }
    
    $paper = $_GET['paper'];
    $sql_edas = "SELECT * FROM edas where paper_id='$paper'";
    $result_edas = $conn->query($sql_edas);
    $row = $result_edas->fetch_assoc();
    if($row['from'] == "edas"){
        header("Location:../author.php");
    }
    else if($row['jfrom'] == "jcsse"){
        $delete = "DELETE FROM edas WHERE paper_id='$paper'";
        if ($conn->query($delete) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        header("Location:../author.php");
    }else{
        header("Location:../author.php");
    }
    mysqli_close($conn);
?>
    