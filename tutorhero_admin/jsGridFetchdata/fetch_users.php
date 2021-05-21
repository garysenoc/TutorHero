<?php

//fetch_data.php

$connect = new PDO("mysql:host=localhost;dbname=tutorhero_db", "root", "");

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    $data = array(
        ':username'   => "%" . $_GET['username'] . "%",
        ':firstname'   => "%" . $_GET['firstname'] . "%",
        ':middlename'     => "%" . $_GET['middlename'] . "%",
        ':lastname'   => "%" . $_GET['lastname'] . "%",
        ':birthdate'   => "%" . $_GET['birthdate'] . "%",
        ':role'     => "%" . $_GET['role'] . "%",
        ':bionote'    => "%" . $_GET['bionote'] . "%",
        ':phone_number'    => "%" . $_GET['phone_number'] . "%",
        ':email'    => "%" . $_GET['email'] . "%"
    );
    $query = "SELECT * FROM users WHERE username LIKE :username AND firstname LIKE :firstname AND middlename LIKE :middlename AND lastname LIKE :lastname AND birthdate LIKE :birthdate AND role LIKE :role AND bionote LIKE :bionote AND phone_number LIKE :phone_number AND email LIKE :email ORDER BY userid ASC";

    $statement = $connect->prepare($query);
    $statement->execute($data);
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output[] = array(
            'userid'    => $row['userid'],
            'username'    => $row['username'],
            'firstname'    => $row['firstname'],
            'middlename'    => $row['middlename'],
            'lastname'    => $row['lastname'],
            'birthdate'    => $row['birthdate'],
            'role'  => $row['role'],
            'bionote'   => $row['bionote'],
            'phone_number'    => $row['phone_number'],
            'email'   => $row['email']
        );
    }
    header("Content-Type: application/json");
    echo json_encode($output);
}

if ($method == "POST") {


    $data = array(
        ':username'   =>  $_POST['username'],
        ':firstname'   =>  $_POST['firstname'],
        ':middlename'     => $_POST['middlename'],
        ':lastname'   =>  $_POST['lastname'],
        ':birthdate'   => $_POST['birthdate'],
        ':role'     => $_POST['role'],
        ':bionote'    =>  $_POST['bionote'],
        ':phone_number'    =>  $_POST['phone_number'],
        ':email'    =>  $_POST['email']
    );


    $query = "INSERT INTO users (username,firstname,middlename,lastname,birthdate,role,bionote,phone_number,email) VALUES (:username,:firstname,:middlename,:lastname,:birthdate,:role,:bionote,:phone_number,:email)";
    $statement = $connect->prepare($query);
    $statement->execute($data);
}




if ($method == 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);


    $data = array(
        ':userid'   =>  $_PUT['userid'],
        ':username'   =>  $_PUT['username'],
        ':firstname'   =>  $_PUT['firstname'],
        ':middlename'     => $_PUT['middlename'],
        ':lastname'   =>  $_PUT['lastname'],
        ':birthdate'   => $_PUT['birthdate'],
        ':role'     => $_PUT['role'],
        ':bionote'    =>  $_PUT['bionote'],
        ':phone_number'    =>  $_PUT['phone_number'],
        ':email'    =>  $_PUT['email']
    );

    $query = "UPDATE users SET username = :username , firstname = :firstname , middlename = :middlename , lastname = :lastname , birthdate = :birthdate , role = :role , bionote = :bionote , phone_number = :phone_number , email = :email WHERE userid = :userid";


    $statement = $connect->prepare($query);
    $statement->execute($data);
}

if ($method == "DELETE") {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $query = "DELETE FROM users WHERE userid = '" . $_DELETE["userid"] . "'";
    $statement = $connect->prepare($query);
    $statement->execute();
}
