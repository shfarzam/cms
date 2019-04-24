<?php


error_reporting(E_ALL);

$mc = new Memcached();
$mc->addServer("172.28.1.6", "11211");


    $dsn = 'mysql:dbname=test_db;host=db';
    $user = 'sh';
    $password = '12345';

    try {
        $link = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
    }
    try {
        $sql = "SELECT PersonID,LastName,FirstName,Address,City  FROM Persons";
        $stmt = $link->query($sql);




    $txt= "<table align='center'>";
    $txt.= "<tr><th>PersonID</th> <th>First Name</th>  <th>Last Name</th> </tr>";
    // output data of each row

    while ($row = $stmt->fetch()) {
        $txt.= "<tr>";
        $txt.= "<td>" . $row["PersonID"] . " </td><td> " . $row["FirstName"] . " </td><td>" . $row["LastName"] . "</td>";
        $txt.= "</tr>";
    }

        $txt.= "</table>";

}
catch(PDOException $e) {

    $txt= "Error".§e.getMessage();
}

$flag = $mc->set('name', $txt);
//echo ($flag) ? 'y' : 'n';
//echo $mc->getResultCode();
echo $mc->get('name');

