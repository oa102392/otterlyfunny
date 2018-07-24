<?php

session_start();
// require a database connection
if (isset($_POST['Username'])){
require 'db_connection.php';
// select fields from the database 
$sql = "SELECT *
FROM Users
WHERE Username = :Username
AND Password = :Password";

$stmt = $dbConn -> prepare($sql);
$stmt -> execute(array(":Username" => $_POST['Username'], ":Password" =>$_POST['Password']));

$record = $stmt -> fetch();
$user = $_Users['user'];
$userName = $user['name'];
$userPassword = $user['password'];
$userError = $user['error'];
$Size = $user['size'];
// made sure the 
function validateInput($user, $size){
if ($username < 3){
    echo "Your username is too short, check again";
    return $username; 
}
if ($password < 3){
    echo "Your password is too short, check again";
    return $password; 
}
if (empty($record)){
    echo "Wrong username/password!";
    return $userError;       
}else{
    $sql = "INSERT INTO User_Logins
    (Username, Password, Successful)
    VALUES
    (:Username, :Password, :Successful)";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute ( array (":Username" => $_POST['Username'] , ":Password" => hash("sha1", $_POST['Password']) ,  ":Successful" => 1));
    
$_SESSION['Username'] = $record['Username'];
header("Location: index.php");
}
}

?>
