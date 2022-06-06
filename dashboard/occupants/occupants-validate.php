<?php
$db = mysqli_connect('localhost', 'root', '', 'boardinghouse_system');
  
if(!$db){
    echo "Error db connection";
}

if(!isset($_SESSION)) { 
    session_start(); 
}

if(isset($_POST['editoccupant'])){

    $id=$_SESSION['occupant_id'];

    $query = "SELECT * FROM occupants WHERE id=$id";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
    $user_id = $row['user_id'];

    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = ($_POST['gender'] == "Male") ? "Male" : "Female";
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $room_id = $_POST['room'];
    
    $phone = preg_replace('/[^0-9]/', '', $contact);

    $query = "UPDATE occupants SET firstname = '$firstName', lastname = '$lastName', gender = '$gender' , address = '$address', contact = '$phone', room_id = '$room_id' WHERE id = '{$id}'";
    mysqli_query($db, $query);

    $query = "UPDATE users SET username = '$username', password = '$password' WHERE id = {$user_id}";
    mysqli_query($db, $query);

    // $result='<div class="alert alert-success">Thank You! I will be in touch</div>';

    mysqli_close($db);
    header('location: occupants.php');	
    exit();
    
}

if(isset($_GET['delete'])){

    $id=$_GET['delete'];

    $query = "SELECT * FROM occupants WHERE id=$id";
    $result = mysqli_query($db, $query);

    $row = mysqli_fetch_array($result);
    $user_id = $row['user_id'];

    $query2 = "DELETE FROM occupants WHERE id='$id'";        
    mysqli_query($db, $query2);

    $query3 = "DELETE FROM users WHERE id='$user_id'";     
    mysqli_query($db, $query3);
    

    // $result='<div class="alert alert-success">Thank You! I will be in touch</div>';

    mysqli_close($db);
    header('location: occupants.php');	
    exit();
}

?>