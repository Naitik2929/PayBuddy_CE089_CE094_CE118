<?php
$conn = new mysqli('localhost', 'root', '', 'paybuddy');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST["email"]) and !empty($_POST["pwd"]) and isset($_POST["email"]) and isset($_POST["pwd"])) {

        $email = $_POST["email"];
        $password = $_POST["pwd"];
        session_start();
        $_SESSION['email'] = $email;
        $sql = "Select * from registration where email='$email' AND password='$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            header("location: /paybook/paybook.html");
            exit();
        } else {
            echo " You Have Entered Incorrect Password";
            exit();
        }
    }
}