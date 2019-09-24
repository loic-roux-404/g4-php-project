<?php
$servername = "remotemysql.com";
$username = "mVrrTxQ5nS";
$password = "IL3tuUFSCQ";
$dbname = "mVrrTxQ5nS";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("insert into secteur (id, libelle) values (:id, :libelle)");
    $stmt->execute([":id" => NULL, ":libelle" => "Informatique".rand()]);

    echo "New records created successfully";

    $stmt = $conn->prepare("select * from structure");

    $res = $stmt->execute();
    var_dump($res);

    if ($res) {
        $lines = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($lines);
    }

    $res = $stmt->execute();

    while ($line=$stmt->fetch(PDO::FETCH_ASSOC)) {
        var_dump($line);
        echo $line["ID"]." ".$line["NOM"]."<br/>";
    }
    var_dump($line);
}
catch(Exception $e)
{
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
