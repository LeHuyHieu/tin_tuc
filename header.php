<?php
require_once('db.php');
?>
<header class="" id="header">
  <!-- navbar -->
  <div class="menu">
    <div class="icon-navbar">
      <div class="icon-navbar-click" onclick="icon_navbar_Function(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
      </div>
    </div>
    <ul class="list m-0">
      <?php
      session_start();

      if (isset($_SESSION['email']) == true) {
        echo '
          <li class="nav-item">
            <a href="./logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
          </li>';
      } else {
        echo '
        <li class="nav-item">
          <a href="./register.php" class="nav-link"><i class="fas fa-pen-square"></i>Đăng kí</a>
        </li>
        <li class="nav-item">
          <a href="./login.php" class="nav-link"><i class="fas fa-sign-in-alt"></i>Đăng nhập</a>
        </li>';
      }
      ?>
      
      <li class="nav-item">
        <a class="nav-link">English</a>
      </li>
      <li class="nav-item ms-auto">
        <a class="nav-link">
          <i class="fas fa-shopping-basket"></i>
          Giỏ Hàng
        </a>
      </li>
    </ul>
  </div>
  <div class="navbar pb-0">
    <nav class="container ctn-mw-100">
      <div class="d-flex">
        <a class="logo pe-4 ps-3 cs-pointer">
          <img src="https://vietnamshippinggazette.vn/src/asset/img/system/logo_vietnamshippinggazette.png" alt="" class="w-100">
        </a>
        <div class="banner-header-img w-50">
          <img src="https://vietnamshippinggazette.vn/public/images/header_banner.jpg?v=1684676816" alt="" class="w-100">
        </div>
      </div>
      <ul class="list m-0 global-nav navbar-show">
        <li class="navbar-item">
          <a href="index.php" class="navbar-link <?php echo (empty($_GET)) ? 'navbar-link-active' : ''; ?>">
            Trang Chủ
          </a>
        </li>
        <?php
        $sql = "SELECT * FROM categories WHERE parent_id = 0";
        $result = $conn->query($sql);
        $categories = array();
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          $categories[] = $row;
          // print_r($row);die;
        }
        ?>

        <?php
        $sql2 = "SELECT * FROM categories WHERE parent_id <> 0";
        $result2 = $conn->query($sql2);
        $sub_categories = array();
        // output data of each row
        while ($row2 = $result2->fetch_assoc()) {
          $sub_categories[] = $row2;
        }
        $sub_categories_key = array_column($sub_categories, 'parent_id', 'parent_id');
        $sub_categories_key2 = array_column($sub_categories, 'parent_id', 'id');
        ?>

        <?php foreach ($categories as $category) { ?>
          <li class="navbar-item">
            <a href="category.php?category_id=<?php echo $category['id']; ?>" class="navbar-link 
              <?php if (isset($_GET['category_id']) && ($category['id'] == $_GET['category_id'] || (isset($sub_categories_key2[$_GET['category_id']]) && $sub_categories_key2[$_GET['category_id']] == $category['id']))) {
                echo 'navbar-link-active';
              } ?>
              <?php echo (in_array($category['id'], $sub_categories_key)) ? 'has-child' : ''; ?>">
              <?php echo $category['name']; ?>
            </a>
            <?php if (in_array($category['id'], $sub_categories_key)) { ?>
              <ul class="list-mega-menu p-0">
                <?php foreach ($sub_categories as $sub_category) { ?>
                  <?php if ($sub_category['parent_id'] == $category['id']) { ?>
                    <li class="item-mega-menu">
                      <a href="category.php?category_id=<?php echo $sub_category['id']; ?>" class="link-mega-menu"><?php echo $sub_category['name']; ?></a>
                    </li>
                <?php }
                } ?>
              </ul>
            <?php }
            ?>
          </li>
        <?php } ?>
        <li class="navbar-item">
          <a href="./contact.php" class="navbar-link">Liên Hệ</a>
        </li>
      </ul>
    </nav>
  </div>
  <!-- end navbar -->
</header>