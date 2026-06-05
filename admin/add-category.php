<?php

include '../config/db.php';

if(isset($_POST['submit'])) {

    $title = $_POST['title'];

    $query = "INSERT INTO categories(title)
              VALUES('$title')";

    mysqli_query($conn, $query);

    header("Location: categories.php");
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Add Category</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container py-5">

    <h2 class="mb-4">Add Category</h2>

    <form method="POST">

        <div class="mb-3">

            <label class="form-label">
                Category Title
            </label>

            <input
                type="text"
                name="title"
                class="form-control"
                required
            >

        </div>

        <button
            type="submit"
            name="submit"
            class="btn btn-primary"
        >
            Add Category
        </button>

    </form>

</div>

</body>
</html>