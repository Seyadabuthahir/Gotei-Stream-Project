<?php
session_start();

if(isset($_POST['signin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = mysqli_connect("localhost", "root", "", "flixbase");

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

    // DEBUG - remove after fixing
    echo "Email: " . $email . "<br>";
    echo "MD5 Password: " . $password . "<br>";

    $sql = "SELECT * FROM users WHERE useremail='" . $email . "' AND userpass='" . $password . "'";
    
    // DEBUG - see exact query
    echo "Query: " . $sql . "<br>";

    $res = mysqli_query($conn, $sql);

    if($res && $res->num_rows > 0){
        $row = $res->fetch_assoc();
        $_SESSION['email'] = $row['useremail'];
        header("Location: preferencepage.html");
        exit();
    } else {
        echo "Not found";
        // DEBUG - show mysql error
        echo "<br>MySQL Error: " . mysqli_error($conn);
    }
}
?>