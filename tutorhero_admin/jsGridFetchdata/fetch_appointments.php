<?php
$connect = new PDO("mysql:host=localhost;dbname=tutorhero_db", "root", "");

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    $data = array(
        ':created_date'   => "%" . $_GET['created_date'] . "%",
        ':time_start'     => "%" . $_GET['time_start'] . "%",
        ':time_end'     => "%" . $_GET['time_end'] . "%",
        ':subjectid'     => "%" . $_GET['subjectid'] . "%",
        ':userid'     => "%" . $_GET['userid'] . "%"
    );
    $query = "SELECT * FROM appointments WHERE created_date LIKE :created_date AND time_start LIKE :time_start AND time_end LIKE :time_end AND subjectid LIKE :subjectid  AND userid LIKE :userid ORDER BY appointmentid ASC";

    $statement = $connect->prepare($query);
    $statement->execute($data);
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output[] = array(
            'appointmentid'    => $row['appointmentid'],
            'created_date'    => $row['created_date'],
            'time_start'    => $row['time_start'],
            'time_end'    => $row['time_end'],
            'subjectid'    => $row['subjectid'],
            'userid'    => $row['userid']
        );
    }
    header("Content-Type: application/json");
    echo json_encode($output);
}


if ($method == "POST") {


    $data = array(
        ':created_date'   =>  $_POST['created_date'],
        ':time_start'   =>  $_POST['time_start'],
        ':time_end'   =>  $_POST['time_end'],
        ':subjectid'   =>  $_POST['subjectid'],
        ':userid'   =>  $_POST['userid'],
    );

    $query = "INSERT INTO appointments(created_date,time_start,time_end,subjectid,userid) VALUES (:created_date,:time_start,:time_end,:subjectid,:userid)";
    $statement = $connect->prepare($query);
    $statement->execute($data);
}




if ($method == 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);


    $data = array(
        ':appointmentid'   =>  $_PUT['appointmentid'],
        ':created_date'   =>  $_PUT['created_date'],
        ':time_start'   =>  $_PUT['time_start'],
        ':time_end'   =>  $_PUT['time_end'],
        ':subjectid'   =>  $_PUT['subjectid'],
        ':userid'   =>  $_PUT['userid']

    );

    $query = "UPDATE appointments SET created_date = :created_date, time_start = :time_start, time_end = :time_end, subjectid = :subjectid, userid = :userid WHERE appointmentid = :appointmentid";
    $statement = $connect->prepare($query);
    $statement->execute($data);
}

if ($method == "DELETE") {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $query = "DELETE FROM appointments WHERE appointmentid = '" . $_DELETE["appointmentid"] . "'";
    $statement = $connect->prepare($query);
    $statement->execute();
}
