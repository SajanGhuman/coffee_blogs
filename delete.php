<?php
require('../connect.php');
if (isset($_GET['id'])) {
    $query = "DELETE FROM blog WHERE id = :id";
    $id = $_GET['id'];
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    header("Location: index.php");
    exit;
}
