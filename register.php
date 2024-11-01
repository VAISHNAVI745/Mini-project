<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            color: #080808;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
            color: #110f0f;
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
            color: #0c0a0a;
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
            background-color: #2b80ff;
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
    </style>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "RootD@0912";
    $dbname = "student_connect"; // Replace with your database name

    // Create a new database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data and hash password
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insert user data into the database
    $sql = "INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $fullname, $email, $hashed_password);

    if ($stmt->execute()) {
        // Redirect to createprofile.php
        header("Location: createprofile.php");
        exit;
    } else {
        echo "<script>alert('Registration failed');</script>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

<div class="form-container">
    <h2>Register</h2>
    <form id="register-form" action="register.php" method="post">
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <div class="input-container">
                <input type="text" id="fullname" name="fullname" required placeholder="Enter your full name">
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <div class="input-container">
                <input type="email" id="email" name="email" required placeholder="Enter your email">
            </div>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <div class="input-container">
                <input type="password" id="password" name="password" required placeholder="Enter a password">
                <i class="eye-icon fas fa-eye" id="toggle-password"></i>
            </div>
        </div>
        <div class="form-group">
            <button type="submit">Register</button>
        </div>
        <div class="form-group">
            <p>Already have an account? <a href="loginS.html">Login</a></p>
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