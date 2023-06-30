<?php
require_once('db.php');
$id = $_GET['id'];
$sql = "SELECT * FROM contact WHERE id = $id";
$result = $conn->query($sql);
$contact = array();
while ($row = $result->fetch_assoc()) {
    $contact = $row;
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
            <h1 class="title-form text-uppercase fw-bold text-center">Contact</h1>
            <div class="col-2">
                <?php require_once('menu_admin.php') ?>
            </div>
            <div class="col-10">
                <div class="form-content-admin">
                    <div class="form">
                        <div class="title">
                            <label class="form-control-lable">
                                Full name
                            </label>
                            <input type="text" class="form-control" placeholder="full name" name="full_name" value="<?php echo $contact['full_name']; ?>">
                        </div>
                        <div class="content">
                            <label class="form-control-lable">
                                Address_email
                            </label>
                            <input class="form-control" name="address_email" value="<?php echo $contact['address_email']; ?>">
                        </div>
                        <div class="content">
                            <label class="form-control-lable">
                                Phone_number
                            </label>
                            <input class="form-control" name="phone_number" value="<?php echo $contact['phone_number']; ?>">
                        </div>
                        <div class="content">
                            <label class="form-control-lable">
                                Title_contact
                            </label>
                            <input class="form-control" name="title_contact" value="<?php echo $contact['title_contact']; ?>">
                        </div>
                        <div class="content">
                            <label class="form-control-lable" for="content">
                                Content
                            </label>
                            <textarea class="form-control" cols="5" placeholder="" rows="5" id="content" name="content"><?php echo $contact['content_contact']; ?></textarea>
                        </div>
                        <button class="btn btn-primary d-block m-auto mt-4">
                            Đã xem
                        </button>
                    </div>
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