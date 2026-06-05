<?php

include 'config/db.php';
include 'includes/header.php';

$categories = mysqli_query($conn,
    "SELECT * FROM categories ORDER BY id ASC"
);

?>

<div class="container py-5">

    <div class="row">

        <!-- Tabs Column -->

        <div class="col-lg-3 mb-4">

            <div class="tabs-wrapper">

                <?php

                $count = 0;

                while($category = mysqli_fetch_assoc($categories)) {

                ?>

                    <button
                        class="tab-btn <?php echo $count == 0 ? 'active' : ''; ?>"
                        data-category="<?php echo $category['id']; ?>"
                    >

                        <?php echo $category['title']; ?>

                    </button>

                <?php

                    $count++;
                }

                ?>

            </div>

        </div>

        <!-- Content Slider -->

        <div class="col-lg-5 mb-4">

            <div class="content-slider">

                <?php

                $slides = mysqli_query($conn,
                    "SELECT * FROM slides ORDER BY id ASC"
                );

                while($slide = mysqli_fetch_assoc($slides)) {

                ?>

                    <div
                        class="slide-item"
                        data-category="<?php echo $slide['category_id']; ?>"
                    >

                        <h2>
                            <?php echo $slide['title']; ?>
                        </h2>

                        <p>
                            <?php echo $slide['description']; ?>
                        </p>

                    </div>

                <?php } ?>

            </div>

        </div>

        <!-- Image Slider -->

        <div class="col-lg-4 mb-4">

            <div class="image-slider">

                <?php

                $images = mysqli_query($conn,
                    "SELECT * FROM slides ORDER BY id ASC"
                );

                while($image = mysqli_fetch_assoc($images)) {

                ?>

                    <div
                        class="image-item"
                        data-category="<?php echo $image['category_id']; ?>"
                    >

                        <img
                            src="uploads/<?php echo $image['image']; ?>"
                            alt=""
                        >

                    </div>

                <?php } ?>

            </div>

        </div>

    </div>

</div>

<?php include 'includes/footer.php'; ?>