<?php

include '../config/db.php';

$id = $_GET['id'];

mysqli_query($conn,
    "DELETE FROM slides WHERE id = $id"
);

header("Location: slides.php");

?>