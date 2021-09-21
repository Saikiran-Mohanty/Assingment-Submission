<?php

include 'dbcon.php';
if(isset($_POST['submit'])){

$Username = $_POST['Username'];
$Registration = $_POST['Registration'];
$Email = $_POST['Email'];
$File = $_FILES['File'];
$Text = $_POST['Text'];

$Filename = $File['name'];
$Filepath = $File['tmp_name'];
$Fileerror =$File['error'];

if($Fileerror == 0){
    $DestFile = 'upload/'.$Filename;

    move_uploaded_file($Filepath,$DestFile);

    $insertquery = "insert into `submission`(`Username`,`Registration`,
    `Email`,`File`,`Text`) values('$Username', '$Registration', '$Email', '$DestFile', '$Text')";
    $query = mysqli_query($con, $insertquery) or die(mysqli_error($con));
    

    if($query)
        echo "Inserted";
    else
        echo "Not Inserted"; 
    
}

}else
    echo "Nothing was uploaded";



?>