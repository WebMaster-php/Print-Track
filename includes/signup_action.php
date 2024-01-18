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
        if (isUsernameExists($userNameToCheck, $conn)) {
            // Username already exists, handle the exception
            $_SESSION['toastr_message'] = [
                'type' => 'error', // or 'error', 'warning', 'info'
                'message' => 'Username already exists. Please choose a different username.'
            ];
            header("Location: ../signup.php");
            exit();
        }
        if (isEmailExists($emailToCheck, $conn)) {
            // Email already exists, handle the exception
            $_SESSION['toastr_message'] = [
                'type' => 'error', // or 'error', 'warning', 'info'
                'message' => 'Email already exists. Please use a different email address.'
            ];
            header("Location: ../signup.php");
            exit();
        }
        if (isset($_POST['stripeToken'])) {
            // Check for a duplicate submission, just in case:
            if (isset($_COOKIE['token']) && ($_COOKIE['token'] == $token)) {
                $_SESSION['toastr_message'] = [
                    'type' => 'error', // or 'error', 'warning', 'info'
                    'message' => 'You have submitted the form again.'
                ];
                header("Location: ../signup.php");
                exit();
            } else {
                // New submission
                setcookie("token", $token, time() + 1800);
            }
        } else {
           $_SESSION['toastr_message'] = [
                    'type' => 'error', // or 'error', 'warning', 'info'
                    'message' => 'The order cannot be processed. Enable JavaScript and try again.'
                ];
                header("Location: ../signup.php");
                exit();
        }

        // Check if customer with the same email address already exists
        list($email_addresses, $err) = getCustomersByEmailAddress($userEmail);

        if (count($email_addresses) > 0) {
             $_SESSION['toastr_message'] = [
                    'type' => 'error', // or 'error', 'warning', 'info'
                    'message' => 'This email address is associated with an existing subscription. Please use a different email for the signup process.'
                ];
                header("Location: ../signup.php");
                exit();
        }

         // Create the Customer:
         $customer = \Stripe\Customer::create([
                "name" => $userName,
                "email" => $userEmail,
                "source" => $token,
                "description" => "Customer for " . $email
            ]);
          $customer_id = $customer->id;
         // Create the subscription:
            $subscription = \Stripe\Subscription::create([
                "customer" => $customer_id,
                "items" => [
                  [
                    "price" => 'price_1OYwgGBks4bqOlMTr0nTRBmQ',
                  ],
                ]
            ]);
         if (($subscription->status == "active") || ($subscription->status == "trialing")) {
            try {
                $subscription_id = $subscription->id;
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
                    $sql_revenue= "INSERT INTO revenue (user_id, payment) VALUES ('$user_id', 49.0)";
                    $conn->query($sql_revenue);
                    $sql_subscription = "INSERT INTO subscription (user_id, customer_id, subscription_id) VALUES ('$user_id', '$customer_id', '$subscription_id')";
                    $conn->query($sql_subscription);
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
                    'message' => 'You have not been charged because the payment system rejected the transaction.Please try again'
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
                'message' => 'Payment failed: Invalid parameters'. $e
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
            $e_json = $e->getJsonBody();
            $err = $e_json['error'];
         $_SESSION['toastr_message'] = [
                'type' => 'error', // or 'error', 'warning', 'info'
                'message' => 'Payment failed: An error occurred'. $err['message']
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

function getCustomersByEmailAddress($emailAddress) {
    try {
        $response = \Stripe\Customer::all(["limit" => 100, "email" => $_POST["userEmail"]]);
        return array($response->data, null);
    } catch (\Exception $e) {
        return array([], $e);
    }
}
// Assuming you have established a database connection

// Function to check if a username exists
function isUsernameExists($username, $conn) {
    $query = "SELECT * FROM users WHERE user_name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows > 0;
}

// Function to check if an email exists
function isEmailExists($email, $conn) {
    $query = "SELECT * FROM users WHERE user_email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows > 0;
}
?>
