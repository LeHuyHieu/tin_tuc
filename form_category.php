<?php
require_once('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add row database</title>
    <!-- font font-awesome -->
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- style -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>" />
    <title>Title</title>
</head>

<body class="bg-form pb-5 pt-3">
    <?php
    $sql = "SELECT * FROM categories where parent_id = 0";
    $result = $conn->query($sql);
    $categories = array();
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
    ?>
    <div class="d-flex align-items-center justify-content-end position-relative mb-4">
        <form class="search-form" action="">
            <div class="search-data">
                <input type="text" id="search" name="search" placeholder="Search" value="">
                <label for="search"><i class="fa-solid fa-magnifying-glass"></i></label>
            </div>
        </form>
        <div class="left-top-form me-5 d-flex align-items-center">
            <div class="icon-form pe-3">
                <button type="button" class="btn btn-icon" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                    <img src="./images/copy.svg" alt="">
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title1</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="icon-form pe-3">
                <button type="button" class="btn btn-icon" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                    <img src="./images/download.svg" alt="">
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title2</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="icon-form pe-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-icon" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                    <img src="./images/plus-circle.svg" alt="">
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title3</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-white border-r">
        <div class="row">
            <h1 class="title-form text-uppercase fw-bold text-center mb-5">VN Shipping gazette category</h1>
            <div class="col-2 click-list-0">
                <?php require_once('menu_admin.php') ?>
            </div>
            <div class="col-10 click-list-100">
                <div class="form-content-admin">
                    <form action="process_category.php" class="form" method="post" enctype="multipart/form-data">

                        <div class="title">
                            <label class="form-control-lable" for="name">
                                Name
                            </label>
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="">
                        </div>
                        <div class="content">
                            <label class="form-control-lable" for="parent_id">
                                Parent
                            </label>
                            <select class="form-control" name="parent_id" id="parent_id">
                                <option value="0">Vui lòng chọn</option>
                                <?php foreach ($categories as $category_item) : ?>
                                    <option value="<?php echo $category_item['id']; ?>"><?php echo $category_item['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-add mt-4">
                            <i class="fa-solid fa-floppy-disk pe-2"></i>Thêm
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js" integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/app.js?v=<?php echo time(); ?>"></script>
</body>

</html>