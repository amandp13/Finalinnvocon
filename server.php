
<?php
session_start();

$name = "";
$email = "";
$password = "";

$errors = array();

if(isset($_POST["btn"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];

$db = mysqli_connect('localhost','root','','innvocon') or die("Can't connect to Database");

if(empty($name)) 
{
    array_push($errors, "Name is required.");
}
if(empty($email)) 
{
    array_push($errors, "Email is required.");
}
if(empty($password)) 
{
    array_push($errors, "Password is required.");
}


$check = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
$results = mysqli_query($db ,$check);
$users = mysqli_fetch_assoc($results);
if($users)
{
    if($users['email'] === $email){array_push($errors, "This Email ID already exists");
   }
}

if(count($errors) == 0 )
{
  $password = md5($password);
  $query = "INSERT INTO user(name , email , password) VALUES('$name', '$email' , '$password')";
  
  $res=mysqli_query($db, $query);

}
}

$mail = "";

if(isset($_POST["btnx"]))
{
    $mail=$_POST["emailx"];

$dbx = mysqli_connect('localhost','root','','useremail') or die("Can't connect to Database");

if(empty($mail)) 
{
    array_push($errors, "Email is required.");
}

$checkx = "SELECT * FROM email WHERE emails = '$mail' LIMIT 1";
$resultsx = mysqli_query($dbx ,$checkx);
$usersx = mysqli_fetch_assoc($resultsx);
// if($usersx)
// {
//     if($usersx['emailx'] === $mail){array_push($errors, "This Email ID already exists");}
// }
if(count($errors) == 0 )
{
  $queryx = "INSERT INTO email(emails) VALUES('$mail')";
  
  $res=mysqli_query($dbx, $queryx);
}
}
?>