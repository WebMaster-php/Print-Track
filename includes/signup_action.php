<?php
include '../includes/db.php';
require_once '../vendor/autoload.php';
require_once 'functions.php';
\Stripe\Stripe::setApiKey(STRIPE_TEST_SECRET_KEY);
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];
    $encodedPassword = base64_encode($userPassword);
    $token = $_POST['stripeToken'];
    $amount = 4900; // Amount in cents
    try {
        $charge = \Stripe\Charge::create([
            'amount' => $amount,
            'currency' => 'usd',
            'description' => 'Signup charge',
            'source' => $token,
        ]);
        if($charge){
            try {
                $sql = "INSERT INTO users (user_name, user_email, user_password) 
                    VALUES ('$userName', '$userEmail', '$encodedPassword')";
                $result = $conn->query($sql);
                $templatePath = 'email_template.html';
                $date = date('d-m-Y');
                $data = array(
                    'client_name' => $userName,
                    'client_email' => $userEmail,
                    'date' => $date
                );
                $htmlBody = loadTemplate($templatePath, $data);

                // Send the email
                sendEmail($userEmail, $userName, $htmlBody);
                if ($result === TRUE) {
                    $user_id = $conn->insert_id;
                    $_SESSION['toastr_message'] = [
                        'type' => 'success', // or 'error', 'warning', 'info'
                        'message' => 'Your are sign up successfully pleass login'
                    ];
                    $sql1 = "INSERT INTO revenue (user_id, payment) VALUES ('$user_id', 49.0)";
                    $conn->query($sql1);

                    header("Location: ../login.php");
                    
                } else {
                    $_SESSION['toastr_message'] = [
                        'type' => 'error', // or 'error', 'warning', 'info'
                        'message' => 'Something went wrong, please try again'
                    ];
                    header("Location: ../signup.php");
                    
                }
            }catch (Exception $e) {
                 $_SESSION['toastr_message'] = [
                        'type' => 'error', // or 'error', 'warning', 'info'
                        'message' => 'Something went wrong, please try again'. $e
                    ];
                    header("Location: ../signup.php");
            }
        }else{
           $_SESSION['toastr_message'] = [
                    'type' => 'error', // or 'error', 'warning', 'info'
                    'message' => 'Something went wrong, please try again'
                ];
                header("Location: ../signup.php"); 
        }
    } catch (\Stripe\Exception\CardException $e) {
        // Card was declined
         $_SESSION['toastr_message'] = [
                'type' => 'error', // or 'error', 'warning', 'info'
                'message' => "Payment failed: " . $e->getError()->message
            ];
            header("Location: ../signup.php");
    } catch (\Stripe\Exception\RateLimitException $e) {
         $_SESSION['toastr_message'] = [
                'type' => 'error', // or 'error', 'warning', 'info'
                'message' => 'Payment failed: Rate Limit Exceeded'
            ];
            header("Location: ../signup.php");
    } catch (\Stripe\Exception\InvalidRequestException $e) {
         $_SESSION['toastr_message'] = [
                'type' => 'error', // or 'error', 'warning', 'info'
                'message' => 'Payment failed: Invalid parameters'
            ];
            header("Location: ../signup.php");
    } catch (\Stripe\Exception\AuthenticationException $e) {
         $_SESSION['toastr_message'] = [
                'type' => 'error', // or 'error', 'warning', 'info'
                'message' => 'Payment failed: Authentication error'
            ];
            header("Location: ../signup.php");
    } catch (\Stripe\Exception\ApiConnectionException $e) {
         $_SESSION['toastr_message'] = [
                'type' => 'error', // or 'error', 'warning', 'info'
                'message' => 'Payment failed: Network communication error'
            ];
            header("Location: ../signup.php");
    } catch (\Stripe\Exception\ApiErrorException $e) {
         $_SESSION['toastr_message'] = [
                'type' => 'error', // or 'error', 'warning', 'info'
                'message' => 'Payment failed: API error'
            ];
            header("Location: ../signup.php");
    } catch (Exception $e) {
         $_SESSION['toastr_message'] = [
                'type' => 'error', // or 'error', 'warning', 'info'
                'message' => 'Payment failed: An error occurred'
            ];
            header("Location: ../signup.php");
    }
}else{
     $_SESSION['toastr_message'] = [
                'type' => 'error', // or 'error', 'warning', 'info'
                'message' => 'Something went wrong, please try again'
            ];
            header("Location: ../signup.php");
}
?>
