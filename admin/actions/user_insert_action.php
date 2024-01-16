<?php
session_start();
include '../../includes/db.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    try {
        $userName = mysqli_real_escape_string($conn,$_POST["userName"]);
        $userEmail = mysqli_real_escape_string($conn,$_POST["userEmail"]);
        $encodedPassword = base64_encode($_POST["userPassword"]);
        $userStatus = $_POST["userStatus"];
        $user_b_name = mysqli_real_escape_string($conn,$_POST["userBusinessName"]);
        $user_address = mysqli_real_escape_string($conn,$_POST["userAddress"]);
        $user_state = mysqli_real_escape_string($conn,$_POST["userState"]);
        $user_postcode = mysqli_real_escape_string($conn,$_POST["userPostcode"]);
        $user_phone = mysqli_real_escape_string($conn,$_POST["userPhone"]);

        $sql = "INSERT INTO users (user_name, user_email, user_password, user_status,user_b_name,user_address,user_state,user_postcode,user_phone) 
                VALUES ('$userName', '$userEmail', '$encodedPassword', '$userStatus', '$user_b_name', '$user_address', '$user_state', '$user_postcode', '$user_phone')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['toastr_message'] = [
                'type' => 'success', // or 'error', 'warning', 'info'
                'message' => 'User added successfully'
            ];
                    header("Location: ../users.php");
                    exit();
        } else {
            $_SESSION['toastr_message'] = [
                'type' => 'error', // or 'error', 'warning', 'info'
                'message' => 'Something went wrong, please try again'
            ];
            header("Location: ../usernew.php");
            exit();
        }
    } catch (Exception $e) {
        $_SESSION['toastr_message'] = [
            'type' => 'error', // or 'error', 'warning', 'info'
            'message' => 'Try with unique username and email'
        ];
        header("Location: ../profile.php");
        exit();
    }
}
?>
