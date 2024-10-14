<?php
//Error Reporting: It enables all error reporting to ensure you can catch any issues during development.
error_reporting(E_ALL);
ini_set('display_errors', 1);
//Database Connection: The script requires a separate file conn_connection.php which presumably contains the database connection. 
//If this file is missing or has an issue, the script will fail.
 //Ensure this file establishes the $conn variable for the connection.
require_once './conn_connection.php';

$error_message = ''; // Initialize an error message variable
//Form Handling (POST method): The script listens for a form submission via the POST method. 
//Once the form is submitted, it gathers the form data (name, email, password) and performs the following checks:

//If any of the fields are empty, it returns an error.
//If the email format is invalid, it returns an error.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($name) || empty($email) || empty($password)) {
        $error_message = "All fields are required.";
        //Email Validation: It validates whether the email is in the correct format using PHP's filter_var() function with the FILTER_VALIDATE_EMAIL filter.
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } else {
        $checkQuery = "SELECT * FROM users WHERE email = ?";//Check Existing Email: It checks whether the email is already registered in the database using a SELECT query. 
        //If the email exists, an error message is shown.
        $stmt = $conn->prepare($checkQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error_message = "Email is already registered. Please use a different email.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);//Password Hashing: If the email is not registered, the password is hashed using password_hash(), 
            //which uses a safe encryption method for storing passwords.

            $insertQuery = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";//Inserting New User: The user's details (name, email, hashed password) are inserted into the database. If the insertion is successful, 
            //the user is informed and can proceed to the login page.
            $stmt = $conn->prepare($insertQuery);
            $stmt->bind_param("sss", $name, $email, $hashedPassword);
//Error Display: If any error occurs, the message is displayed above the form inside a div with the class error, styled in red.
            if ($stmt->execute()) {
                echo "Registration successful! You can now <a href='../customer/login.php'>log in</a>.";
                exit;
            } else {
                $error_message = "Error: " . $stmt->error;
            }
        }

        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        /* Your existing CSS */
        :root {
            --primary: #006fbe;
            --light: #F1F8FF;
            --dark: #0F172B;
            --button-bg: #006fbe;
            --input-border: #ced4da;
            --input-focus: #006fbe;
            --button-hover: #0087e7;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--light);
            color: var(--dark);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 400px;
            width: 100%;
        }

        h2 {
            color: black;
            text-align: center;
            font-size: 36px;
            margin-bottom: 20px;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--input-border);
            border-radius: 5px;
            font-size: 14px;
            transition: border 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: var(--input-focus);
            outline: none;
            box-shadow: 0 0 8px rgba(0, 141, 241, 0.2);
        }

        button {
            background-color: var(--button-bg);
            color: white;
            padding: 12px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s;
        }

        button:hover {
            background-color: var(--button-hover);
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(0);
        }

        .login-link {
            text-align: center;
            margin-top: 10px;
        }

        .login-link a {
            color: var(--primary);
            text-decoration: none;
            font-size: 16px;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>

        <!-- Display error message above the name field -->
        <?php if (!empty($error_message)) : ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form action="" method="post">
            <input type="text" name="name" placeholder="Your Name" required />
            <input type="email" name="email" placeholder="Your Email" required />
            <input type="password" name="password" placeholder="Password" required />
        
            <button type="submit">Sign Up</button>
        </form>
        <div class="login-link">
            <p>Already have an account? <a href="../customer/login.php">Log In</a></p>
        </div>
    </div>
</body>
</html>
