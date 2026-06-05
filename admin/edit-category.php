<?php

include '../config/db.php';

$id = $_GET['id'];

$category = mysqli_fetch_assoc(
    mysqli_query($conn,
        "SELECT * FROM categories WHERE id = $id"
    )
);

if(isset($_POST['submit'])) {

    $title = $_POST['title'];

    mysqli_query($conn,
        "UPDATE categories
         SET title='$title'
         WHERE id=$id"
    );

    header("Location: categories.php");
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Edit Category</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container py-5">

    <h2 class="mb-4">
        Edit Category
    </h2>

    <form method="POST">

        <div class="mb-3">

            <label class="form-label">
                Category Title
            </label>

            <input
                type="text"
                name="title"
                class="form-control"
                value="<?php echo $category['title']; ?>"
                required
            >

        </div>

        <button
            type="submit"
            name="submit"
            class="btn btn-primary"
        >
            Update Category
        </button>

    </form>

</div>

</body>
</html>