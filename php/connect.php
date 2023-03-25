<?php
    $name = $_POST['name'];
    $email = $_POST['email'];

    //Connecting to the contacts Database
    $conn = new mysqli('localhost','root','','contacts');
    if($conn->connect_error){
        die('onnection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into gganbu(name, email) values(?, ?)");

        $stmt->bind_param("ss",$name,$email);
        $stmt->execute();
        echo "Registration successfull";
        $stmt->close();
        $conn->close();

    }


?>