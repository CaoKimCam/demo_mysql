<?php

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "demo";

    //create connection
    $connection = mysqli_connect($servername, $username, $password, $databasename);

    $sql = "DELETE FROM clients WHERE id = $id";
    $connection->query($sql);
}

header("location: /demo/index.php");
exit;
