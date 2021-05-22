<?php
$connect = new PDO("mysql:host=localhost;dbname=tutorhero_db", "root", "");

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    $data = array(
        ':description'   => "%" . $_GET['description'] . "%",
        ':post_date'     => "%" . $_GET['post_date'] . "%",
        ':post_time'     => "%" . $_GET['post_time'] . "%",
        ':isSolved'     => "%" . $_GET['isSolved'] . "%",
    );
    $query = "SELECT * FROM posts WHERE description LIKE :description AND post_date LIKE :post_date AND post_time LIKE :post_time AND isSolved LIKE :isSolved ORDER BY postid ASC";

    $statement = $connect->prepare($query);
    $statement->execute($data);
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output[] = array(
            'postid'    => $row['postid'],
            'description'    => $row['description'],
            'post_date'    => $row['post_date'],
            'post_time'    => $row['post_time'],
            'isSolved'    => $row['isSolved']
        );
    }
    header("Content-Type: application/json");
    echo json_encode($output);
}


if ($method == "POST") {

    $data = array(
        ':description'   =>  $_POST['description'],
        ':post_date'   =>  $_POST['post_date'],
        ':post_time'   =>  $_POST['post_time'],
        ':isSolved'   =>  $_POST['isSolved']
    );

    $query = "INSERT INTO posts(description,post_date,post_time,isSolved) VALUES (:description,:post_date,:post_time,:isSolved)";
    $statement = $connect->prepare($query);
    $statement->execute($data);
}




if ($method == 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);


    $data = array(
        ':postid'   =>  $_PUT['postid'],
        ':description'   =>  $_PUT['description'],
        ':post_date'   =>  $_PUT['post_date'],
        ':post_time'   =>  $_PUT['post_time'],
        ':isSolved'   =>  $_PUT['isSolved']
    );

    $query = "UPDATE posts SET description = :description, post_date = :post_date, post_time = :post_time, isSolved = :isSolved WHERE postid = :postid";
    $statement = $connect->prepare($query);
    $statement->execute($data);
}

if ($method == "DELETE") {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $query = "DELETE FROM posts WHERE postid = '" . $_DELETE["postid"] . "'";
    $statement = $connect->prepare($query);
    $statement->execute();
}
