<?php 
$name = $_POST['name'];
$email = $_POST['email'];

if (!empty($name) || !empty($email)){

    //connection
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "contacts";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    if (mysqli_connect_error()){
        die('connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
    } else{
        $SELECT = "SELECT emial FROM contacts WHERE email = ? Limit 1";
        $INSERT = "INSERT INTO contacts (name, email) VALUES(?, ?,)";

        //prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum==0){
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ss", $name, $email);
            $stmt->execute();
            echo "registered";
        } else{
            echo "already registered";
        }
        $stmt->close();
        $conn->close();
    }

} else{
    echo "All fields are Required";
    die();
} 
?>