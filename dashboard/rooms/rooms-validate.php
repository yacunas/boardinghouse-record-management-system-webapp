<?php
$db = mysqli_connect('localhost', 'root', '', 'boardinghouse_system');
  
if(!$db){
    echo "Error db connection";
}

if(!isset($_SESSION)) { 
    session_start(); 
}

if(isset($_POST['addroom'])){

    $room = $_POST['room'];
    $rate = $_POST['rate'];

    $query = "INSERT INTO rooms (room, rate) 
    VALUES('$room', '$rate')";
    mysqli_query($db, $query);

    $result='<div class="alert alert-success">Thank You! I will be in touch</div>';

    mysqli_close($db);
    header('location: rooms.php');	
    exit();

}

if(isset($_POST['editroom'])){

    $id=$_SESSION['room_id'];

    $room = $_POST['room'];
    $rate = $_POST['rate'];

    $query = "UPDATE rooms SET room = '$room', rate = '$rate' WHERE id = '{$id}'";
    
    mysqli_query($db, $query);
 
    // $result='<div class="alert alert-success">Thank You! I will be in touch</div>';

    mysqli_close($db);
    header('location: rooms.php');	
    exit();
}

if(isset($_GET['delete'])){

    $id=$_GET['delete'];

    $query = "DELETE FROM rooms WHERE id='$id'";        
    
    mysqli_query($db, $query);

    // $result='<div class="alert alert-success">Thank You! I will be in touch</div>';

    mysqli_close($db);
    header('location: rooms.php');	
    exit();
}

?>