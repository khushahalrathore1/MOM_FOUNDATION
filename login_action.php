<?php
session_start();
include('config.php'); // assumes $mysqli connection

// Sanitize input
$child_unique_id = isset($_POST['child_unique_id']) ? trim($_POST['child_unique_id']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';
$role = isset($_POST['role']) ? trim($_POST['role']) : '';

// Basic validation
if ($child_unique_id == '' || $password == '' || $role == '') {
    echo "<script>alert('All fields are mandatory.'); window.history.back();</script>";
    exit();
}

// Map role to table
$table_map = array(
    'Super_Admin' => 'super_admins',
    'Admin'       => 'admin_table',
    'Childern'    => 'childern_forms',
    'Donor'       => 'donor_managment',
    'Volunteer'   => 'volunteer_managment',
    'Forgineer'   => 'foreigner_managment'
);

if (!isset($table_map[$role])) {
    echo "<script>alert('Invalid role selected.'); window.history.back();</script>";
    exit();
}

$table = $table_map[$role];

// Build and run query
$query = "SELECT * FROM `$table` WHERE child_unique_id = '".mysqli_real_escape_string($mysqli, $email)."' AND password = '".mysqli_real_escape_string($mysqli, $password)."' LIMIT 1";
$result = mysqli_query($mysqli, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    // Set session data
    $_SESSION['login'] = true;
    $_SESSION['role'] = $role;
    $_SESSION['email'] = $email;
    $_SESSION['user_id'] = $user['id']; // change 'id' if your PK is named differently

    // Redirect (change target page as needed)
    header('Location: dashboard.php');
    exit();
} else {
    echo "<script>alert('Invalid email or password.'); window.history.back();</script>";
    exit();
}
?>
