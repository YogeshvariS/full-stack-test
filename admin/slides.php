<?php

include '../config/db.php';

$query = mysqli_query($conn,

"SELECT slides.*, categories.title AS category_title

FROM slides

JOIN categories

ON slides.category_id = categories.id

ORDER BY slides.id DESC"

);

?>

<!DOCTYPE html>
<html>
<head>

    <title>Slides</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container py-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Slides</h2>

        <a
            href="add-slide.php"
            class="btn btn-success"
        >
            Add Slide
        </a>

    </div>

    <table class="table table-bordered align-middle">

        <thead>

            <tr>

                <th>ID</th>
                <th>Category</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
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
                        <?php echo $row['category_title']; ?>
                    </td>

                    <td>
                        <?php echo $row['title']; ?>
                    </td>

                    <td>
                        <?php echo $row['description']; ?>
                    </td>

                    <td>

                        <img
                            src="../uploads/<?php echo $row['image']; ?>"
                            width="100"
                        >

                    </td>

                    <td>

                        <a
                            href="edit-slide.php?id=<?php echo $row['id']; ?>"
                            class="btn btn-primary btn-sm"
                        >
                            Edit
                        </a>

                        <a
                            href="delete-slide.php?id=<?php echo $row['id']; ?>"
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