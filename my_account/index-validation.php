<?php

if(!isset($_SESSION)) { 
    session_start(); 
}

$username = $_POST['username'];
$password = $_POST['password'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = ($_POST['gender'] == "Male") ? "Male" : "Female";
$address = $_POST['address'];
$contact = $_POST['contact'];



if(empty($username)){
    $username_error = 'Please enter username';
}
else if(usernameExist($username)){
    $username_error = 'Sorry username already taken';
    if($username == $_POST['username']){
        $username_error = '';
    }
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
    $contact_error = 'Please enter contact';
}
else if(!filter_var($contact, FILTER_SANITIZE_NUMBER_FLOAT)){
    $contact_error = 'Invalid contact number';
}

if(empty($username_error) && empty($password_error) && empty($firstName_error) && empty($lastName_error) && empty($address_error) && empty($contact_error)){
    
    editdb($username, $password, $firstName, $lastName, $gender, $address, $contact);
}
else{
    include('index.php');
}

function editdb($username, $password, $firstName, $lastName, $gender, $address, $contact){
    $db = mysqli_connect('localhost', 'root', '', 'boardinghouse_system');

    if(!$db){
        echo "Error db connection";
    }
    
    else{
        $phone = preg_replace('/[^0-9]/', '', $contact);

        $query = "UPDATE occupants SET firstname = '$firstName', lastname = '$lastName', gender = '$gender' , address = '$address', contact = '$phone' WHERE id = {$_SESSION['occupant_id']}";
        mysqli_query($db, $query);

        $query = "UPDATE users SET username = '$username', password = '$password' WHERE id = {$_SESSION['user_id']}";
        mysqli_query($db, $query);

        mysqli_close($db);

        header('location: index.php');	
        exit();
    }
    

}

function usernameExist($username){
    $db = mysqli_connect('localhost', 'root', '', 'boardinghouse_system');

    if(!$db){
        echo "Error db connection";
    }
    else{
        $query = "SELECT * FROM users WHERE username = '".$username."'";
        $result = mysqli_query($db, $query);

        if(mysqli_num_rows($result) > 0 ){
            return true;
        }
        return false;
    }

}


?>