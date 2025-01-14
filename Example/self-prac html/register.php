<?php
 include'connect.php';
 if(isset($_POST['Register'])){
    $name=$_POST['name'];
    $id=$_POST['id'];
    $course=$_POST['course'];
    $phoneNumber=$_POST['phoneNumber'];
    $email=$_POST['email'];
    $dob=$_POST['dob'];
    $sql="insert into 'b3_self_prac_html' (name,id,course,phone number,email address,date of birth) 
    values('$name','$id','$course','$phoneNumber','$email','$dob')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo 'data inserted successfully';
    }else{
      die(mysqli_error("Error"+$conn));
    }
 }


?>
