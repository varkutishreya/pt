<?php  
$rollno= $password = $dbrollno=$dbpassword="";
if (isset($_POST["submit"])) {
    $rollno = test_input($_POST["rollno"]);
    $password=test_input($_POST["password"]);


  $con=mysqli_connect('localhost','root','root','user_registration') or die(mysqli_error());  
    //smysqli_select_db() or die("cannot select DB");    
    $sql="SELECT * FROM register WHERE rollno='".$rollno."' AND password='".$password."'";
    $result=mysqli_query($con,$sql);  
    while($row=mysqli_fetch_assoc($result))  
    {  
    $dbrollno=$row['rollno'];  
    $dbpassword=$row['password'];  
    } 
    if($dbrollno=="15881A12B9" && $dbpassword=="Admin@12"){
      header("Location: admin.html");
    }
    elseif ($dbrollno==$rollno && $dbpassword==$password) {
      header("Location: dashboard.html");
     }
     else{
      header("Location: index.html");
     } 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
