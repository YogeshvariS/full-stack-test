<?php

include 'config/db.php';
include 'includes/header.php';

$categories = mysqli_query(
    $conn,
    "SELECT * FROM categories ORDER BY id ASC"
);

?>

<div class="container py-5">

    <div class="row main-row">

        <!-- Desktop Tabs -->

        <div class="col-lg-3 mb-4 d-none d-lg-block">

            <div class="tabs-wrapper">

                <?php

                mysqli_data_seek($categories, 0);

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

        <!-- Mobile Accordion -->

        <div class="col-12 d-block d-lg-none mb-4">

            <div class="accordion" id="mobileAccordion">

                <?php

                mysqli_data_seek($categories, 0);

                $accordionCount = 0;

                while($category = mysqli_fetch_assoc($categories)) {

                ?>

                    <div class="accordion-item mb-3 border-0">

                        <h2 class="accordion-header">

                            <button
                                class="accordion-button <?php echo $accordionCount != 0 ? 'collapsed' : ''; ?>"

                                type="button"

                                data-bs-toggle="collapse"

                                data-bs-target="#collapse<?php echo $category['id']; ?>"
                            >

                                <?php echo $category['title']; ?>

                            </button>

                        </h2>

                        <div
                            id="collapse<?php echo $category['id']; ?>"

                            class="accordion-collapse collapse <?php echo $accordionCount == 0 ? 'show' : ''; ?>"

                            data-bs-parent="#mobileAccordion"
                        >

                            <div class="accordion-body p-0">

                                <div
                                    class="mobile-slider"

                                    data-category="<?php echo $category['id']; ?>"
                                >
                                </div>

                            </div>

                        </div>

                    </div>

                <?php

                    $accordionCount++;

                } ?>

            </div>

        </div>

        <!-- Content Slider -->

        <div class="col-lg-5 mb-4">

            <div class="content-slider-wrapper">

                <button class="custom-arrow prev-arrow">
                    ←
                </button>

                <div class="content-slider"></div>

                <button class="custom-arrow next-arrow">
                    →
                </button>

            </div>

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