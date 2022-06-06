<?php
$db = mysqli_connect('localhost', 'root', '', 'boardinghouse_system');

if(!$db){
    echo "Error db connection";
}

if(!isset($_SESSION)) { 
    session_start(); 
}

$id=$_SESSION['id'];

if(isset($_POST['confirm'])){

$query = "SELECT * FROM reservations WHERE id='{$_SESSION['id']}'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
$user_id = $row['user_id'];

$room_id = $_POST['room'];

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = ($_POST['gender'] == "Male") ? "Male" : "Female";
$address = $_POST['address'];
$contact = $_POST['contact'];

insertdb($firstName, $lastName, $gender, $address, $contact, $user_id, $room_id, $_SESSION['id']);

}


if(isset($_GET['delete'])){

    $id=$_GET['delete'];

    $query = "SELECT * FROM reservations WHERE id=$id";
    $result = mysqli_query($db, $query);

    $row = mysqli_fetch_array($result);
    $user_id = $row['user_id'];

    $query2 = "DELETE FROM reservations WHERE id='$id'";        
    mysqli_query($db, $query2);

    $query3 = "DELETE FROM users WHERE id='$user_id'";     
    mysqli_query($db, $query3);
    

    // $result='<div class="alert alert-success">Thank You! I will be in touch</div>';

    mysqli_close($db);
    header('location: reservations.php');	
    exit();
}


function insertdb($firstName, $lastName, $gender, $address, $contact, $user_id, $room_id, $id){
    $db = mysqli_connect('localhost', 'root', '', 'boardinghouse_system');

    if(!$db){
        echo "Error db connection";
    }

        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d H:i:s');
        $duedate = date('Y-m-d H:i:s', strtotime("+1 month"));

        $query = "INSERT INTO occupants (firstname, lastname, gender, address, contact, reservation, duedate, room_id, `user_id`) VALUES('{$firstName}', '{$lastName}', '{$gender}', '{$address}', '{$contact}', '{$date}', '{$duedate}', '{$room_id}', '{$user_id}')";
        mysqli_query($db, $query);

        $query = "DELETE FROM reservations WHERE id='$id'";        
        mysqli_query($db, $query) or die(mysqli_error($db));
    
        mysqli_close($db);
    
        header('location: reservations.php');	
        exit();
}

?>