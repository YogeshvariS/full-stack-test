<?php

include '../config/db.php';

$categories = mysqli_query($conn,
    "SELECT * FROM categories ORDER BY id DESC"
);

if(isset($_POST['submit'])) {

    $category_id = $_POST['category_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file(
        $tmp_name,
        "../uploads/" . $image
    );

    $query = "INSERT INTO slides
    (category_id, title, description, image)

    VALUES

    ('$category_id', '$title', '$description', '$image')";

    mysqli_query($conn, $query);

    header("Location: slides.php");
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Add Slide</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container py-5">

    <h2 class="mb-4">
        Add Slide
    </h2>

    <form method="POST" enctype="multipart/form-data">

        <!-- Category -->

        <div class="mb-3">

            <label class="form-label">
                Select Category
            </label>

            <select
                name="category_id"
                class="form-control"
                required
            >

                <option value="">
                    Select Category
                </option>

                <?php while($category = mysqli_fetch_assoc($categories)) { ?>

                    <option value="<?php echo $category['id']; ?>">

                        <?php echo $category['title']; ?>

                    </option>

                <?php } ?>

            </select>

        </div>

        <!-- Title -->

        <div class="mb-3">

            <label class="form-label">
                Slide Title
            </label>

            <input
                type="text"
                name="title"
                class="form-control"
                required
            >

        </div>

        <!-- Description -->

        <div class="mb-3">

            <label class="form-label">
                Description
            </label>

            <textarea
                name="description"
                class="form-control"
                rows="5"
                required
            ></textarea>

        </div>

        <!-- Image -->

        <div class="mb-3">

            <label class="form-label">
                Upload Image
            </label>

            <input
                type="file"
                name="image"
                class="form-control"
                required
            >

        </div>

        <button
            type="submit"
            name="submit"
            class="btn btn-primary"
        >
            Add Slide
        </button>

    </form>

</div>

</body>
</html>