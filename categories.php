<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "categories";

    $connection = new mysqli($servername, $username, $password, $db_name);
    $connection->set_charset('utf8');

    if ($connection->connect_error) {
        die("error connection :" . $connection->connect_error);
    }

    $parent_id = $_GET['parent_id'];

    $sql = "SELECT * FROM category WHERE parent_id = $parent_id";
    $childrens = $connection->query($sql);

    $result = array();
    if (mysqli_num_rows($childrens) > 0) {
        while ($row = mysqli_fetch_assoc($childrens)) {
            $result[] = $row;
        }
    }
    

    header('Content-Type: application/json');
    echo json_encode($result);

    mysqli_close($connection);

?>