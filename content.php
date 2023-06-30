<section class="content">
    <div class="container">
        <div class="row">
            <!-- start content left -->
            <div class="left col-lg-8 col-md-6 col-sm-12 col-12 pe-4">
                <?php require_once('content_left.php'); ?>
            </div>
            <!-- finish content left -->

            <!-- start content right -->
            <div class="right col-lg-4 col-md-6 col-sm-12 col-sm-12 ps-4">
                <!-- Ấn Phẩm mới nhất -->
                <div class="w-100 d-flex">
                    <h4 class="title-content">
                        Ấn Phẩm mới nhất
                    </h4>
                    <hr class="hr-title" style="flex: 1 1 auto;width: auto">
                </div>
                <div class="img-content-right">
                    <img src="https://vietnamshippinggazette.vn/certificates/JA3mVx6nq58Uw0ktqTnVz8BJxuJqWEelXb645Vhj.jpeg" class="w-100" alt="" title="Title">
                </div>
                <!-- end  Ấn Phẩm mới nhất -->
                <?php require_once('content_right.php'); ?>
                <?php
                $sql = "SELECT * FROM news WHERE category_id = 15";
                $result = $conn->query($sql);
                $news = array();
                while ($row = $result->fetch_assoc()) {
                    $news[] = $row;
                }
                ?>
                <!-- Đối tác -->
                <div class="w-100 d-flex mt-4">
                    <h4 class="title-content">
                        Đối tác
                    </h4>
                    <hr class="hr-title" style="flex: 1 1 auto;width: auto">
                </div>
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach ($news as $key => $new) { ?>
                            <div class="carousel-item <?php echo ($key == 0) ? 'active' : ''; ?> <?php echo $key; ?>">
                                <img src="<?php echo $new['image']; ?>" class="d-block w-100" alt="...">
                            </div>
                        <?php } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-- end Đối tác -->
            </div>
            <!-- finish content right -->
        </div>
    </div>

    <?php
    $sql3 = "SELECT * FROM news WHERE news.category_id = 13 LIMIT 3";
    $result3 = $conn->query($sql3);
    $news3 = array();
    // output data of each row
    while ($row3 = $result3->fetch_assoc()) {
        $news3[] = $row3;
    }

    ?>

    <!-- tin vsg -->
    <div class="bg-dark">
        <div class="container">
            <div class="w-100 d-flex pt-5 pb-4">
                <h4 class="title-content text-whire">
                    Bảng Tin VSG
                </h4>
                <hr class="hr-title" style="flex: 1 1 auto;width: auto">
            </div>
            <div class="row">
                <?php foreach ($news3 as $new3) { ?>
                    <div class="col-lg-4 col-sm-6 col-12 pb-5" data-url="<?php echo $new3['content']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $new3['id']; ?>">
                        <div class="img-content cs-pointer" title="Title">
                            <!-- <img src="https://vietnamshippinggazette.vn/certificates/645deddaa9a58.jpeg" alt="" class="w-100"> -->
                            <div class="bg-img-content" style="background: url(<?php echo $new3['image']; ?>)">
                            </div>
                        </div>
                        <div class="title-item-content cs-pointer text-white">
                            <?php echo $new3['title']; ?>
                        </div>
                        <div class="time-item-content text-secondary">
                            <span class="title-day cs-pointer text-white">
                                Ngày đăng
                            </span>
                            -
                            <span class="day">
                                <?php echo date("d-m-Y", strtotime($new3['created_at'])); ?>
                            </span>
                        </div>

                        <!-- Modal -->
                        <div class="modal myModal fade" id="exampleModal<?php echo $new3['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe width="100%" height="300" src="<?php echo $new3['content']; ?>"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- end vsg -->

    <div class="container">

        <?php
        $sql = "SELECT * FROM news WHERE category_id = 3";
        $result = $conn->query($sql);
        $news = array();
        while ($row = $result->fetch_assoc()) {
            $news[] = $row;
        }
        ?>

        <!-- Logistics -->
        <div class="w-100 d-flex pt-5 mt-4">
            <h4 class="title-content text-whire">
                Logistics
            </h4>
            <hr class="hr-title" style="flex: 1 1 auto;width: auto">
        </div>
        <div class="row">
            <?php foreach ($news as $new) { ?>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-4">
                    <a class="undline-none text-dark" href="detail.php?category_id=<?php echo $new['id']; ?>&categories_id=<?php echo $new['category_id'] ?>">
                        <div class="img-content cs-pointer" title="Title">
                            <!-- <img src="https://vietnamshippinggazette.vn/certificates/645deddaa9a58.jpeg" alt="" class="w-100"> -->
                            <div class="bg-img-content" style="background: url(<?php echo $new['image']; ?>);background-size: cover;background-position: center;">
                            </div>
                        </div>
                        <div class="title-item-content cs-pointer">
                            <?php echo $new['title']; ?>
                        </div>
                        <div class="time-item-content">
                            <span class="title-day cs-pointer">
                                Ngày đăng
                            </span>
                            -
                            <span class="day">
                                <?php echo date("Y-m-d"); ?>
                            </span>
                        </div>
                        <div class="text-content line-text">
                            <?php echo $new['description']; ?>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
        <!-- end Logistics -->

        <?php
        $sql = "SELECT * FROM news WHERE category_id = 4";
        $result = $conn->query($sql);
        $news = array();
        while ($row = $result->fetch_assoc()) {
            $news[] = $row;
        }
        ?>

        <!-- Chuỗi Cung Ứng -->
        <div class="w-100 d-flex pt-5 mt-4">
            <h4 class="title-content text-whire">
                Chuỗi Cung Ứng
            </h4>
            <hr class="hr-title" style="flex: 1 1 auto;width: auto">
        </div>
        <div class="row mb-4">
            <?php foreach ($news as $new) { ?>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12 mt-4">
                    <a class="undline-none text-dark" href="detail.php?category_id=<?php echo $new['id']; ?>&categories_id=<?php echo $new['category_id'] ?>">
                        <div class="img-content cs-pointer" title="Title">
                            <!-- <img src="https://vietnamshippinggazette.vn/certificates/645deddaa9a58.jpeg" alt="" class="w-100"> -->
                            <div class="bg-img-content" style="background: url(<?php echo $new['image']; ?>);background-size: cover;background-position: center;">
                            </div>
                        </div>
                        <div class="title-item-content cs-pointer">
                            <?php echo $new['title']; ?>
                        </div>
                        <div class="time-item-content">
                            <span class="title-day cs-pointer">
                                Ngày đăng
                            </span>
                            -
                            <span class="day">
                                <?php echo date("d-m-Y", strtotime($new['created_at'])); ?>
                            </span>
                        </div>
                        <div class="text-content line-text">
                            <?php echo $new['description']; ?>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
        <!-- end Chuỗi Cung Ứng -->
    </div>
</section>