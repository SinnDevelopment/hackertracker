<?php
include('config.php');
session_start();
ini_set('display_errors', 1);
$error=''; // Variable To Store Error Message
if (isset($_GET['logout']))
{
	$_SESSION['loggedin'] = false;
	header("location: index.php");
}
if (isset($_GET['username'])) 
{
    if (empty($_GET['username']) || empty($_GET['password'])) 
    {
        $error = "Username or Password is invalid";
    }
    else
    {
        // Define $username and $password
        $username=$_GET['username'];
        $password=$_GET['password'];
        // Establishing Connection with Server by passing server_name, user_id and password as a parameter
        $db = new mysqli($dbHost,$dbUser,$dbPass, $dbName);
        if ($db->connect_error)
        {
		echo "FAIL";
            die("Connection failed: " . $db->connect_error);
        }
        // To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $password = hash("sha512", stripslashes($password));
        
        
        // SQL query to fetch information of registerd users and finds user ma
        $stmt = $db->prepare("SELECT * FROM users WHERE password=? AND name=?;");
	$stmt->bind_param('ss', $username, $password);
	$stmt->execute();
        $result = $stmt->get_result();
	
	echo $stmt->error;
	echo $db->error;
        if ($result != false) 
        {
	
            $_SESSION['loggedin']=true; // Initializing Session
            header("location: review.php"); // Redirecting To Other Page
        }
        else
        {
            $error = "Username or Password is invalid or account is not enabled.";
        }
        $db->close(); // Closing Connection
    }
}

echo $error;
?>
