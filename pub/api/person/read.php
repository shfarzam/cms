<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Database object
include_once '../config/database.php';
include_once '../config/api.php';
include_once '../objects/product.php';

//instantiate database

$req = new api();
if($req->validApi($_POST['api_key'])) {
    $database = new Database();
    $db = $database->getConnection();

    $person = new Person($db);

    $stmt = $person->readAll();
    $num = $stmt->rowcount();


    if ($num > 0) {
        $data = "";
        $x = 1;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $data .= '{';
            $data .= '"id":"' . $PersonID . '", ';
            $data .= '"name":"' . $FirstName . '", ';
            $data .= '"lastname":"' . $LastName . '", ';
            $data .= '}';

            $data .= $x < $num ? ',' : '';
            $x++;
        }

        echo "[{$data}]";
    } else {
        echo '[{}]';
    }
} else {
    echo '[{"message":"error in connecting"}]';
}