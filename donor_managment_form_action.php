<?php
include('config.php'); // uses $mysqli = mysqli_connect(...) inside config.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Optional debug:
    // echo '<pre>';
    // print_r($_POST);
    // print_r($_FILES);
    // echo '</pre>';
    // die;

    // Sanitize and fetch
    $donor_name = mysqli_real_escape_string($mysqli, $_POST['donor_name']);
    $donor_status = mysqli_real_escape_string($mysqli, $_POST['donor_status']);
    $occupation = isset($_POST['occupation']) ? mysqli_real_escape_string($mysqli, $_POST['occupation']) : '';
    $dob = !empty($_POST['dob']) ? date('Y-m-d', strtotime($_POST['dob'])) : NULL;
    $age = isset($_POST['age']) ? intval($_POST['age']) : NULL;
    $contact_no = mysqli_real_escape_string($mysqli, $_POST['contact_no']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $address = mysqli_real_escape_string($mysqli, $_POST['address']);
    $visit_date = !empty($_POST['visit_date']) ? date('Y-m-d', strtotime($_POST['visit_date'])) : NULL;
    $donated_description = mysqli_real_escape_string($mysqli, $_POST['donated_description']);
    $reason_for_donating = mysqli_real_escape_string($mysqli, $_POST['reason_for_donating']);
    $memory_name = isset($_POST['memory_name']) ? mysqli_real_escape_string($mysqli, $_POST['memory_name']) : '';
    $memory_dob = !empty($_POST['memory_dob']) ? date('Y-m-d', strtotime($_POST['memory_dob'])) : NULL;
    $memory_dod = !empty($_POST['memory_dod']) ? date('Y-m-d', strtotime($_POST['memory_dod'])) : NULL;
    $marital_status = isset($_POST['marital_status']) ? mysqli_real_escape_string($mysqli, $_POST['marital_status']) : '';
    $spouse_name = isset($_POST['spouse_name']) ? mysqli_real_escape_string($mysqli, $_POST['spouse_name']) : '';
    $marriage_date = !empty($_POST['marriage_date']) ? date('Y-m-d', strtotime($_POST['marriage_date'])) : NULL;
    $spouse_occupation = isset($_POST['spouse_occupation']) ? mysqli_real_escape_string($mysqli, $_POST['spouse_occupation']) : '';
    $spouse_living_location = isset($_POST['spouse_living_location']) ? mysqli_real_escape_string($mysqli, $_POST['spouse_living_location']) : '';

    // Step 1: Insert first with empty photo fields
    $sql = "INSERT INTO donor_managment 
    (donor_name, donor_status, occupation, dob, age, contact_no, email, address, visit_date, 
     donated_description, reason_for_donating, memory_name, memory_dob, memory_dod, marital_status, 
     spouse_name, marriage_date, spouse_occupation, spouse_living_location, 
     event_photo_first, event_photo_second, event_photo_third)
    VALUES (
     '$donor_name', '$donor_status', '$occupation', " . ($dob ? "'$dob'" : "NULL") . ", " . ($age ? "'$age'" : "NULL") . ",
     '$contact_no', '$email', '$address', " . ($visit_date ? "'$visit_date'" : "NULL") . ",
     '$donated_description', '$reason_for_donating', '$memory_name', " . ($memory_dob ? "'$memory_dob'" : "NULL") . ",
     " . ($memory_dod ? "'$memory_dod'" : "NULL") . ", '$marital_status', '$spouse_name', " . ($marriage_date ? "'$marriage_date'" : "NULL") . ",
     '$spouse_occupation', '$spouse_living_location', '', '', ''
    )";

    if(mysqli_query($mysqli, $sql)){
        // Step 2: Get inserted ID
        $inserted_id = mysqli_insert_id($mysqli);

        // Step 3: Upload files
        $upload_dir = "donor_uploads/";
        $photo1 = uploadFile('donor_photo_first', $upload_dir, $inserted_id);
        $photo2 = uploadFile('donor_photo_second', $upload_dir, $inserted_id);
        $photo3 = uploadFile('donor_photo_third', $upload_dir, $inserted_id);

        // Step 4: Update DB with file names
   $update_sql = "UPDATE donor_managment SET 
            donor_photo_second = '$photo1',
            donor_photo_second = '$photo2',
            donor_photo_third = '$photo3'
            WHERE donor_managment_id = $inserted_id";
        mysqli_query($mysqli, $update_sql);

        // Go to list page with success
        header("Location: show_all_donors.php?success=1");
        exit;
    } else {
        echo "Error inserting donor: " . mysqli_error($mysqli);
    }
}

// Upload file with 5-character unique ID
function uploadFile($field, $upload_dir, $inserted_id) {
    if(isset($_FILES[$field]) && $_FILES[$field]['error'] == 0){
        $unique_id = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 5);
        $extension = strtolower(pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION));
        $filename = $field . "_" . $inserted_id . "_" . $unique_id . "." . $extension;
        $target = $upload_dir . $filename;

        if(move_uploaded_file($_FILES[$field]['tmp_name'], $target)){
            return $filename;
        }
    }
    return ''; // Return empty if no upload
}
?>
