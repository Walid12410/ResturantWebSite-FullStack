<?php


include 'connection.php';

$dateerror= $dayerror = $timeerror= $peopleerror= $nameerror=$phoneerror=$commenterror=$usernameerror="";

if(isset($_POST['Date']) && isset($_POST['Day'])&& isset($_POST['Time'])&&
 isset($_POST['people']) && isset($_POST['Name'])&& isset($_POST['userName'])&& 
 isset($_POST['phone']) && isset($_POST['comment'])){

    function validate($data){
        
        $data=trim($data);
        $data= stripslashes($data);
        $data= htmlspecialchars($data);
        return $data;   
    }

    if(empty($_POST['Date'])){
        $dateerror= "* date is required";
    }else{
        $date = validate($_POST['Date']);
        if (!preg_match($pattern, $date)) {
            $dateerror = '* Invalid date format';
        }
    }
    if(empty($_POST['Day'])){
        $dayerror = "* Day is required";
    }else{
        $day = validate($_POST['Day']);
    }
    if(empty($_POST['Time'])){
        $timeerror = '* Time is required';
    }else{
        $time = validate($_POST['Time']);
    }
    if(empty($_POST['people'])){
        $peopleerror = '* enter how many people in reservation';
    }else{
        $people = validate($_POST['people']);
    }
    if(empty($_POST['Name'])){
        $nameerror = '* Enter Your Name';
    }else{
        $name = validate($_POST['Name']);
        if (!preg_match('/^[a-zA-Z\s]+$/', $_POST['Name'])) {
            $nameerror = '* Only letters and white spaces allowed';
        }
    }
    if(empty($_POST['userName'])){
        $usernameerror = '* required your Username';
    }else{
        $username = validate($_POST['userName']);
    }
    if(empty($_POST['phone'])){
        $phoneerror = '* phonenumber is required';
    }else{
        $phone = validate($_POST['phone']);
    }

if($dateerror=="" && $timeerror== "" && $dayerror=="" && $peopleerror=="" && $commenterror && 
$usernameerr == "" && $nameerror=="" && $phoneerror=="" ){
    $sql = "INSERT INTO reservations (date, day, time, 
    people, name, username, phone, comment ) VALUES ('$date', '$day', 
    '$time', '$people', '$name', '$username', '$phone', '$comment')";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            mysqli_close($conn);
            header("Location: reservation.php");
            exit();
  }
}

?>

