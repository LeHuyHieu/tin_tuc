<?php
require_once('db.php');
$idd_categories = $_GET['category_id'];
$sql = "SELECT id FROM categories WHERE parent_id = $idd_categories";
$result = $conn->query($sql);
$list_category_id = array(
    0 => $idd_categories
);

// output data of each row
while ($row = $result->fetch_assoc()) {
    // print_r($row);
    $list_category_id[] = $row['id'];
}
$list_category_id = implode(",", $list_category_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>category</title>
    <!-- font font-awesome -->
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>" />
</head>

<body>
    <?php
    require_once('header.php');
    ?>

    <?php

    $sql = "SELECT * FROM categories where id = $idd_categories";
    $result = $conn->query($sql);
    $categories = array();

    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
    ?>

    <?php
    $sql2 = "SELECT categories.name,news.image AS image_product,news.id,news.category_id, news.title AS title_product,news.created_at FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE categories.id in ($list_category_id) order by id desc limit 12";
    // $result2 = $conn->query($sql2);
    $news = array();
    // output data of each row
    $result3 = $conn->query($sql2);
    while ($row2 = $result3->fetch_assoc()) {
        $news[] = $row2;
    }
    ?>

    <section class="content-category">
        <div class="container">
            <div class="row mb-5">
                <div class="left col-lg-8 col-md-6 col-sm-12 col-12 pe-4">
                    <div class="row">
                        <h3 class="detail_product">
                            <?php foreach ($categories as $category) { ?>
                                <?php echo $category['name']; ?>
                            <?php } ?>
                        </h3>
                        <?php foreach ($news as $new) { ?>
                            <div class="col-md-4 col-sm-12 col-12 mb-5">
                                <a class="undline-none text-dark" href="detail.php?category_id=<?php echo $new['id']; ?>&parent__id=<?php echo $idd_categories; ?>&categories_id=<?php echo $new['category_id']; ?>">
                                    <div class="img-content cs-pointer" title="Title">
                                        <!-- <img src="https://vietnamshippinggazette.vn/certificates/645deddaa9a58.jpeg" alt="" class="w-100"> -->
                                        <div class="bg-img-content" style="background: url(<?php echo $new['image_product']; ?>);"></div>
                                    </div>
                                    <div class="title-item-content cs-pointer">
                                        <?php echo $new['title_product']; ?>
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
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="right col-lg-4 col-md-6 col-sm-12 col-sm-12 ps-4">
                    <?php require_once('content_right.php'); ?>
                </div>
            </div>
        </div>
    </section>

    <?php
    require_once('footer.php');
    ?>
    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.js?v=<?php echo time(); ?>"></script>
</body>

</html>