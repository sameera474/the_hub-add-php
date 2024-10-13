<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
require_once './conn_connection.php';

$error_message = ""; // Initialize an error message variable

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate input data
    if (empty($email) || empty($password)) {
        $error_message = "Both email and password are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } else {
        // Check if the email exists
        $checkQuery = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($checkQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $error_message = "No account found with this email.";
        } else {
            // Fetch user details
            $user = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Start a session and store user data
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];

                // Redirect to a dashboard or home page
                header("Location: http://localhost/The_Hub/customer/index.php");
                exit;
            } else {
                $error_message = "Incorrect password. Please try again.";
            }
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    /* Variables for colors */
    :root {
      --primary: #006fbe; /* New color */
      --light: #F1F8FF; /* Light background */
      --dark: #0F172B; /* Dark text */
      --button-bg: #006fbe; /* Button color */
      --input-border: #ced4da; /* Border for inputs */
      --input-focus: #006fbe; /* Input border focus color */
      --button-hover: #0087e7; /* Button hover color */
    }

    /* Global styles */
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

    .error-message {
      color: red;
      font-size: 14px;
      text-align: center;
      margin-bottom: 10px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      border: 1px solid var(--input-border);
      border-radius: 5px;
      font-size: 14px;
      transition: border 0.3s ease;
    }

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

    .signup-link {
      text-align: center;
      margin-top: 20px;
    }

    .signup-link a {
      color: var(--primary);
      text-decoration: none;
      font-size: 16px;
    }

    .signup-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    
    <?php if (!empty($error_message)) : ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <form action="" method="post">
      <input type="email" name="email" placeholder="Your Email" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Login</button>
    </form>
    <div class="signup-link">
      <p>Don't have an account? <a href="../customer/signup.php">Sign Up</a></p>
    </div>
  </div>
</body>
</html>
