<?php
    include('db.php');

    function redirect($url) {
        header("Location: $url");
        exit();
    }

    // Add your functions here
?>
