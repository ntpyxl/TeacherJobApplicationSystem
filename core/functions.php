<?php
require_once "dbConfig.php";

function addApplication($pdo, $first_name, $last_name, $age, $birthdate, $gender, $religion, $email_address, $home_address, $experienceInMonths) {
    $response = array();
    $query = "INSERT INTO applications (first_name, last_name, age, birthdate, gender, religion, email_address, home_address, experienceInMonths) VALUEs (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $statement = $pdo -> prepare($query);
    $executeQuery = $statement -> execute([$first_name, $last_name, $age, $birthdate, $gender, $religion, $email_address, $home_address, $experienceInMonths]);

    if($executeQuery) {
        $response = array(
            "statusCode" => "200",
            "message" => "Application submitted successfully!"
        );
    } else {
        $response = array(
            "statusCode" => "400",
            "message" => "Failed to submit application!"
        );
    }
    return $response;
}

function editApplicationByID($pdo, $first_name, $last_name, $age, $birthdate, $gender, $religion, $email_address, $home_address, $experienceInMonths, $application_id) {
    $response = array();
    $query = "UPDATE applications
            SET first_name = ?,
                last_name = ?,
                age = ?,
                birthdate = ?,
                gender = ?,
                religion = ?,
                email_address = ?,
                home_address = ?,
                experienceInMonths = ?
            WHERE application_id = ?";
    
    $statement = $pdo -> prepare($query);
    $executeQuery = $statement -> execute([$first_name, $last_name, $age, $birthdate, $gender, $religion, $email_address, $home_address, $experienceInMonths, $application_id]);

    if($executeQuery) {
        $response = array(
            "statusCode" => "200",
            "message" => "Application " . $application_id . " edited successfully!"
        );
    } else {
        $response = array(
            "statusCode" => "400",
            "message" => "Failed to edit application " . $application_id . "!"
        );
    }
    return $response;
}

function getAllApplications($pdo) {
    $query = "SELECT * FROM applications";

    $statement = $pdo -> prepare($query);
    $executeQuery = $statement -> execute();

    if($executeQuery) {
        $response = array(
            "statusCode" => "200",
            "querySet" => $statement -> fetchAll()
        );
    } else {
        $response = array(
            "statusCode" => "400",
            "message" => "Failed to get applications!"
        );
    }
    return $response;
}

function getApplicationByID($pdo, $application_id) {
    $query = "SELECT * FROM applications WHERE application_id = ?";

    $statement = $pdo -> prepare($query);
    $executeQuery = $statement -> execute([$application_id]);

    if($executeQuery) {
        $response = array(
            "statusCode" => "200",
            "querySet" => $statement -> fetch()
        );
    } else {
        $response = array(
            "statusCode" => "400",
            "message" => "Failed to get application " . $application_id . "!"
        );
    }
    return $response;
}

function searchForApplication($pdo, $searchQuery) {
    $query = "SELECT * FROM applications 
                WHERE CONCAT(first_name, last_name, age, birthdate, gender, religion, email_address, home_Address, experienceInMonths)
                LIKE ?";

    $statement = $pdo -> prepare($query);
    $executeQuery = $statement -> execute(["%".$searchQuery."%"]);

    if($executeQuery) {
        $response = array(
            "statusCode" => "200",
            "querySet" => $statement -> fetchAll()
    );
        } else {
        $response = array(
            "statusCode" => "400",
            "message" => "Failed to search for applications!"
        );
    }
    return $response;
}

function deleteApplicationByID($pdo, $application_id) {
    $query = "DELETE FROM applications WHERE application_id = ?";

    $statement = $pdo -> prepare($query);
    $executeQuery = $statement -> execute([$application_id]);

    if($executeQuery) {
        $response = array(
            "statusCode" => "200",
            "message" => "Application " . $application_id . " has been deleted!"
        );
    } else {
        $response = array(
            "statusCode" => "400",
            "message" => "Failed to delete application " . $application_id . "!"
        );
    }
    return $response;
}
?>