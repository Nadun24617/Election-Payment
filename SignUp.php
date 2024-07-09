<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "election_payment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// signin php//


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if username and password match
    $sql = "SELECT * FROM user_details WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user_data = $result->fetch_assoc();
        if (password_verify($password, $user_data['password'])) {
            // Password correct, start session and redirect
            $_SESSION['user_id'] = $user_data['user_id'];
            
            exit;
        } else {
            // Password incorrect
            $_SESSION['message'] = "Invalid username or password. Please try again.";
    
            exit;
        }
    } else {
        // Username not found
        $_SESSION['message'] = "Invalid username or password. Please try again.";
        
        exit;
    }
}
// sign up php//

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate password (example validation)
    if (strlen($password) !== 8) {
        $_SESSION['message'] = "Password should be exactly 8 characters long.";
        header("Location: signup.php");
        exit;
    }
    

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into database
    $sql = "INSERT INTO user_details (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Registration successful! Please log in.";
        
        exit;
    } else {
        $_SESSION['message'] = "Error: " . $stmt->error;
       
        exit;
    }
}


?>









<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dual Login / Signup Form</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css'>
    <link rel="stylesheet" href="styles.css" />
    <style>
        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #ffffff; /* Set background color to white */
        }

        /* Login Section Style */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: -20px 0 50px;
            margin-top: 20px;
        }

        h1 {
            font-weight: bold;
            margin: 0;
        }

        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: .5px;
            margin: 20px 0 30px;
        }

        span {
            font-size: 12px;
        }

        a {
            color: #0e263d;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        }

        .container {
            background: #fff;
            border-radius: 90px;
            box-shadow: 30px 14px 28px rgba(0, 0, 5, .2), 0 10px 10px rgba(0, 0, 0, .2);
            position: relative;
            overflow: hidden;
            opacity: 85%;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
            transition: 333ms;
        }

        .form-container form {
            background: #fff;
            display: flex;
            flex-direction: column;
            padding:  0 50px;
            height: 100%;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .social-container {
            margin: 20px 0;
            display: block;
        }

        .social-container a {
            border: 1px solid #008ecf;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            height: 40px;
            width: 40px;
            transition: 333ms;
        }

        .social-container a:hover {
            transform: rotateZ(13deg);
            border: 1px solid #0e263d;
        }

        .form-container input {
            background: #eee;
            border: none;
            border-radius: 50px;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
        }

        .form-container input:hover {
            transform: scale(101%);
        }

        button {
            border-radius: 50px;
            box-shadow: 0 1px 1px ;
            border: 1px solid #731A07; /* Changed to #731A07 */
            background: #731A07; /* Changed to #731A07 */
            color: #fff;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        button:active {
            transform: scale(.95);
        }

        button:focus {
            outline: none;
        }

        button.ghost {
            background: transparent;
            border-color: #fff;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all .6s ease-in-out;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .sign-up-container {
            left: 0;
            width: 50%;
            z-index: 1;
            opacity: 0;
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform .6s ease-in-out;
            z-index: 100;
        }

        .overlay {
            background: #ff416c;
            background: linear-gradient(to right, #731A07, #731A07) no-repeat 0 0 / cover; /* Changed to #731A07 */
            color: #fff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateY(0);
            transition: transform .6s ease-in-out;
        }

        .overlay-panel {
            position: absolute;
            top: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 40px;
            height: 100%;
            width: 50%;
            text-align: center;
            transform: translateY(0);
            transition: transform .6s ease-in-out;
        }

        .overlay-right {
            right: 0;
            transform: translateY(0);
        }

        .overlay-left {
            transform: translateY(-20%);
        }

        /* Move signin to right */
        .container.right-panel-active .sign-in-container {
            transform: translateY(100%);
        }

        /* Move overlay to left */
        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        /* Bring signup over signin */
        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
        }

        /* Move overlay back to right */
        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        /* Bring back the text to center */
        .container.right-panel-active .overlay-left {
            transform: translateY(0);
        }

        /* Same effect for right */
        .container.right-panel-active .overlay-right {
            transform: translateY(20%);
        }
    </style>
</head>
<body>
<!-- Log In Form Section -->
<section>
<form action="" method="post">

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#">
                <h1>Sign Up</h1>
                <div class="social-container">
                    <a href="https://Github.com/farazc60" target="_blank" class="social"><i class="fab fa-github"></i></a>
                    <a href="https://Codepen.io/codewithfaraz" target="_blank" class="social"><i class="fab fa-codepen"></i></a>
                    <a href="mailto:farazc60@gmail.com" target="_blank" class="social"><i class="fab fa-google"></i></a>
                </div>
                <span>Or use your Email for registration</span>
                <label>
                    <input type="text" name="username" id ="username" placeholder="Username"/>
                </label>
                <label>
                    <input type="email"name="email" id ="email" placeholder="Email"/>
                </label>
                <label>
                    <input type="password" name="password" id ="password" placeholder="Password"/>
                </label>
                <button style="margin-top: 9px">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
        <form action="" method="post">
        
    
                <h1>SignIn</h1>
                <div class="social-container">
                    <a href="https://Github.com/farazc60" target="_blank" class="social"><i class="fab fa-github"></i></a>
                    <a href="https://Codepen.io/codewithfaraz" target="_blank" class="social"><i class="fab fa-codepen"></i></a>
                    <a href="mailto:farazc60@gmail.com" target="_blank" class="social"><i class="fab fa-google"></i></a>
                </div>
                <span> Or sign in using E-Mail Address</span>
                <label>
                    <input type="text" name="username" id ="username" placeholder="Username"/>
                </label>
                
                <label>
                    <input type="password" name="password" id ="password" placeholder="Password"/>
                </label>
                <a href="#">Forgot your password?</a>
                <button>Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Log in</h1>
                    <p>Sign in here if you already have an account </p>
                    <button class="ghost mt-5" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Create an Account!</h1>
                    <p>Sign up if you still don't have an account ... </p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</section>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js'></script>
<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () =>
        container.classList.add('right-panel-active'));

    signInButton.addEventListener('click', () =>
        container.classList.remove('right-panel-active'));
</script>
</body>
</html>
