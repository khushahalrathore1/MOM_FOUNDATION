<?php
include('config.php');

date_default_timezone_set('Asia/Kolkata');

// Function to generate a random 5-character string
function generateRandomString($length = 5) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

// Directory for uploads
$uploadDir = 'uploads/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0775, true);
}

// Helper to handle file upload
function handleUpload($fileInput, $tag, $uniqueId, $insertedId) {
    global $uploadDir;

    if (isset($_FILES[$fileInput]) && $_FILES[$fileInput]['error'] === UPLOAD_ERR_OK) {
        $timestamp = date("dmYHis");
        $randomStr = generateRandomString();
        $fileExt = pathinfo($_FILES[$fileInput]['name'], PATHINFO_EXTENSION);
        $fileName = "{$insertedId}_{$timestamp}_{$tag}_{$uniqueId}_{$randomStr}." . $fileExt;
        $destination = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES[$fileInput]['tmp_name'], $destination)) {
            return $fileName;
        }
    }

    return '';
}

// Safe form input handling for older PHP versions
$child_first_name      = isset($_POST['child_first_name']) ? $_POST['child_first_name'] : '';
$child_unique_id       = isset($_POST['child_unique_id']) ? $_POST['child_unique_id'] : '';
$dob                   = isset($_POST['dob']) ? $_POST['dob'] : '';
$age                   = isset($_POST['age']) ? $_POST['age'] : '';
$sex                   = isset($_POST['sex']) ? $_POST['sex'] : '';
$orphan_category       = isset($_POST['orphan_category']) ? $_POST['orphan_category'] : '';
$father_name           = isset($_POST['father_name']) ? $_POST['father_name'] : '';
$mother_name           = isset($_POST['mother_name']) ? $_POST['mother_name'] : '';
$guardian_name         = isset($_POST['guardian_name']) ? $_POST['guardian_name'] : '';
$joining_date          = isset($_POST['joining_date']) ? $_POST['joining_date'] : '';
$contact_no            = isset($_POST['contact_no']) ? $_POST['contact_no'] : '';
$alternate_contact     = isset($_POST['alternate_contact']) ? $_POST['alternate_contact'] : '';
$email                 = isset($_POST['email']) ? $_POST['email'] : '';
$current_education_status = isset($_POST['current_education_status']) ? $_POST['current_education_status'] : '';
$name_where_studying   = isset($_POST['name_where_studying']) ? $_POST['name_where_studying'] : '';
$child_story           = isset($_POST['child_story']) ? $_POST['child_story'] : '';
$leaving_date          = isset($_POST['leaving_date']) ? $_POST['leaving_date'] : '';
$leaving_reason        = isset($_POST['leaving_reason']) ? $_POST['leaving_reason'] : '';
$leaving_to            = isset($_POST['leaving_to']) ? $_POST['leaving_to'] : '';
$current_status        = isset($_POST['current_status']) ? $_POST['current_status'] : '';
$occupation            = isset($_POST['occupation']) ? $_POST['occupation'] : '';
$marital_status        = isset($_POST['marital_status']) ? $_POST['marital_status'] : '';
$spouse_name           = isset($_POST['spouse_name']) ? $_POST['spouse_name'] : '';
$spouse_occupation     = isset($_POST['spouse_occupation']) ? $_POST['spouse_occupation'] : '';
$husband_living        = isset($_POST['husband_living']) ? $_POST['husband_living'] : '';

// Insert without image fields
$sql = "INSERT INTO childern_forms (
    child_first_name, child_unique_id, dob, age, sex, orphan_category, father_name, mother_name,
    guardian_name, joining_date, contact_no, alternate_contact, email, current_education_status,
    name_where_studying, child_story, leaving_date, leaving_reason, leaving_to, current_status,
    occupation, marital_status, spouse_name, spouse_occupation, husband_living
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->prepare($sql);
if (!$stmt) {
    die('Statement prepare failed: ' . $mysqli->error);
}

$stmt->bind_param(
    'sssssssssssssssssssssssss',
    $child_first_name, $child_unique_id, $dob, $age, $sex, $orphan_category, $father_name, $mother_name,
    $guardian_name, $joining_date, $contact_no, $alternate_contact, $email, $current_education_status,
    $name_where_studying, $child_story, $leaving_date, $leaving_reason, $leaving_to, $current_status,
    $occupation, $marital_status, $spouse_name, $spouse_occupation, $husband_living
);

if ($stmt->execute()) {
    $insertedId = $stmt->insert_id;

    // Upload and save photo names
    $child_group_photo = handleUpload('child_group_photo', 'child_group_photo', $child_unique_id, $insertedId);
    $child_full_photo  = handleUpload('child_full_photo', 'child_full_photo', $child_unique_id, $insertedId);
    $child_small_photo = handleUpload('child_small_photo', 'child_small_photo', $child_unique_id, $insertedId);

    $update = $mysqli->prepare("UPDATE childern_forms SET child_group_photo=?, child_full_photo=?, child_small_photo=? WHERE id=?");
    if ($update) {
        $update->bind_param('sssi', $child_group_photo, $child_full_photo, $child_small_photo, $insertedId);
        $update->execute();
    }

    echo "<script>alert('Form submitted successfully!'); window.location.href='show_all_childern.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
?>
