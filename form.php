<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
$full_name=$_POST["full_name"];
$phone_number=$_POST["phone_number"];
$email=$_POST["email"];
$subject=$_POST["subject"];
$message=$_POST["message"];


$errors=array();
$full_name=$_POST["full_name"];
$phone_number=$_POST["phone_number"];
$email=$_POST["email"];
$subject=$_POST["subject"];
$message=$_POST["message"];

if(empty($full_name)){
    $errors[]=" Name is required";
}elseif(!preg_match("/^[a-zA-Z ]*$/",$full_name)){
    $errors[]="Name should only contain letters and spaces";
}

if(empty($phone_number)){
    $errors[]="Phone number is required";
}else{
    if(!preg_match ("/^[0-9]*$/", $phone_number)){
        $errors[] = "Phone number should contain only numbers";
    }
    if(strlen ($phone_number) != 10){
        $errors[]="Phone number must contain 10 digits";
    }
}

if(empty($email)){
    $errors[] ="Email address is required ";
}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors[]="Valid Email is required";
}

if(empty($subject)){
    $errors[]="Subject field is required.";
}

if(empty($message)){
    $errors[]="Message is required";
}

if(empty($errors)){
    $host="localhost";
    $username="root";
    $password="";
    $dbname="contact form";

    $conn=new mysqli($host,$username,$password,$dbname);
    if($conn->connect_error){
        die("Connection Failed: ".$conn->connect_error);
    }

$ip_address=$_SERVER['REMOTE_ADDR'];
$timestamp=date('Y-m-d H:i:s');
$sql = "INSERT INTO contact_form(full_name,phone_number,email,subject,message,ip_address,timestamp) 
VALUES ('$full_name','$phone_number','$email','$subject', '$message' ,'$ip_address','$timestamp')";

if($conn->query($sql)==TRUE){

    $to="murarithakur32@gmail.com";
    $subject= " New Form Submission";
    $message="Name: $full_name\nPhone:$phone_number\nEmail:$email\nSubject:$subject\nMessage:$message";
    mail($to,"$subject","$message");
    $success_message= "Form submitted successfully";

    header("Location: success.php");
        exit();
}else{
    $error_message="Error:".$sql."<br>".$conn->error;
}

$conn->close();
}

}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Form Submission</title>
</head>
<body>
    <?php
    if (!empty($errors)) {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
    if (isset($success_message)) {
        echo "<p>$success_message</p>";
    }
    if (isset($error_message)) {
        echo "<p>$error_message</p>";
    }
    ?>
</body>

</html>