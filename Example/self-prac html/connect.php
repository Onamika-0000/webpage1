<?php
$conn=mysqli_connect('localhost','root','','b3_self_prac_html');
if($conn){
    echo "connection successfull";
}else{
    die(mysqli_error("Error"+$conn));
}


?>