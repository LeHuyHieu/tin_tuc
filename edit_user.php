<?php
require_once('db.php');
$id = $_GET['id'];
$sql = "SELECT * FROM news WHERE id = $id";
$result = $conn->query($sql);
$new = array();
while ($row = $result->fetch_assoc()) {
    $new = $row;
}
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
    <link rel="stylesheet" href="css/style.css" />
    <title>Title</title>
</head>

<body class="bg-form pb-5 pt-3">
    <?php
    $sql = "SELECT * FROM categories";
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
            <h1 class="title-form text-uppercase fw-bold text-center mb-5">VN Shipping gazette</h1>
            <div class="col-2">
                <ul class="list-form d-flex">
                    <button class="btn close-list">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h4 class="ps-2 py-3 text-center text-white title-list"><i class="fa-solid fa-layer-group"></i></h4>
                    <li class="list-item">
                        <a href="user.php" class="list-link">
                            <i class="fa-solid fa-house"></i> Trang chủ
                        </a>
                    </li>
                    <li class="list-item">
                        <a href="index_category_user.php" class="list-link">
                            <i class="fa-solid fa-list"></i> Category
                        </a>
                    </li>
                    <li class="list-item">
                        <a href="logout.php" class="list-link">
                            <i class="fa-solid fa-right-from-bracket"></i> Log out
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-10">
                <div class="form-content-admin">
                    <form action="process_user.php" class="form" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $new['id']; ?>" />
                        <div class="d-flex">
                            <select name="category_id" id="category_id">
                                <option value="0">Vui lòng chọn</option>
                                <?php
                                foreach ($categories as $row) {
                                    $selected = '';
                                    if ($row['id'] == $new['category_id']) {
                                        $selected = 'selected';
                                    }
                                    if ($row['parent_id'] != 0) {
                                        echo '<option value="' . $row['id'] . '" ' . $selected . '> ---' . $row['name'] . '</option>';
                                    } else {
                                        echo "<option value='$row[id]' " . $selected . ">$row[name]</option>\n";
                                    }
                                }
                                ?>

                            </select>
                            <div class="d-flex ms-4">
                                <div class="tin">
                                    <?php
                                    $is_hot = '';
                                    if ($new['is_hot'] == 1) {
                                        $is_hot = 'checked';
                                    }
                                    $is_paid = '';
                                    if ($new['is_paid'] == 1) {
                                        $is_paid = 'checked';
                                    }
                                    ?>
                                    <input type="checkbox" <?php echo $is_hot; ?> value="1" name="is_hot" id="is-hot">
                                    <label class="me-3" for="is-hot">Tin hot</label>
                                    <input type="checkbox" <?php echo $is_paid; ?> value="1" name="is_paid" id="is-paid">
                                    <label for="is-paid">Tin Paid</label>
                                </div>
                            </div>
                        </div>
                        <div class="title">
                            <label class="form-control-lable" for="title">
                                Title
                            </label>
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="<?php echo $new['title']; ?>">
                        </div>
                        <div class="content">
                            <label class="form-control-lable" for="desc">
                                Desc
                            </label>
                            <textarea class="form-control" cols="5" placeholder="" rows="5" id="desc" name="desc"><?php echo $new['description']; ?></textarea>
                        </div>
                        <div class="content">
                            <label class="form-control-lable" for="content">
                                Content
                            </label>
                            <textarea class="form-control" cols="5" placeholder="" rows="5" id="content" name="content"><?php echo $new['content']; ?></textarea>
                        </div>
                        <div class="img-data">
                            <label class="form-control-lable mt-0" for="img-data">Images</label>
                            <input type="file" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <div class="img-data_content">
                                <img src="<?php echo $new['image']; ?>" id="blah" alt="" class="profile_pic">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-add mt-4">
                            <i class="fa-solid fa-floppy-disk pe-2"></i>Cập nhật
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
    <script src="js/app.js"></script>
</body>

</html>