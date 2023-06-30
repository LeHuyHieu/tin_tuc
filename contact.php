<?php require_once('db.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ</title>
    <!-- font font-awesome -->
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>" />
</head>

<body>
    <?php require_once('header.php'); ?>

    <section class="contact">
        <div class="container">
            <div class="col-md-8 col-sm-12 col-12">
                <h3 class="detail_product line-h-30">
                    TẠP CHÍ VIETNAM SHIPPING GAZETTE XIN HÂN HẠNH ĐƯỢC HỖ TRỢ QUÝ KHÁCH HÀNG
                </h3>
                <form action="contact_submit.php" method="post" id="form_contact" class="form-contact bg-light p-4 mb-5">
                    <div class="full-name mb-3">
                        <input type="text" class="form-control w-50" name="full_name" placeholder="Họ và tên*" />
                    </div>
                    <div class="address-email mb-3">
                        <input type="email" class="form-control w-50" name="address_email" placeholder="Địa chỉ Email*" />
                    </div>
                    <div class="phone-number mb-3">
                        <input type="text" class="form-control w-50" name="phone_number" placeholder="Số điện thoại*" />
                    </div>
                    <div class="title-contact mb-3">
                        <input type="text" class="form-control w-50" name="title_contact" placeholder="Tiêu đề*" />
                    </div>
                    <div class="content-contact mb-3">
                        <textarea rows="10" class="form-control w-75" placeholder="Nội dung*" name="content_contact"></textarea>
                    </div>
                    <button class="btn btn-primary" name="send_the_contact" type="submit">Gửi liên hệ <i class="fas fa-comment-dots"></i></button>
                </form>
            </div>
            <div class="col-md-4 col-sm-12 col-12"></div>
        </div>
    </section>

    <?php require_once('footer.php'); ?>
    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.js?v=<?php echo time(); ?>"></script>
</body>

</html>