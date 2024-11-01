<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "RootD@0912";
$dbname = "student_connect";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user profile ID from the URL parameter
$profile_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch user profile and related information from the database
$sql = "SELECT up.*, 
               GROUP_CONCAT(DISTINCT s.skill_name SEPARATOR ', ') AS skills, 
               GROUP_CONCAT(DISTINCT i.internship_name SEPARATOR ', ') AS internships, 
               GROUP_CONCAT(DISTINCT c.course_name SEPARATOR ', ') AS courses
        FROM user_profiles up
        LEFT JOIN skills s ON up.profile_id = s.profile_id
        LEFT JOIN internships i ON up.profile_id = i.profile_id
        LEFT JOIN courses c ON up.profile_id = c.profile_id
        WHERE up.profile_id = ?
        GROUP BY up.profile_id";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $profile_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("User not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile of <?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #7bc1ed, #bbd1f8);
            color: #fff;
            margin: 0;
            padding: 20px;
        }

        .profile-container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .profile-picture {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            border: 4px solid white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .profile-name {
            font-size: 24px;
            margin: 10px 0;
        }

        .profile-email {
            font-size: 16px;
            margin: 5px 0;
        }

        .btn-container {
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #0c45f1;
            color: white;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #2b80ff;
        }

        fieldset {
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            padding: 10px;
            text-align: left;
        }

        select, input, textarea {
            width: 100%;
            margin: 5px 0;
            padding: 8px;
            border-radius: 5px;
            border: none;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <img class="profile-picture" src="<?php echo htmlspecialchars($user['profile_pic']); ?>" alt="Profile Picture">
        <h2 class="profile-name"><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></h2>
        <p class="profile-email"><?php echo htmlspecialchars($user['email']); ?></p>
        
        <div class="btn-container">
            <button class="btn" onclick="window.location.href='home.php'">Back to Homepage</button>
        </div>

        <fieldset>
            <legend>Personal Information</legend>
            <select name="user_type" required>
                <option value="">Select...</option>
                <option value="Active Student" <?php echo $user['user_type'] === 'Active Student' ? 'selected' : ''; ?>>Active Student</option>
                <option value="Alumni" <?php echo $user['user_type'] === 'Alumni' ? 'selected' : ''; ?>>Alumni</option>
            </select>

            <label for="first-name">First Name:</label>
            <input type="text" id="first-name" name="first-name" value="<?php echo htmlspecialchars($user['first_name']); ?>" required />

            <label for="last-name">Last Name:</label>
            <input type="text" id="last-name" name="last-name" value="<?php echo htmlspecialchars($user['last_name']); ?>" required />

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly />

            <textarea name="bio" placeholder="Write a brief bio..."><?php echo htmlspecialchars($user['bio'] ?? ''); ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Academic Details</legend>
            <label for="graduation-college">Graduation College:</label>
            <input type="text" id="graduation-college" name="graduation_college" value="<?php echo htmlspecialchars($user['graduation_college']); ?>" />

            <label for="graduation-course">Graduation Course:</label>
            <input type="text" id="graduation-course" name="graduation_course" value="<?php echo htmlspecialchars($user['graduation_course']); ?>" />

            <label for="graduation-year">Graduation Year:</label>
            <input type="text" id="graduation-year" name="graduation_year" value="<?php echo htmlspecialchars($user['graduation_year']); ?>" />

            <label for="post-graduation-college">Post-Graduation College:</label>
            <input type="text" id="post-graduation-college" name="post_graduation_college" value="<?php echo htmlspecialchars($user['post_graduation_college']); ?>" />

            <label for="post-graduation-course">Post-Graduation Course:</label>
            <input type="text" id="post-graduation-course" name="post_graduation_course" value="<?php echo htmlspecialchars($user['post_graduation_course']); ?>" />

            <label for="phd-college">PhD College:</label>
            <input type="text" id="phd-college" name="phd_college" value="<?php echo htmlspecialchars($user['phd_college']); ?>" />

            <label for="phd-course">PhD Course:</label>
            <input type="text" id="phd-course" name="phd_course" value="<?php echo htmlspecialchars($user['phd_course']); ?>" />
        </fieldset>

        <section class="skills-section">
            <h3>Skills</h3>
            <p><?php echo htmlspecialchars($user['skills'] ?: 'No skills added.'); ?></p>
        </section>

        <section class="internships-section">
            <h3>Internships</h3>
            <p><?php echo htmlspecialchars($user['internships'] ?: 'No internships added.'); ?></p>
        </section>

        <section class="courses-section">
            <h3>Courses</h3>
            <p><?php echo htmlspecialchars($user['courses'] ?: 'No courses added.'); ?></p>
        </section>
    </div>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>