<?php

include '../config/db.php';

$query = mysqli_query($conn,
    "SELECT * FROM categories ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>
<head>

    <title>Categories</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container py-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Categories</h2>

        <a
            href="add-category.php"
            class="btn btn-success"
        >
            Add Category
        </a>

    </div>

    <table class="table table-bordered">

        <thead>

            <tr>
                <th>ID</th>
                <th>Title</th>
                <th width="200">Actions</th>
            </tr>

        </thead>

        <tbody>

            <?php while($row = mysqli_fetch_assoc($query)) { ?>

                <tr>

                    <td>
                        <?php echo $row['id']; ?>
                    </td>

                    <td>
                        <?php echo $row['title']; ?>
                    </td>

                    <td>

                        <a
                            href="edit-category.php?id=<?php echo $row['id']; ?>"
                            class="btn btn-primary btn-sm"
                        >
                            Edit
                        </a>

                        <a
                            href="delete-category.php?id=<?php echo $row['id']; ?>"
                            class="btn btn-danger btn-sm"
                        >
                            Delete
                        </a>

                    </td>

                </tr>

            <?php } ?>

        </tbody>

    </table>

</div>

</body>
</html>