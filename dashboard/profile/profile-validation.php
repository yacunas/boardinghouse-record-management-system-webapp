<?php

if(!isset($_SESSION)) { 
    session_start(); 
}

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$username = $_POST['username'];
$password = $_POST['password'];

if(empty($username)){
    $username_error = 'Please enter username';
}

if(empty($password)){
    $password_error = 'Please enter password';
}

if(empty($firstName)){
    $firstName_error = 'Please enter firstname';
}

if(empty($lastName)){
    $lastName_error = 'Please enter lastname';
}

if(empty($address)){
    $address_error = 'Please enter address';
}

if(empty($contact)){
    $contact_error = 'Please enter contact number';
}
else if(!filter_var($contact, FILTER_SANITIZE_NUMBER_FLOAT)){
    $contact_error = 'Invalid contact number';
}


if(empty($username_error) && empty($password_error) && empty($firstName_error) && empty($lastName_error) && empty($address_error) && empty($contact_error)){
    
    editdb($username, $password, $firstName, $lastName, $address, $contact);
}
else{
    include('profile.php');
}

function editdb($username, $password, $firstName, $lastName, $address, $contact){
    $db = mysqli_connect('localhost', 'root', '', 'boardinghouse_system');

    if(!$db){
        echo "Error db connection";
    }
    
    else{
        $phone = preg_replace('/[^0-9]/', '', $contact);

        $query = "UPDATE admin SET firstname = '$firstName', lastname = '$lastName', address = '$address', contact = '$phone'";
        mysqli_query($db, $query);

        $query = "UPDATE users SET username = '$username', password = '$password' WHERE user_type = 'admin'";
        mysqli_query($db, $query);

        mysqli_close($db);

        header('location: profile.php');	
        exit();
    }
    

}

?>