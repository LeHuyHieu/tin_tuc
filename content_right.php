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
    <?php foreach ($news as $new) { ?>
        <div class="col-12">
            <a class="undline-none text-dark d-flex" href="detail.php?category_id=<?php echo $new['id']; ?>&categories_id=<?php echo $new['category_id'] ?>">
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
    <?php foreach ($news1 as $new1) { ?>
        <div class="col-12 d-flex">
            <a class="undline-none text-dark d-flex" href="detail.php?category_id=<?php echo $new1['id']; ?>&categories_id=<?php echo $new1['category_id'] ?>">
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