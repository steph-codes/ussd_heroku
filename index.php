<?php
    //Read all variables vai POST from AT gateway
    $session = $_POST['sessionId'];
    $servicecode = $_POST['servicecode'];
    $phoneNumber = $_POST['phonenumber'];
    $text = $_POST['text'];

    if($text == ''){
        // first request because it is empty. \n means break to next line
        $response = 'CON what would you want to check \n';
        $response .= '1. My account No \n';
        $response .= '2. My Phone number';
    }else if($text == '1'){
        //business logic for the first level response
        $response = 'CON Choosen account information you want to view \n';
        $response .= '1. Account Number \n';
        $response .= '2. Account Balance';
    }else if ($text =='2'){
        //logic for first response
        //this is a terminal request. Note how we start with END
        $response = 'END your Phone number is '.$phoneNumber;
    }else if($text == "1*1"){
        //this is a second level response API checks database, api request , telecom and returns account number
        $accountNumber = "ACC1001";

        //This is a terminal request. Note how we start with END
        $response = "END your account Number is ".$accountNumber;
    }else if ($text = "1*2"){
        //This is a second level resp where user selected 1 in the first instance
        $balance = "N 10,000";
        
        //This is aterminal request. Note how we start with END
        $response = "END your balance is ". $balance;
    }
    //declare type of data, we are dsiplaying plain text/plain not json
    //echo the response to the API. the response depends on the statement fulfilled in each instance
    //the response echoed depends on the if statement that justify the user response
    header('Content-type; text/plain');
    echo $response;
?>

