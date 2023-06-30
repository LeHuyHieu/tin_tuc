<?php
require_once('db.php');
$category_id = $_GET['category_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
            Admin
        </h1>
        <div class="d-flex justify-content-end mb-4">
            <a href="admin.php" class="btn btn-primary me-3">
                <i class="fas fa-plus-circle pe-2"></i>Thêm Mới
            </a>
            <a href="#" class="btn btn-primary me-3">
                <i class="fas fa-plus-circle pe-2"></i>Import
            </a>
            <a href="javascript:void(0)" onclick="deleteRows()" class="btn btn-primary me-3">
                <i class="fas fa-plus-circle pe-2"></i>Delete
            </a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-2 click-list">
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
                <div class="col-10 click-list-100">
                    <?php
                    $sql = "SELECT * FROM categories";
                    $result = $conn->query($sql);
                    $categories = array();
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $categories[] = $row;
                    }
                    $sql = "SELECT news.*,categories.name AS category_name FROM news LEFT JOIN categories ON news.category_id = categories.id WHERE category_id=$category_id ORDER BY id DESC";
                    $result = $conn->query($sql);
                    $news = array();
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $news[] = $row;
                    }

                    ?>



                    <div class="bg-white rounded box-shadow">
                        <h3 class="title-form-admin">Quản lý trang</h3>
                        <div class="d-flex">
                            <form action="" class="ps-4" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" name="title" class="form-control" placeholder="Search" value="<?php echo $_GET['title'] ?? ''; ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>

                            <button class="dowload btn btn-primary me-4 d-block ms-auto mb-4">
                                <i class="fas fa-arrow-alt-circle-down"></i>
                                Dowload
                            </button>
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
                                    <th scope="col" class="text-center">Title</th>
                                    <th scope="col" class="text-center">Category</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($news as $table) { ?>
                                    <tr>
                                        <td class="text-center py-3">
                                            <input type="checkbox" class="selected-table" name="selected[]" value="<?php echo $table['id']; ?>">
                                        </td>
                                        <th class="text-center" scope="row"><?php echo $table['id']; ?></th>
                                        <td><?php echo $table['title']; ?></td>
                                        <td>
                                            <?php echo $table['category_name']; ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="delete.php?id=<?php echo $table['id'] ?>" onclick="return confirm('Are you sure?')"><button class="btn btn-trash"><i class="fas fa-trash"></i> Delete</button></a>
                                            <a href="edit_category_user.php.php?id=<?php echo $table['id'] ?>">
                                                <button class="btn btn-edit">
                                                    <i class="fas fa-edit"></i>
                                                    Edit
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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