<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>
        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
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
            border: 1px solid #731A07;
            background: #731A07;
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
            background: linear-gradient(to right, #731A07, #731A07) no-repeat 0 0 / cover;
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
<header>
    <?php include('components/navbar.php'); ?>
</header>

<!-- Log In Form Section -->
<section>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h1>Sign Up</h1>
                <span>Use your Email for registration</span>
                <label>
                    <input type="text" name="name" placeholder="Name" required/>
                </label>
                <label>
                    <input type="email" name="email" placeholder="Email" required/>
                </label>
                <label>
                    <input type="password" name="password" placeholder="Password" required/>
                </label>
                <button type="submit" name="signup">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h1>Sign in</h1>
    
                <span>Sign in using E-Mail Address</span>
                <label>
                    <input type="email" name="email" placeholder="Email" required/>
                </label>
                <label>
                    <input type="password" name="password" placeholder="Password" required/>
                </label>
                <a href="#">Forgot your password?</a>
                <button type="submit" name="login">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Log in</h1>
                    <p>Sign in here if you already have an account</p>
                    <button class="ghost mt-5" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Create Account</h1>
                    <p>Sign up if you still don't have an account</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'components/footer.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () =>
        container.classList.add('right-panel-active'));

    signInButton.addEventListener('click', () =>
        container.classList.remove('right-panel-active'));
</script>

<?php
// PHP code to handle form submissions and database connection
$servername = "localhost"; // Change as per your MySQL server configuration
$username = "root"; // MySQL username
$password = ""; // MySQL password
$dbname = "election_payment"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Signup Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Signup successful");</script>';
        // Redirect or perform other actions after successful signup
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Login Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo '<script>alert("Login successful");</script>';
            // Redirect or perform other actions after successful login
        } else {
            echo '<script>alert("Incorrect password");</script>';
        }
    } else {
        echo '<script>alert("User not found");</script>';
    }
}

// Close MySQL connection
$conn->close();
?>
</body>
</html>
