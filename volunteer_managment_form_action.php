<?php
include('config.php'); // $mysqli = mysqli_connect(...) inside

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize & fetch
    $volunteer_name = mysqli_real_escape_string($mysqli, $_POST['volunteer_name']);
    $volunteer_type = mysqli_real_escape_string($mysqli, $_POST['volunteer_type']);
    $volunteer_country = isset($_POST['volunteer_country']) ? mysqli_real_escape_string($mysqli, $_POST['volunteer_country']) : '';
    $passport_number = mysqli_real_escape_string($mysqli, $_POST['passport_number']);
    $visa_type = mysqli_real_escape_string($mysqli, $_POST['visa_type']);
    $duration_of_stay = mysqli_real_escape_string($mysqli, $_POST['duration_of_stay']);
    $home_visit_from = !empty($_POST['home_visit_from']) ? date('Y-m-d', strtotime(str_replace('/','-',$_POST['home_visit_from']))) : NULL;
    $home_visit_till = !empty($_POST['home_visit_till']) ? date('Y-m-d', strtotime(str_replace('/','-',$_POST['home_visit_till']))) : NULL;
    $volunteer_status = mysqli_real_escape_string($mysqli, $_POST['volunteer_status']);
    $volunteer_occupation = isset($_POST['volunteer_occupation']) ? mysqli_real_escape_string($mysqli, $_POST['volunteer_occupation']) : '';
    $dob = !empty($_POST['dob']) ? date('Y-m-d', strtotime(str_replace('/','-',$_POST['dob']))) : NULL;
    $age = isset($_POST['age']) ? intval($_POST['age']) : NULL;
    $visit_date = !empty($_POST['visit_date']) ? date('Y-m-d', strtotime(str_replace('/','-',$_POST['visit_date']))) : NULL;
    $contact_number = mysqli_real_escape_string($mysqli, $_POST['contact_number']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $address = mysqli_real_escape_string($mysqli, $_POST['address']);
    $volunteering_reason = mysqli_real_escape_string($mysqli, $_POST['volunteering_reason']);
    $marital_status = mysqli_real_escape_string($mysqli, $_POST['marital_status']);
    $spouse_name = isset($_POST['spouse_name']) ? mysqli_real_escape_string($mysqli, $_POST['spouse_name']) : '';
    $marriage_date = !empty($_POST['marriage_date']) ? date('Y-m-d', strtotime(str_replace('/','-',$_POST['marriage_date']))) : NULL;
    $spouse_occupation = isset($_POST['spouse_occupation']) ? mysqli_real_escape_string($mysqli, $_POST['spouse_occupation']) : '';
    $spouse_living_location = isset($_POST['spouse_living_location']) ? mysqli_real_escape_string($mysqli, $_POST['spouse_living_location']) : '';

    // Step 1: Insert data with empty photo fields
    $sql = "INSERT INTO volunteer_managment 
        (volunteer_name, volunteer_type, volunteer_country, passport_number, visa_type, duration_of_stay, 
         home_visit_from, home_visit_till, volunteer_status, volunteer_occupation, dob, age, visit_date, 
         contact_number, email, address, volunteering_reason, marital_status, spouse_name, marriage_date, 
         spouse_occupation, spouse_living_location, volunteer_photo_first, volunteer_photo_second, volunteer_photo_third)
        VALUES (
         '$volunteer_name', '$volunteer_type', '$volunteer_country', '$passport_number', '$visa_type', '$duration_of_stay',
         " . ($home_visit_from ? "'$home_visit_from'" : "NULL") . ", " . ($home_visit_till ? "'$home_visit_till'" : "NULL") . ",
         '$volunteer_status', '$volunteer_occupation', " . ($dob ? "'$dob'" : "NULL") . ", " . ($age ? "'$age'" : "NULL") . ",
         " . ($visit_date ? "'$visit_date'" : "NULL") . ",
         '$contact_number', '$email', '$address', '$volunteering_reason', '$marital_status', '$spouse_name',
         " . ($marriage_date ? "'$marriage_date'" : "NULL") . ", '$spouse_occupation', '$spouse_living_location',
         '', '', ''
        )";

    if(mysqli_query($mysqli, $sql)){
        $inserted_id = mysqli_insert_id($mysqli);

        // Upload photos
        $upload_dir = "photos_volunteer/";
        $photo1 = uploadFile('volunteer_photo_first', $upload_dir, $inserted_id);
        $photo2 = uploadFile('volunteer_photo_second', $upload_dir, $inserted_id);
        $photo3 = uploadFile('volunteer_photo_third', $upload_dir, $inserted_id);

        // Update photos
        $update_sql = "UPDATE volunteer_managment SET
            volunteer_photo_first = '$photo1',
            volunteer_photo_second = '$photo2',
            volunteer_photo_third = '$photo3'
            WHERE volunteer_managment_id = $inserted_id";
        mysqli_query($mysqli, $update_sql);

        header("Location: show_all_volunteer.php?success=1");
        exit;
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}

// Function to upload file with unique ID
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
    return '';
}
?>
