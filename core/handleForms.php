<?php 
require_once "dbConfig.php";
require_once "functions.php";

if(isset($_POST['submitApplicationButton'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $religion = $_POST['religion'];
    $email_address = $_POST['email_address'];
    $home_address = $_POST['home_address'];
    $experienceInMonths = $_POST['experienceInMonths'];

    $function = addApplication($pdo, $first_name, $last_name, $age, $birthdate, $gender, $religion, $email_address, $home_address, $experienceInMonths);

    if($function['statusCode'] == "200") {
        $_SESSION['message'] = $function['message'];
        header('Location: ../index.php');
    } else {
        $_SESSION['message'] = "Error " . $function['statusCode'] . ": " . $function['message'];
        header('Location: ../index.php');
    }
}

if(isset($_POST['editApplicationButton'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $religion = $_POST['religion'];
    $email_address = $_POST['email_address'];
    $home_address = $_POST['home_address'];
    $experienceInMonths = $_POST['experienceInMonths'];
    $application_id = $_GET['application_id'];

    $function = editApplicationByID($pdo, $first_name, $last_name, $age, $birthdate, $gender, $religion, $email_address, $home_address, $experienceInMonths, $application_id);

    if($function['statusCode'] == "200") {
        $_SESSION['message'] = $function['message'];
        header('Location: ../index.php');
    } else {
        $_SESSION['message'] = "Error " . $function['statusCode'] . ": " . $function['message'];
        header('Location: ../index.php');
    }
}

if(isset($_POST['deleteApplicationButton'])) {
    $function = deleteApplicationByID($pdo, $_GET['application_id']);

    if($function['statusCode'] == "200") {
        $_SESSION['message'] = $function['message'];
        header('Location: ../index.php');
    } else {
        $_SESSION['message'] = "Error " . $function['statusCode'] . ": " . $function['message'];
        header('Location: ../index.php');
    }
}
?>