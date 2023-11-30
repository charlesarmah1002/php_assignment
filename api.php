<?php

session_start();



// variable declarations


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $endpoint = rtrim($_SERVER['REQUEST_URI'], '/');

    $endpoints = [
        '/api.php/register' => 'handleRegistration',
        '/api.php/login' => 'handleLogin',
        '/api.php/status' => 'userStatus',
    ];

    if (isset($endpoints[$endpoint])) {
        $handler = $endpoints[$endpoint];
        $handler();
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Endpoint not found']);
    }
} else {
    http_response_code(405);
    echo 'Method Not Allowed';
}

function handleRegistration()
{
    $hostname = "localhost:3306";
    $username = "root";
    $password = "development";
    $dbname = "php_assignment";
    
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    if (!$conn) {
        echo "Database connection error" . mysqli_connect_error();
    }
    
    $username = mysqli_escape_string($conn, $_POST['username']);
    $password = mysqli_escape_string($conn, $_POST['password']);

    if(!empty($username) && !empty($password)) {
        $query1 = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$username}'");
        if(mysqli_num_rows($query1) > 0){
            echo "User Already Exists";
        }else {
            $unique_id = rand(100000, 999999);

            $enc_pass = password_hash($password, PASSWORD_DEFAULT);

            $query2 = mysqli_query($conn, "INSERT INTO users(unique_id, username, password) VALUES({$unique_id}, '{$username}', '{$enc_pass}')");

            if($query2){
                $_SESSION['unique_id'] = $unique_id;
                echo "success";
            }
        }
    }else {
        echo "Invalid or empty string";
    }
}

function handleLogin()
{
    // Implement logic for user login
    // ...

    // Respond with JSON data
    // echo json_encode(['message' => 'Login successful']);
}

// Add more functions for other API endpoints as needed
