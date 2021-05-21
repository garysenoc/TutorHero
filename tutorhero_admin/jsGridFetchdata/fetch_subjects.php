<?php
$connect = new PDO("mysql:host=localhost;dbname=tutorhero_db", "root", "");

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    $data = array(
        ':subject_name'   => "%" . $_GET['subject_name'] . "%",
        ':no_of_tutors'     => "%" . $_GET['no_of_tutors'] . "%",
    );
    $query = "SELECT * FROM subjects WHERE subject_name LIKE :subject_name AND no_of_tutors LIKE :no_of_tutors ORDER BY subjectid ASC";

    $statement = $connect->prepare($query);
    $statement->execute($data);
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output[] = array(
            'subjectid'    => $row['subjectid'],
            'subject_name'    => $row['subject_name'],
            'no_of_tutors'    => $row['no_of_tutors'],
        );
    }
    header("Content-Type: application/json");
    echo json_encode($output);
}

if ($method == "POST") {

    $data = array(
        ':subject_name'   =>  $_POST['subject_name'],
        ':no_of_tutors'   =>  $_POST['no_of_tutors'],
    );

    $query = "INSERT INTO subjects (subject_name,no_of_tutors) VALUES (:subject_name,:no_of_tutors)";
    $statement = $connect->prepare($query);
    $statement->execute($data);
}




if ($method == 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);


    $data = array(
        ':subjectid'   =>  $_PUT['subjectid'],
        ':subject_name'   =>  $_PUT['subject_name'],
        ':no_of_tutors'   =>  $_PUT['no_of_tutors'],

    );

    $query = "UPDATE subjects SET subject_name = :subject_name , no_of_tutors = :no_of_tutors WHERE subjectid = :subjectid";
    $statement = $connect->prepare($query);
    $statement->execute($data);
}

if ($method == "DELETE") {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $query = "DELETE FROM subjects WHERE subjectid = '" . $_DELETE["subjectid"] . "'";
    $statement = $connect->prepare($query);
    $statement->execute();
}
