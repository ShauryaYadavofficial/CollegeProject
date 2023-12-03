<?php

include_once('./connection.php');
echo "ff";

if(isset($_POST['primary_discipline']) && isset($_POST['secondary_discipline']) && isset($_POST['application_for_post']) && isset($_POST['primary_specialization']) &&
   isset($_POST['secondary_specialization']) && isset($_POST['research_area']) && isset($_POST['first_name']) && isset($_POST['middle_name']) &&
   isset($_POST['last_name']) && isset($_POST['date_of_birth']) && isset($_POST['age']) && isset($_POST['place_of_birth']) &&
   isset($_POST['marital_status']) && isset($_POST['gender']) && isset($_POST['nationality']) && isset($_POST['father_name']) && isset($_POST['mother_name']) ){

   echo "kk";
    $primary_discipline = $_POST['primary_discipline'];
    $secondary_discipline = $_POST['secondary_discipline'];
    $application_for_post = $_POST['application_for_post'];
    $primary_specialization = $_POST['primary_specialization'];
    $secondary_specialization = $_POST['secondary_specialization'];
    $research_area = $_POST['research_area'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $age = $_POST['age'];
    $place_of_birth = $_POST['place_of_birth'];
    $marital_status = $_POST['marital_status'];
    $gender = $_POST['gender'];
    $nationality =  $_POST['nationality'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    // $user_id=$_POST['user_id'];
    // $password=$_POST['password'];

    $pdf = $_FILES['pdf']['name'];
        $pdf_size = $_FILES['pdf']['size'];
        $pdf_temp_loc = $_FILES['pdf']['tmp_name'];
        $pdf_store = "pdf/" . $pdf;
        move_uploaded_file($pdf_temp_loc, $pdf_store);

    echo "gh";
    // Construct and execute the SQL query
    $sql = "INSERT INTO form (primary_discipline, secondary_discipline, application_for_post, primary_specialization, secondary_specialization, research_area, first_name, middle_name, last_name, date_of_birth, age, place_of_birth, marital_status, gender, nationality, pdf) 
            VALUES ('$primary_discipline', '$secondary_discipline', '$application_for_post', '$primary_specialization', '$secondary_specialization', '$research_area', '$first_name', '$middle_name', '$last_name', '$date_of_birth', '$age', '$place_of_birth', '$marital_status', '$gender', '$nationality', '$pdf')";
 
            echo "okkk";

    if($conn->query($sql)==true){
        echo "OK";
    }
    else {
        echo "FAILED";
    }
    
}

?>