<!-- ./php/index.php -->

<html xmlns="http://www.w3.org/1999/html">
<head content="text/plain">

    <title>Hello Docker World</title>
</head>
<link rel="stylesheet/less" type="text/css" href="less/style1.less" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.js" ></script>
<!--
<style>
    table, th, td {
        border: 1px solid darkolivegreen;
        text-align: center;
    }
</style>
-->
<body >

<div id="mypar1">
    <p>Hello, World!</p>
</div>
<br>
<div id="mypar2">
    <h1>By Docker</h1>
</div>
<br>

<?php
$dsn = 'mysql:dbname=test_db;host=db';
$user = 'sh';
$password = '12345';

try {
    $link1 = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

echo "Connected successfully<br>";


try {

    $sql = $link1->query("CREATE TABLE IF NOT EXISTS Persons (PersonID INT,LastName VARCHAR(255),
                          FirstName VARCHAR(255),Address VARCHAR(255),City VARCHAR(255));");

    if ($sql == True) {

        echo "<br>Table Persons created successfully<br>";
    } else {
        echo "Create down";
    }


} catch (PDOException $e) {
    echo "Error creating table: " . $e->getMessage();
}


$sql = "INSERT INTO Persons VALUES (11, 'Far1', 'Sha1', 'allers1','Nür1'); ";
$sql .= " INSERT INTO Persons VALUES (12, 'Far2', 'Sha2', 'allers21','Nür21');  ";
$sql .= " INSERT INTO Persons VALUES (13, 'Far31', 'Sha31',' allers31','Nür31');";
$sql .= " INSERT INTO Persons VALUES (14, 'Far41', 'Sha41', 'allers41','Nür41');";
$sql .= " INSERT INTO Persons VALUES (15, 'Far51', 'Sha51', 'allers51','Nür51')";

try {
   // $result = $link1->exec($sql);
    echo "<p>Insert down successfully </p>";
} catch (PDOException $e) {

    echo "Error creating table: " . $e->getmessage();
}


try {
    $sql = "SELECT PersonID,LastName,FirstName,Address,City  FROM Persons";
    $stmt = $link1->query($sql);


    echo "<table align='center' id='somediv'>";
    echo "<tr><th>PersonID</th> <th>First Name</th>  <th>Last Name</th> </tr>";
    // output data of each row

    while ($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . $row["PersonID"] . " </td><td> " . $row["FirstName"] . " </td><td>" . $row["LastName"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} catch (PDOException $e) {

    echo "Error" . §e . getMessage();
}

?>
</body>
</html>
