<?php
include('config.php'); // use $conn = mysqli_connect(...) inside config.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize and fetch
    $donor_name = mysqli_real_escape_string($conn, $_POST['donor_name']);
    $donor_status = mysqli_real_escape_string($conn, $_POST['donor_status']);
    $occupation = isset($_POST['occupation']) ? mysqli_real_escape_string($conn, $_POST['occupation']) : '';
    $dob = !empty($_POST['dob']) ? date('Y-m-d', strtotime($_POST['dob'])) : NULL;
    $age = isset($_POST['age']) ? intval($_POST['age']) : NULL;
    $contact_no = mysqli_real_escape_string($conn, $_POST['contact_no']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $visit_date = !empty($_POST['visit_date']) ? date('Y-m-d', strtotime($_POST['visit_date'])) : NULL;
    $donated_description = mysqli_real_escape_string($conn, $_POST['donated_description']);
    $reason_for_donating = mysqli_real_escape_string($conn, $_POST['reason_for_donating']);
    $memory_name = isset($_POST['memory_name']) ? mysqli_real_escape_string($conn, $_POST['memory_name']) : '';
    $memory_dob = !empty($_POST['memory_dob']) ? date('Y-m-d', strtotime($_POST['memory_dob'])) : NULL;
    $memory_dod = !empty($_POST['memory_dod']) ? date('Y-m-d', strtotime($_POST['memory_dod'])) : NULL;
    $marital_status = isset($_POST['marital_status']) ? mysqli_real_escape_string($conn, $_POST['marital_status']) : '';
    $husband_name = isset($_POST['husband_name']) ? mysqli_real_escape_string($conn, $_POST['husband_name']) : '';
    $marriage_date = !empty($_POST['marriage_date']) ? date('Y-m-d', strtotime($_POST['marriage_date'])) : NULL;
    $husband_occupation = isset($_POST['husband_occupation']) ? mysqli_real_escape_string($conn, $_POST['husband_occupation']) : '';
    $living_location = isset($_POST['living_location']) ? mysqli_real_escape_string($conn, $_POST['living_location']) : '';

    // Upload files
    $upload_dir = "uploads/";
    $photo1 = uploadFile('event_photo_first', $upload_dir);
    $photo2 = uploadFile('event_photo_second', $upload_dir);
    $photo3 = uploadFile('event_photo_third', $upload_dir);

    // Build INSERT query
    $sql = "INSERT INTO donor_managment 
    (donor_name, donor_status, occupation, dob, age, contact_no, email, address, visit_date, 
     donated_description, reason_for_donating, memory_name, memory_dob, memory_dod, marital_status, 
     husband_name, marriage_date, husband_occupation, living_location, 
     event_photo_first, event_photo_second, event_photo_third)
    VALUES (
     '$donor_name', '$donor_status', '$occupation', " . ($dob ? "'$dob'" : "NULL") . ", " . ($age ? "'$age'" : "NULL") . ",
     '$contact_no', '$email', '$address', " . ($visit_date ? "'$visit_date'" : "NULL") . ",
     '$donated_description', '$reason_for_donating', '$memory_name', " . ($memory_dob ? "'$memory_dob'" : "NULL") . ",
     " . ($memory_dod ? "'$memory_dod'" : "NULL") . ", '$marital_status', '$husband_name', " . ($marriage_date ? "'$marriage_date'" : "NULL") . ",
     '$husband_occupation', '$living_location', '$photo1', '$photo2', '$photo3'
    )";

    if(mysqli_query($conn, $sql)){
        header("Location: show_all_donors.php?success=1");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Upload function
function uploadFile($field, $upload_dir) {
    if(isset($_FILES[$field]) && $_FILES[$field]['error'] == 0){
        $filename = time().'_'.basename($_FILES[$field]['name']);
        $target = $upload_dir.$filename;
        if(move_uploaded_file($_FILES[$field]['tmp_name'], $target)){
            return $filename;
        }
    }
    return '';
}
?>
