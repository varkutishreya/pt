<?php  
$name = $rollno= $email = $password = $branch= $year= $cc= $cf= $spoj= $repassword = "";
if (isset($_POST["submit"])) {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[A-Z][a-zA-Z]{5,100}/",$name)) {
      header("Location:signup.html");
    }

    $rollno=test_input($_POST["rollno"]);
    if(!preg_match("/^[0-9A-Z][10]/",$rollno)){
        header("Location:signup.html");
    }
  
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!preg_match("/^[a-zA-Z0-9_]+[@](vardhaman)[.](org)/", $email)) {
      header("Location:signup.html");
    }
    
    $password = test_input($_POST["password"]);
    // check if URL address syntax is valid
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@%$#_])(?=.[8])/",$password)) {
      header("Location:signup.html");
    } 

    $repassword = test_input($_POST["repassword"]);
    if($password!=$repassword){
       header("Location:signup.html"); 
    }

    $branch = test_input($_POST["branch"]);

    $year = test_input($_POST["year"]);
   // if(!preg_match("(?:(?:20)[0-9]{2})",$year){
     //  header("Location:signup.html"); 
    //}
    $cc = test_input($_POST["codechef"]);
    $cf = test_input($_POST["codeforces"]);
    $spoj = test_input($_POST["spoj"]);


  $con=mysqli_connect('localhost','root','root','user_registration') or die(mysqli_error());  
    //smysqli_select_db() or die("cannot select DB");    
    $sql="INSERT INTO register(name,rollno,email,password,branch,year,codechef,codeforces,spoj) VALUES('$name','$rollno','$email','$password','$branch','$year','$cc','$cf','$spoj')";  
  
    $result=mysqli_query($con,$sql);  
    if($result){  
       header("Location:pat.html");
       exit(); 
    } 
    else {  
     header("Location:signup.html");
     exit();
    }  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
