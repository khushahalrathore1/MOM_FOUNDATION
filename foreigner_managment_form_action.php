<?php
require('config.php');

// Unique ID for file names
$unique_id = uniqid();

// Collect form data safely (basic validation - you can add more)
$foreigner_name = mysqli_real_escape_string($mysqli, $_POST['foreigner_name']);
$passport_number = mysqli_real_escape_string($mysqli, $_POST['passport_number']);
$visa_type = mysqli_real_escape_string($mysqli, $_POST['visa_type']);
$duration_of_stay = mysqli_real_escape_string($mysqli, $_POST['duration_of_stay']);
$home_visit_from = date('Y-m-d', strtotime($_POST['home_visit_from']));
$home_visit_till = date('Y-m-d', strtotime($_POST['home_visit_till']));
$foreigner_status = mysqli_real_escape_string($mysqli, $_POST['foreigner_status']);
$foreigner_occupation = isset($_POST['foreigner_occupation']) ? mysqli_real_escape_string($mysqli, $_POST['foreigner_occupation']) : '';
$dob = date('Y-m-d', strtotime($_POST['dob']));
$age = (int)$_POST['age'];
$address = mysqli_real_escape_string($mysqli, $_POST['address']);
$any_donation = mysqli_real_escape_string($mysqli, $_POST['any_donation']);
$donation_reason = mysqli_real_escape_string($mysqli, $_POST['donation_reason']);
$contact_number = mysqli_real_escape_string($mysqli, $_POST['contact_number']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$purpose_of_visit = mysqli_real_escape_string($mysqli, $_POST['purpose_of_visit']);
$marital_status = mysqli_real_escape_string($mysqli, $_POST['marital_status']);
$spouse_name = isset($_POST['spouse_name']) ? mysqli_real_escape_string($mysqli, $_POST['spouse_name']) : '';
$marriage_date = !empty($_POST['marriage_date']) ? date('Y-m-d', strtotime($_POST['marriage_date'])) : NULL;
$spouse_occupation = isset($_POST['spouse_occupation']) ? mysqli_real_escape_string($mysqli, $_POST['spouse_occupation']) : '';
$spouse_living_location = isset($_POST['spouse_living_location']) ? mysqli_real_escape_string($mysqli, $_POST['spouse_living_location']) : '';

// Insert data without photo names first
$insert_sql = "INSERT INTO foreigner_managment 
(foreigner_name, passport_number, visa_type, duration_of_stay, home_visit_from, home_visit_till, 
foreigner_status, foreigner_occupation, dob, age, address, any_donation, donation_reason, contact_number, email, purpose_of_visit, marital_status, spouse_name, marriage_date, spouse_occupation, spouse_living_location)
VALUES (
'$foreigner_name', '$passport_number', '$visa_type', '$duration_of_stay', '$home_visit_from', '$home_visit_till',
'$foreigner_status', '$foreigner_occupation', '$dob', '$age', '$address', '$any_donation', '$donation_reason',
'$contact_number', '$email', '$purpose_of_visit', '$marital_status', '$spouse_name', " . ($marriage_date ? "'$marriage_date'" : "NULL") . ", '$spouse_occupation', '$spouse_living_location'
)";
$result = mysqli_query($mysqli, $insert_sql);

// Get last inserted id
$inserted_id = mysqli_insert_id($mysqli);

// Upload folder
$upload_dir = "photos_foreigner/";

// Handle photo uploads
$photo1_name = '';
$photo2_name = '';
$photo3_name = '';

// First photo (mandatory)
if (!empty($_FILES['foreigner_photo_first']['name'])) {
    $ext1 = pathinfo($_FILES['foreigner_photo_first']['name'], PATHINFO_EXTENSION);
    $photo1_name = "foreigner_photo_first_" . $inserted_id . "_" . $unique_id . "." . $ext1;
    move_uploaded_file($_FILES['foreigner_photo_first']['tmp_name'], $upload_dir . $photo1_name);
}

// Second photo (optional)
if (!empty($_FILES['foreigner_photo_second']['name'])) {
    $ext2 = pathinfo($_FILES['foreigner_photo_second']['name'], PATHINFO_EXTENSION);
    $photo2_name = "foreigner_photo_second_" . $inserted_id . "_" . $unique_id . "." . $ext2;
    move_uploaded_file($_FILES['foreigner_photo_second']['tmp_name'], $upload_dir . $photo2_name);
}

// Third photo (optional)
if (!empty($_FILES['foreigner_photo_third']['name'])) {
    $ext3 = pathinfo($_FILES['foreigner_photo_third']['name'], PATHINFO_EXTENSION);
    $photo3_name = "foreigner_photo_third_" . $inserted_id . "_" . $unique_id . "." . $ext3;
    move_uploaded_file($_FILES['foreigner_photo_third']['tmp_name'], $upload_dir . $photo3_name);
}

// Update table with photo names
$update_sql = "UPDATE foreigner_managment 
SET foreigner_photo_first='$photo1_name', foreigner_photo_second='$photo2_name', foreigner_photo_third='$photo3_name'
WHERE foreigner_managment_id=$inserted_id";
mysqli_query($mysqli, $update_sql);

// Redirect or success
header("Location: show_all_foreigner.php?msg=success");
exit();
?>
