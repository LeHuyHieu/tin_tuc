<?php
$sql = "SELECT * FROM news WHERE news.category_id = 2 ORDER BY category_id DESC LIMIT 2";
$result = $conn->query($sql);
$news = array();
// output data of each row
while ($row = $result->fetch_assoc()) {
    $news[] = $row;
}

$sql1 = "SELECT * FROM news WHERE news.category_id = 2 ORDER BY category_id DESC LIMIT 2,6";
$result1 = $conn->query($sql1);
$news1 = array();
// output data of each row
while ($row1 = $result1->fetch_assoc()) {
    $news1[] = $row1;
}

?>

<!-- Tin Mới Nhất -->
<div class="w-100 d-flex">
    <h4 class="title-content">
        Tin Mới Nhất
    </h4>
    <hr class="hr-title" style="flex: 1 1 auto;width: auto">
</div>
<div class="row margin-b-1-5">
    <?php foreach ($news as $new) { ?>
        <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt-4">
            <a class="undline-none text-dark" href="detail.php?category_id=<?php echo $new['id']; ?>&categories_id=<?php echo $new['category_id'] ?>">
                <div class="img-content cs-pointer" title="Title">
                    <!-- <img src="https://vietnamshippinggazette.vn/certificates/645deddaa9a58.jpeg" alt="" class="w-100"> -->
                    <div class="bg-img-content" style="background: url(<?php echo $new['image']; ?>);"></div>
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
                <div class="text-content">
                    <?php echo $new['description']; ?>
                </div>
            </a>
        </div>
    <?php } ?>
</div>
<div class="row mt-4">
    <?php foreach ($news1 as $new1) { ?>
        <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt-4">
            <a class="undline-none text-dark d-flex" href="detail.php?category_id=<?php echo $new1['id']; ?>&categories_id=<?php echo $new1['category_id'] ?>">
                <div class="img-content cs-pointer" title="Title">
                    <!-- <img src="https://vietnamshippinggazette.vn/certificates/64589af69933c.jpeg" alt="" class="w-100"> -->
                    <div class="bg-img-content img-text-content" style="background: url(<?php echo $new1['image']; ?>);background-size: cover;background-position: center;"></div>
                </div>
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
                    <div class="text-content line-text">
                        <?php echo $new1['description']; ?>
                    </div>
                </div>
            </a>
        </div>
    <?php } ?>
</div>
<!-- end Tin Mới Nhất -->

<?php
$sql2 = "SELECT * FROM news WHERE news.category_id = 12 LIMIT 3";
$news2 = getData($sql2);
?>

<!-- Sự Kiện -->
<div class="w-100 d-flex mt-5">
    <h4 class="title-content">
        Sự Kiện
    </h4>
    <hr class="hr-title" style="flex: 1 1 auto;width: auto">
</div>
<div class="row mt-4">
    <?php foreach ($news2 as $new2) { ?>
        <div class="col-12 d-lg-flex mb-5">
            <a class="undline-none text-dark d-flex" href="detail.php?category_id=<?php echo $new2['id']; ?>&categories_id=<?php echo $new2['category_id'] ?>">
                <div class="img-content cs-pointer pe-4" title="Title">
                    <!-- <img src="https://vietnamshippinggazette.vn/certificates/64589af69933c.jpeg" alt="" class="w-100"> -->
                    <div class="bg-img-content img-text-content-sk" style="background: url(<?php echo $new2['image']; ?>);"></div>
                </div>
                <div class="text-content-left">
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
                        <?php echo $new1['description']; ?>
                    </div>
                </div>
            </a>
        </div>
    <?php } ?>
</div>
<!-- end  Sự Kiện -->