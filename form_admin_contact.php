<?php
require_once('db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <!-- font font-awesome -->
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- style -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>" />
</head>

<body class="bg-form">
    <header>
        <h1 class="title-admin text-center">
            Contact
        </h1>

        <div class="d-flex justify-content-end mb-4">
            <a href="javascript:void(0)" onclick="deleteRows()" class="btn btn-primary me-3">
                <i class="fas fa-plus-circle pe-2"></i>Delete
            </a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <?php require_once('menu_admin.php') ?>
                </div>
                <div class="col-10 click-list-100">
                    <?php
                    $sql = "SELECT * FROM contact";
                    if (isset($_GET['username'])) {
                        $sql .= " WHERE full_name LIKE '%" . $_GET['full_name'] . "%'";
                    }
                    $start = 0;
                    $limit = 3;
                    if (isset($_GET['page']) && $_GET['page'] > 1) {
                        $start = ($_GET['page'] - 1) * $limit;
                    }
                    $sql .= " LIMIT $start,$limit";

                    $sql2 = "select count(*) as number from contact";
                    $total = getData($sql2);
                    $total = $total[0]['number'];
                    $num_per_page = 3;
                    $total_page = ceil($total / $num_per_page);
                    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
                    $start = ($page - 1) * $num_per_page;

                    $result = $conn->query($sql);
                    $contact = array();
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $contact[] = $row;
                    }

                    ?>

                    <?php

                    ?>

                    <div class="bg-white rounded box-shadow">
                        <h3 class="title-form-admin">Quản lý trang</h3>
                        <div class="d-flex">
                            <form action="" class="ps-4 pb-2" method="GET">
                                <div class="input-group">
                                    <input type="text" name="name" class="form-control" placeholder="Search" value="<?php echo $_GET['name'] ?? ''; ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="scrollme">
                            <table class="table table-hover table-bordered table-responsive" style="width: 1600px;" id="list_news">
                                <!-- <colgroup>
                                    <col width="60">
                                    <col width="60">
                                    <col width="150">
                                    <col width="200">
                                    <col width="400">
                                    <col width="200">
                                    <col width="200">
                                </colgroup> -->
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Delete</th>
                                        <th scope="col" class="text-center">Action</th>
                                        <th scope="col" class="text-center">#</th>
                                        <th scope="col" class="text-center">Name User</th>
                                        <th scope="col" class="text-center">Title User</th>
                                        <th scope="col" class="text-center">Phone</th>
                                        <th scope="col" class="text-center">Content User</th>
                                        <th scope="col" class="text-center">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($contact as $lien_he) { ?>
                                        <tr class="overfollow-sroll-x">
                                            <td class="text-center py-3 w-60px">
                                                <input type="checkbox" class="selected-table" name="selected[]" value="<?php echo $lien_he['id']; ?>">
                                            </td>
                                            <td class="w-100px">
                                                <a class="p-2 rounded d-block text-decoration-none my-2 bg-danger text-white" href="delete_category.php?id=<?php echo $lien_he['id'] ?>" onclick="return confirm('Ấn OK để xóa!')"><button class="justify-content-center w-100 btn-trash d-flex align-items-center text-white"><i class="fas fa-trash pe-2"></i> Delete</button></a>
                                                <a class="p-2 rounded d-block text-decoration-none my-2 bg-primary text-white" href="form_detail_contact_admin.php?id=<?php echo $lien_he['id'] ?>"><button class="justify-content-center w-100 btn-trash d-flex align-items-center text-white"><i class="fas fa-envelope-open pe-2"></i> Detail</button></a>
                                            </td>
                                            <th class="text-center w-60px" scope="row"><?php echo $lien_he['id']; ?></th>
                                            <td class="w-150px"><?php echo $lien_he['full_name']; ?></td>
                                            <td class="w-150px"><?php echo $lien_he['title_contact']; ?></td>
                                            <td class="w-100px"><?php echo $lien_he['phone_number']; ?></td>
                                            <td class="w-450px"><?php echo $lien_he['content_contact']; ?></td>
                                            <td class="w-200px"><?php echo $lien_he['address_email']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end">
                            <?php if ($page > 1) { ?>
                                <a href="?page=<?php echo $page - 1; ?>" class="btn btn-primary my-3 mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                            <?php } ?>
                            <?php
                            if ($total_page <= 5) { ?>
                                <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                                    <a class="btn btn-primary my-3 mx-2 
                                <?php if ($page == $i) {
                                        echo 'btn-danger';
                                    }
                                ?>" href="?page=<?php echo $i; ?>"><?php echo $i; ?>
                                    </a>
                                    <?php }
                            } else {
                                if ($page <= 3) {
                                    for ($i = 1; $i <= 5; $i++) { ?>
                                        <a class="btn btn-primary my-3 mx-2 
                                <?php if ($page == $i) {
                                            echo 'btn-danger';
                                        }
                                ?>" href="?page=<?php echo $i; ?>"><?php echo $i; ?>
                                        </a>
                                    <?php } ?>
                                    <?php
                                } else if ($total_page - $page <= 3) {
                                    for ($i = $total_page - 4; $i <= $total_page; $i++) { ?>
                                        <a class="btn btn-primary my-3 mx-2 
                                        <?php if ($page == $i) {
                                            echo 'btn-danger';
                                        }
                                        ?>" href="?page=<?php echo $i; ?>"><?php echo $i; ?>
                                        </a>
                                    <?php } ?>
                                    <?php
                                } else {
                                    for ($i = $page - 2; $i <= $page + 2; $i++) {
                                        if ($i > $total_page) break;
                                    ?>
                                        <a class="btn btn-primary my-3 mx-2 
                                        <?php if ($page == $i) {
                                            echo 'btn-danger';
                                        }
                                        ?>" href="?page=<?php echo $i; ?>"><?php echo $i; ?>
                                        </a>
                            <?php
                                    }
                                }
                            } ?>
                            <?php if ($page < $total_page) { ?>
                                <a href="?page=<?php echo $page + 1; ?>" class="btn btn-primary my-3 mx-2"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.js?v=<?php echo time(); ?>"></script>
</body>

</html>