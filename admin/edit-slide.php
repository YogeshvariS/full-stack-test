<?php

include '../config/db.php';

$id = $_GET['id'];

$slide = mysqli_fetch_assoc(
    mysqli_query($conn,
        "SELECT * FROM slides WHERE id = $id"
    )
);

$categories = mysqli_query($conn,
    "SELECT * FROM categories ORDER BY id DESC"
);

if(isset($_POST['submit'])) {

    $category_id = $_POST['category_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $image = $slide['image'];

    if(!empty($_FILES['image']['name'])) {

        $image = $_FILES['image']['name'];

        $tmp_name = $_FILES['image']['tmp_name'];

        move_uploaded_file(
            $tmp_name,
            "../uploads/" . $image
        );
    }

    mysqli_query($conn,

        "UPDATE slides

        SET

        category_id='$category_id',
        title='$title',
        description='$description',
        image='$image'

        WHERE id=$id"

    );

    header("Location: slides.php");
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Edit Slide</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container py-5">

    <h2 class="mb-4">
        Edit Slide
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

                <?php while($category = mysqli_fetch_assoc($categories)) { ?>

                    <option
                        value="<?php echo $category['id']; ?>"

                        <?php
                        if($category['id'] == $slide['category_id']) {
                            echo 'selected';
                        }
                        ?>
                    >

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
                value="<?php echo $slide['title']; ?>"
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
            ><?php echo $slide['description']; ?></textarea>

        </div>

        <!-- Current Image -->

        <div class="mb-3">

            <img
                src="../uploads/<?php echo $slide['image']; ?>"
                width="150"
                class="mb-3"
            >

            <input
                type="file"
                name="image"
                class="form-control"
            >

        </div>

        <button
            type="submit"
            name="submit"
            class="btn btn-primary"
        >
            Update Slide
        </button>

    </form>

</div>

</body>
</html>