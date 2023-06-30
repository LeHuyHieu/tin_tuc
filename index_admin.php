<?php
require_once('db.php');
?>
<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
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
            <a href="javascript:void(0)" onclick="deleteRows()" class="btn btn-primary me-3">
                <i class="fas fa-trash"></i> Delete
            </a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-2 click-list-0">
                    <?php require_once('menu_admin.php') ?>
                </div>
                <div class="col-10 click-list-100">
                    <?php
                    $sql_conditions = "WHERE 1 ";
                    $param = '';
                    
                    if (isset($_GET['title']) && strlen($_GET['title'])) {
                        $sql_conditions .= " AND title LIKE '%" . $_GET['title'] . "%' ";
                        $param .= '&title='.$_GET['title'];
                    }
                    if (isset($_GET['category_id']) && $_GET['category_id']) {
                        $sql_conditions .= " AND category_id = " . $_GET['category_id'] . " ";
                        $param .= '&category_id='.$_GET['category_id'];
                    }

                    $sql = "select count(*) as number from news ";
                    $sql .= $sql_conditions;

                    $total = getData($sql);
                    $total = $total[0]['number'];
                    $num_per_page = 5;
                    $total_page = ceil($total / $num_per_page);
                    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
                    $start = ($page - 1) * $num_per_page;
                    $sql = "SELECT * FROM categories";
                    $categories = getData($sql);
                    $sql = "SELECT news.*,categories.name AS category_name FROM news LEFT JOIN categories ON news.category_id = categories.id ";
                    $sql .= $sql_conditions;
                    $sql .= "ORDER BY id DESC limit $start,$num_per_page";
                    // echo $sql;die;
                    $news = getData($sql);

                    ?>

                    <div class="bg-white rounded box-shadow">
                        <h3 class="title-form-admin mb-0">Quản lý trang</h3>
                        <div class="py-3 px-4">
                            <form action="" class="w-100 d-flex" method="GET">
                                <select class="w-50 me-3 form-select" name="category_id" id="category_id">
                                    <option value="0">Vui lòng chọn</option>
                                    <?php
                                    foreach ($categories as $row) {
                                        $selected = '';
                                        if(isset($_GET['category_id']) && $_GET['category_id'] == $row['id']) {
                                            $selected = 'selected';
                                        }
                                        if ($row['parent_id'] != 0) {
                                            echo '<option '.$selected.' value="' . $row['id'] . '"> ---' . $row['name'] . '</option>';
                                        } else {
                                            echo "<option $selected value='$row[id]'>$row[name]</option>\n";
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="input-group w-50">
                                    <input type="text" name="title" class="form-control" placeholder="Search" value="<?php echo $_GET['title'] ?? ''; ?>">
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
                                <col width="250">
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
                                            <a class="btn btn-danger text-white" href="delete.php?id=<?php echo $table['id'] ?>" onclick="return confirm('Are you sure?')"><button class="btn btn-trash text-white"><i class="fas fa-trash"></i> Delete</button></a>
                                            <a class="btn btn-success text-white" href="edit.php?id=<?php echo $table['id'] ?>"><button class="btn btn-trash text-white"><i class="fas fa-edit"></i>Edit</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <?php if ($page > 1) { ?>
                                <a href="?page=<?php echo $page - 1; ?><?php echo $param;?>" class="btn btn-primary my-3 mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                            <?php } ?>
                            <?php
                            if ($total_page == 1) {

                            }else if ($total_page <= 5) { ?>
                                <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                                    <a class="btn btn-primary my-3 mx-2 
                                <?php if ($page == $i) {
                                        echo 'btn-danger';
                                    }
                                ?>" href="?page=<?php echo $i; ?><?php echo $param;?>"><?php echo $i; ?>
                                    </a>
                                    <?php }
                            } else {
                                if ($page <= 3) {
                                    for ($i = 1; $i <= 5; $i++) { ?>
                                        <a class="btn btn-primary my-3 mx-2 
                                <?php if ($page == $i) {
                                            echo 'btn-danger';
                                        }
                                ?>" href="?page=<?php echo $i; ?><?php echo $param;?>"><?php echo $i; ?>
                                        </a>
                                    <?php } ?>
                                    <?php
                                } else if ($total_page - $page <= 3) {
                                    for ($i = $total_page - 4; $i <= $total_page; $i++) { ?>
                                        <a class="btn btn-primary my-3 mx-2 
                                        <?php if ($page == $i) {
                                            echo 'btn-danger';
                                        }
                                        ?>" href="?page=<?php echo $i; ?><?php echo $param;?>"><?php echo $i; ?>
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
                                        ?>" href="?page=<?php echo $i; ?><?php echo $param;?>"><?php echo $i; ?>
                                        </a>
                            <?php
                                    }
                                }
                            } ?>
                            <?php if ($page < $total_page) { ?>
                                <a href="?page=<?php echo $page + 1; ?><?php echo $param;?>" class="btn btn-primary my-3 mx-2"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
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