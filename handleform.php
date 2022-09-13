<?php


$email = "";
$password = "";
$cpassword = "";
$passwordErr="";

var_dump($_GET);
echo "<br>";
var_dump($_POST);



// For Email we must make sure that the 
$errors=array();
if(!empty($_POST['email'])) {
    $email = $_POST['email'];
if (filter_var($email , FILTER_VALIDATE_EMAIL)!==$email) {
  $errors[]="Email is not valid";
}
}
if($errors){
    var_dump($errors);
}






if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["cpassword"])) {
    $password = test_input($_POST["password"]);
    $cpassword = test_input($_POST["cpassword"]);
    if (strlen($_POST["password"]) <= '8') {
        $passwordErr = "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[0-9]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
}
elseif(!empty($_POST["password"])) {
    $cpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
} else {
     $passwordErr = "Please enter password   ";
}

echo "<br>";

echo $passwordErr;
echo $cpasswordErr;








function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
