<?php

if(!isset($_SESSION)) { 
    session_start(); 
}

$previous_location = $_SESSION['previous_location'];

if($previous_location=='login'){

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    
    if(empty($username)){
        $username_error = 'Please enter username';
    }
    
    if(empty($password)){
        $password_error = 'Please enter password';
    }
    
    if(empty($username_error) && empty($password_error)){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
       
        accessdb($username, $password);
    }
    else{
        include('login.php');
    }
    

}

elseif ($previous_location == 'signup') {
    $username = $_POST['username'];
    $password1 = $_POST['password_1'];
    $password2 = $_POST['password_2'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['radio_gender'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    
    if(empty($username)){
        $username_error = 'Please enter username';
    }
    else if(usernameExist($username)){
        $username_error = 'Sorry username already taken';
    }
    else if(strlen($username)<5){
        $username_error = 'Minimum of 5 characters required';
    }
    
    if(empty($password1)){
        $password1_error = 'Please enter password';
    }

    if(empty($password2)){
        $password2_error = 'Please re-enter password';
    }

    else if(!empty($password1) && !empty($password2)){
        if($password1 != $password2){
            $password2_error = 'Password is not the same';        
        }
        else if(strlen($password1)<5 && strlen($password2)<5){
            $password2_error = 'Minimum of 5 characters required';
        }
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

    
    if(empty($username_error) && empty($password1_error) && empty($password2_error) && empty($firstName_error) && empty($lastName_error) && empty($address_error) && empty($contact_error)){
        
        insertdb($username, $password1, $firstName, $lastName, $gender, $address, $contact);
    }
    else{
        include('signup.php');
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


function accessdb($username, $password){

    $db = mysqli_connect('localhost', 'root', '', 'boardinghouse_system');

if(!$db){
    echo "Error db connection";
}

else{

    $query = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);

    if(mysqli_num_rows($result)>0){
    $query2 = "SELECT * FROM occupants WHERE `user_id` = '{$row['id']}'";
    $result2 = mysqli_query($db, $query2);

        if(mysqli_num_rows($result) > 0 && mysqli_num_rows($result2) > 0){
        if($row['user_type'] == "user"){
            $_SESSION['user_id'] = $row['id'];
            header('location: my_account/index.php');
            exit();
        }
        }
        else if($row['user_type'] == "admin"){
            header('location: dashboard/index.php');
            exit();
        }
        else{
            $password_error = 'Incorrect username or password.';
            include('login.php');
        }
    }
    else{
        $password_error = 'Incorrect username or password.';
        include('login.php');
    }
mysqli_close($db);
}

}

function insertdb($username, $password, $firstName, $lastName, $gender, $address, $contact){
    $db = mysqli_connect('localhost', 'root', '', 'boardinghouse_system');

    if(!$db){
        echo "Error db connection";
    }
    
    else{

        $query = "INSERT INTO users (username, user_type, password) 
            VALUES('$username', 'user', '$password')";
        mysqli_query($db, $query);

        $last_id = mysqli_insert_id($db);

        $phone = preg_replace('/[^0-9]/', '', $contact);
    
        $query = "INSERT INTO reservations (firstname, lastname, gender, `address`, contact, `user_id`) 
            VALUES('$firstName', '$lastName', '$gender', '$address', '$phone', '$last_id')";
        mysqli_query($db, $query);
        mysqli_close($db);
    
        $_SESSION['user_id'] = $last_id;

        header('location: signup-confirmation.php');	
        exit();
    }
    
}

?>