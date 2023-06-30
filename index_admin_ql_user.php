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
            Quản lý User
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
                    $sql = "SELECT * FROM users";
                    if (isset($_GET['username'])) {
                        $sql .= " WHERE username LIKE '%" . $_GET['username'] . "%'";
                    }
                    $start = 0;
                    $limit = 3;
                    if (isset($_GET['page']) && $_GET['page'] > 1) {
                        $start = ($_GET['page'] - 1) * $limit;
                    }
                    $sql .= " LIMIT $start,$limit";

                    $sql2 = "select count(*) as number from users";
                    $total = getData($sql2);
                    $total = $total[0]['number'];
                    $num_per_page = 3;
                    $total_page = ceil($total / $num_per_page);
                    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
                    $start = ($page - 1) * $num_per_page;

                    $result = $conn->query($sql);
                    $users = array();
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $users[] = $row;
                    }

                    ?>

                    <?php

                    ?>

                    <div class="bg-white rounded box-shadow">
                        <h3 class="title-form-admin">Quản lý trang</h3>
                        <div class="d-flex">
                            <form action="" class="ps-4" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" name="name" class="form-control" placeholder="Search" value="<?php echo $_GET['name'] ?? ''; ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <table class="table table-hover table-bordered" id="list_news">
                            <colgroup>
                                <col width="60">
                                <col width="60">
                                <col>
                                <col width="200">
                                <col width="200">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Delete</th>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col" class="text-center">Name User</th>
                                    <th scope="col" class="text-center">Email</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) { ?>
                                    <tr>
                                        <td class="text-center py-3">
                                            <input type="checkbox" class="selected-table" name="selected[]" value="<?php echo $user['id']; ?>">
                                        </td>
                                        <th class="text-center" scope="row"><?php echo $user['id']; ?></th>
                                        <td><?php echo $user['username']; ?></td>
                                        <td>
                                            <?php echo $user['email']; ?>
                                        </td>
                                        <td class="">
                                            <a href="delete_category.php?id=<?php echo $user['id'] ?>" onclick="return confirm('Ấn OK để xóa!')"><button class="btn btn-trash"><i class="fas fa-trash"></i> Delete</button></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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