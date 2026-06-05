<?php

include 'config/db.php';
include 'includes/header.php';

$categories = mysqli_query(
    $conn,
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

                } ?>

            </div>

        </div>

        <!-- Content Slider -->

        <div class="col-lg-5 mb-4">

            <div class="content-slider"></div>

        </div>

        <!-- Image Slider -->

        <div class="col-lg-4 mb-4">

            <div class="image-slider"></div>

        </div>

    </div>

</div>

<!-- Hidden Slides Data -->

<div id="slides-data" style="display:none;">

<?php

$allSlides = mysqli_query(
    $conn,
    "SELECT * FROM slides ORDER BY id ASC"
);

while($slide = mysqli_fetch_assoc($allSlides)) {

?>

    <div
        class="slide-data"

        data-category="<?php echo $slide['category_id']; ?>"

        data-title="<?php echo htmlspecialchars($slide['title']); ?>"

        data-description="<?php echo htmlspecialchars($slide['description']); ?>"

        data-image="uploads/<?php echo $slide['image']; ?>"
    >
    </div>

<?php } ?>

</div>

<?php include 'includes/footer.php'; ?>