<?php
$category_id = $_GET['category_id'];
?>
<?php
$sql = "SELECT categories.*,news.content AS content_name, news.title AS title_name FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE news.id=$category_id LIMIT 1";
$result = $conn->query($sql);
$news = array();

// output data of each row
while ($row = $result->fetch_assoc()) {
    $news[] = $row;
}
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-12 left">
            <?php foreach ($news as $new) { ?>
                <h3 class="detail_product">
                    Tin chi tiết
                </h3>
                <h4 class="title-product_detail fw-bold">
                    <?php echo $new['title_name']; ?>
                </h4>
                <div class="time-item-content mb-3">
                    <span class="title-day cs-pointer">
                        Ngày đăng
                    </span>
                    -
                    <span class="day">
                        <?php echo date("Y-m-d"); ?>
                    </span>
                </div>
                <div class="content_product_detail">
                    <?php $length = strlen($new['content_name']);
                    if ($length < 200) { ?>
                        <iframe width="100%" height="500" src="<?php echo html_entity_decode($new['content_name']); ?>"></iframe>;
                    <?php } else {
                        echo html_entity_decode($new['content_name']);
                    } ?>
                </div>
            <?php } ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-12 right">
            <!-- Tin Đáng Chú Ý -->
            <div class="w-100 d-flex mt-4">
                <h4 class="title-content">
                    Tin Đáng Chú Ý
                </h4>
                <hr class="hr-title" style="flex: 1 1 auto;width: auto">
            </div>

            <?php
            $sql = "SELECT * FROM news WHERE is_hot = 1 ORDER BY id DESC LIMIT 2";
            $result = $conn->query($sql);
            $news = array();
            while ($row = $result->fetch_assoc()) {
                $news[] = $row;
            }
            ?>

            <div class="row">
                <?php foreach ($news as $new) {
                ?>
                    <div class="col-12 d-flex">
                        <a class="undline-none text-dark d-flex" href="detail.php?category_id=<?php echo $new['id']; ?>">
                            <div class="img-content cs-pointer" title="Title">
                                <!-- <img src="https://vietnamshippinggazette.vn/certificates/64589af69933c.jpeg" alt="" class="w-100"> -->
                                <div class="bg-img-content img-text-content" style="background-image: url(<?php echo $new['image']; ?>)"></div>
                            </div>
                            <div class="text-content-left">
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
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <!-- end Tin Đáng Chú Ý -->

            <!-- Tin Được Tài Trợ -->
            <div class="w-100 d-flex mt-4">
                <h4 class="title-content">
                    Tin Được Tài Trợ
                </h4>
                <hr class="hr-title" style="flex: 1 1 auto;width: auto">
            </div>

            <?php
            $sql1 = "SELECT * FROM news WHERE is_paid = 1 ORDER BY id DESC LIMIT 3";
            $result1 = $conn->query($sql1);
            $news1 = array();
            while ($row1 = $result1->fetch_assoc()) {
                $news1[] = $row1;
            }
            ?>

            <div class="row">
                <?php foreach ($news1 as $new1) {
                ?>
                    <div class="col-12 d-flex">
                        <a class="undline-none text-dark d-flex" href="detail.php?category_id=<?php echo $new1['id']; ?>">
                            <div class="text-content-left">
                                <div class="title-item-content cs-pointer">
                                    <?php echo $new1['title']; ?>
                                </div>
                                <div class="time-item-content">
                                    <span class="title-day cs-pointer">
                                        Ngày đăng
                                    </span>
                                    -
                                    <span class="day">
                                        <?php echo date("d-m-Y", strtotime($new1['created_at'])); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="img-content cs-pointer" title="Title">
                                <!-- <img src="https://vietnamshippinggazette.vn/certificates/64589af69933c.jpeg" alt="" class="w-100"> -->
                                <div class="bg-img-content img-text-content" style="background-image: url(<?php echo $new1['image']; ?>);"></div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <!-- end Tin Được Tài Trợ -->
        </div>
    </div>

    <div class="row my-5">
        <!-- Tin liên quan -->
        <div class="w-100 d-flex">
            <h4 class="title-content">
                Tin Liên quan
            </h4>
            <hr class="hr-title" style="flex: 1 1 auto;width: auto">
        </div>
        <div class="row">
            <?php if (isset($_GET['parent__id'])) { ?>
                <?php
                $parent__id =  $_GET['parent__id'];
                $sql2 = "SELECT categories.id,news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE news.category_id =  $parent__id AND news.id <> $category_id limit 8";
                $news2 = getData($sql2);
                // print_r($news2);die;
                ?>
                <?php foreach ($news2 as $new2) { ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-4">
                        <a href="detail.php?category_id=<?php echo $new2['id']; ?>&parent__id=<?php echo $parent__id; ?>" class="undline-none text-dark">
                            <div class="img-content cs-pointer" title="Title">
                                <!-- <img src="https://vietnamshippinggazette.vn/certificates/645deddaa9a58.jpeg" alt="" class="w-100"> -->
                                <div class="bg-img-content" style="background: url(<?php echo $new2['image']; ?>);">
                                </div>
                            </div>
                            <div class="title-item-content cs-pointer">
                                <?php echo $new2['title']; ?>
                            </div>
                            <div class="time-item-content">
                                <span class="title-day cs-pointer">
                                    Ngày đăng
                                </span>
                                -
                                <span class="day">
                                    <?php echo date("d-m-Y", strtotime($new2['created_at'])); ?>
                                </span>
                            </div>
                            <div class="text-content line-text">
                                <?php echo $new2['description']; ?>
                            </div>
                        </a>
                    </div>
                <?php }
            } else { ?>
                <?php
                $categories_id = $_GET['categories_id'];
                $sql3 = "SELECT categories.id,news.* FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE news.category_id =  $categories_id AND news.id <> $category_id limit 8";
                $news3 = getData($sql3);
                // print_r($news3);die;
                ?>
                <?php foreach ($news3 as $new3) { ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 mt-4">
                        <a href="detail.php?category_id=<?php echo $new3['id']; ?>&categories_id=<?php echo $new3['category_id'] ?>" class="undline-none text-dark">
                            <div class="img-content cs-pointer" title="Title">
                                <!-- <img src="https://vietnamshippinggazette.vn/certificates/645deddaa9a58.jpeg" alt="" class="w-100"> -->
                                <div class="bg-img-content" style="background: url(<?php echo $new3['image']; ?>);">
                                </div>
                            </div>
                            <div class="title-item-content cs-pointer">
                                <?php echo $new3['title']; ?>
                            </div>
                            <div class="time-item-content">
                                <span class="title-day cs-pointer">
                                    Ngày đăng
                                </span>
                                -
                                <span class="day">
                                    <?php echo date("d-m-Y", strtotime($new3['created_at'])); ?>
                                </span>
                            </div>
                            <div class="text-content line-text">
                                <?php echo $new3['description']; ?>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <!-- end tin liên quan -->
    </div>
</div>