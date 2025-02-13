<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database configuration
$servername = "localhost"; // Change if necessary
$username = "root"; // Your database username
$password = "RootD@0912"; // Your database password
$dbname = "student_connect"; // Your database name

// Create connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email']; // Get email from the form
    $password = $_POST['password']; // Get password from the form

    // SQL query to fetch user data
    $sql = "SELECT * FROM users WHERE email = ?"; // Adjust the table name if necessary
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email); // Bind email to the statement
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $row['password'])) { // Ensure 'password' matches your DB structure
            // Start a session and set session variables
            $_SESSION['user_id'] = $row['id']; // Adjust based on your table
            $_SESSION['email'] = $row['email']; // Store user email in session

            // Redirect to home page
            header("Location: home.php"); // Change to your desired page
            exit();
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "Invalid email or password.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #7bc1ed, #bbd1f8);
            color: #fff;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
            color: #060606;
        }
        h2 {
            margin-bottom: 30px;
            font-size: 28px;
            letter-spacing: 1px;
        }
        .form-group {
            margin-bottom: 20px;
            position: relative;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            letter-spacing: 0.5px;
        }
        .input-container {
            position: relative;
            width: 100%;
        }
        .input-container input {
            width: 100%;
            padding: 12px 15px;
            border: none;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #080707;
            font-size: 16px;
            outline: none;
            transition: background-color 0.3s ease;
        }
        .input-container input::placeholder {
            color: #837e7e;
        }
        .input-container input:focus {
            background-color: rgba(255, 255, 255, 0.3);
        }
        .input-container .eye-icon {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #757474;
        }
        .form-group button {
            width: 100%;
            padding: 12px;
            background-color: #0c45f1;
            border: none;
            color: #fff;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .form-group button:hover {
            background-color:  #2b80ff;
            transform: scale(1.05);
        }
        .form-group p {
            margin-top: 20px;
            font-size: 14px;
        }
        .form-group p a {
            color: #0c45f1;
            text-decoration: none;
            font-weight: 500;
        }
        .form-group p a:hover {
            text-decoration: underline;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Login</h2>
    <form id="login-form" action="" method="post">
        <div class="form-group">
            <label for="Email">Email</label>
            <div class="input-container">
                <input type="text" id="Email" name="Email" required placeholder="Enter your Email">
            </div>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <div class="input-container">
                <input type="password" id="password" name="password" required placeholder="Enter your password">
                <i class="eye-icon fas fa-eye" id="toggle-password"></i>
            </div>
        </div>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <div class="form-group">
            <button type="submit">Login</button>
        </div>
        <div class="form-group">
            <p>Don't have an account? <a href="register.php">Register</a></p>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const password = document.getElementById('password');
        const togglePassword = document.getElementById('toggle-password');

        // Toggle password visibility
        togglePassword.addEventListener('click', () => {
            if (password.type === 'password') {
                password.type = 'text';
                togglePassword.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                password.type = 'password';
                togglePassword.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    });
</script>

</body>
</html>