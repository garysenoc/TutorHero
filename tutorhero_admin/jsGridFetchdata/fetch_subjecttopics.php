<?php
$connect = new PDO("mysql:host=localhost;dbname=tutorhero_db", "root", "");

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    $data = array(
        ':subjectid'   => "%" . $_GET['subjectid'] . "%",
        ':topic'     => "%" . $_GET['topic'] . "%",
    );
    $query = "SELECT * FROM subject_topics WHERE subjectid LIKE :subjectid AND topic LIKE :topic ORDER BY id ASC";

    // $query =    "SELECT subject_topics.id,subject_topics.subjectid, subjects.subject_name,subject_topics.topic
    //             FROM subjects
    //             INNER JOIN subject_topics ON subjects.subjectid=subject_topics.subjectid WHERE subject_name LIKE :subject_name AND topic LIKE :topic  ORDER BY subject_topics.id ASC";


    $statement = $connect->prepare($query);
    $statement->execute($data);
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output[] = array(
            'id'    => $row['id'],
            'subjectid'    => $row['subjectid'],
            'topic'    => $row['topic'],
        );
    }
    header("Content-Type: application/json");
    echo json_encode($output);
}


if ($method == "POST") {

    $data = array(
        ':subjectid'   =>  $_POST['subjectid'],
        ':topic'   =>  $_POST['topic'],
    );

    $query = "INSERT INTO subject_topics(subjectid,topic) VALUES (:subjectid,:topic)";
    $statement = $connect->prepare($query);
    $statement->execute($data);
}




if ($method == 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);


    $data = array(
        ':id'   =>  $_PUT['id'],
        ':subjectid'   =>  $_PUT['subjectid'],
        ':topic'   =>  $_PUT['topic'],

    );

    $query = "UPDATE subject_topics SET subjectid = :subjectid , topic = :topic WHERE id = :id";
    $statement = $connect->prepare($query);
    $statement->execute($data);
}

if ($method == "DELETE") {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $query = "DELETE FROM subject_topics WHERE id = '" . $_DELETE["id"] . "'";
    $statement = $connect->prepare($query);
    $statement->execute();
}
