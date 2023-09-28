<?php
$submit = false;
if(isset($_POST['name'])){
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server,$username,$password);

if(!$con){
    die("connection to this database failed due to" .mysqli_connect_error());
}
// echo "Success connecting to the db";

$name = $_POST['name']; 
$gender = $_POST['gender']; 
$age = $_POST['age']; 
$email = $_POST['email']; 
$phone = $_POST['phone']; 
$desc = $_POST['desc']; 
$sql = "INSERT INTO `iitm_trip`.`mytable` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Others`, `Date`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql;

if($con->query($sql) == true){
    //echo "successfully inserted";
    $submit = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}

$con->close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpeg" alt="bg-image">
 <div class="container">
    <h1>Welcome to IITM-Janakpuri Trip Form</h1>
    <p>fill the Empty box and Submit your form</p>
    <?php
    if( $submit == true){
    echo "<p class='frm_sbmt'>Form Submit Successfully</p>";
    }
    ?>

    <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter Your Name">
        <input type="text" name="age" id="age" placeholder="Enter Your Age">
        <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
        <input type="email" name="email" id="email" placeholder="Enter Your Email">
        <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone No.">
        <textarea name="desc" id="" cols="30" rows="10" placeholder="Enter Your Information Here"></textarea>
        <button class="btn">Submit</button>
      
    </form>
 </div>



    <script src="index.js"></script>

    
</body>
</html>