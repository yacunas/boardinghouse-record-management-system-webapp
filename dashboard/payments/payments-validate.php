<?php
$db = mysqli_connect('localhost', 'root', '', 'boardinghouse_system');
  
if(!$db){
    echo "Error db connection";
}

if(!isset($_SESSION)) { 
    session_start(); 
}

if(isset($_POST['payment'])){

    $id = $_SESSION['id'];

    $amount = $_POST['amount'];
    $amountdue = $_POST['amountdue'];
    
    $amountchange = $amount - $amountdue;


    if(empty($amount)){
        $amount_error = 'Please enter an amount';
    }
    else if($amountchange<0){
        $amount_error = 'Insufficient amount';
    }

    if(empty($amount_error)){
    
        $query = "SELECT * FROM occupants WHERE id=$id";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);
        $duedate = $row['duedate'];
    
        date_default_timezone_set('Asia/Manila');
        $paymentdate = date('Y-m-d H:i:s');
        $newduedate = date('Y-m-d H:i:s', strtotime("+1 month",strtotime( $duedate )));
    
        $query = "INSERT INTO payments (occupant_id, payment_date, duedate, amount_due, amount, amount_change) 
        VALUES('$id', '$paymentdate', '$duedate', '$amountdue','$amount', '$amountchange')";
        mysqli_query($db, $query);
    
        $query = "UPDATE occupants SET duedate = '$newduedate' WHERE id = $id";
        mysqli_query($db, $query);

        // $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
    
        mysqli_close($db);
        header('location: payments.php');	
        exit();
    }
    else{
        include('payments-pay.php');
    }
}


?>