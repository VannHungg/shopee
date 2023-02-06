<?php
require('../check_admin_login.php');
if (!isset($_SESSION['page_products'])) {
    $_SESSION['page_products'] = 1;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopee - Kênh người bán</title>

    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/shopee-icon.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../fonts/fontawesome-free-6.1.2-web/css/all.min.css">
    <link rel="stylesheet" href="../fonts/themify-icons/themify-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500;700&display=swap" rel="stylesheet">

    <script type="text/javascript" src="https://livejs.com/live.js"></script>
</head>


<body>
    <?php
    require('../../connect.php');
    ?>
    <div class="app">
        <?php
        include "../header.php";
        ?>

        <div class="app__container">
            <div class="grid">
                <div class="grid__row app__content">
                    <?php
                    include "../sidebar/sidebar.php";
                    ?>

                    <div class="grid__column-10 app__content-product">
                        <?php
                        require('../alert.php');
                        ?>
                        <div class="manage__dasboard">
                            <div class="manage__dasboard-nav">
                                <div class="manage__dasboard-nav-list">
                                    <a href="" class="manage__dasboard-nav-item manage__dasboard-nav-item--selected">
                                        <span class="manage__dasboard-nav-title">Tất cả</span>
                                    </a>

                                    <a href="" class="manage__dasboard-nav-item">
                                        <span class="manage__dasboard-nav-title">Đang hoạt động</span>
                                    </a>

                                    <a href="" class="manage__dasboard-nav-item">
                                        <span class="manage__dasboard-nav-title">Hết hàng</span>
                                        <span class="manage__dasboard-nav-num">0</span>
                                    </a>

                                    <a href="" class="manage__dasboard-nav-item">
                                        <span class="manage__dasboard-nav-title">Chờ duyệt</span>
                                        <span class="manage__dasboard-nav-num">0</span>
                                    </a>

                                    <a href="" class="manage__dasboard-nav-item">
                                        <span class="manage__dasboard-nav-title">Vi phạm</span>
                                        <span class="manage__dasboard-nav-num">0</span>
                                    </a>

                                    <a href="" class="manage__dasboard-nav-item">
                                        <span class="manage__dasboard-nav-title">Đã ẩn</span>
                                        <span class="manage__dasboard-nav-num">0</span>
                                    </a>
                                </div>

                                <a href="insert.php" class="manage__dasboard-nav--insert">Thêm sản phẩm</a>


                                <?php
                                $sql_num_products = "SELECT count(*) FROM products";
                                $arr_num_products = mysqli_query($connect, $sql_num_products);
                                $num_products = mysqli_fetch_array($arr_num_products)['count(*)'];

                                $num_products_per_page = 4;
                                $num_page = ceil($num_products / $num_products_per_page);

                                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                $product_skip = ($page - 1) * $num_products_per_page;

                                $sql = "SELECT products.*, companies.name as company_name
                                        FROM
                                        products JOIN companies
                                        ON products.company_id = companies.id
                                        LIMIT $num_products_per_page OFFSET $product_skip";
                                $results = mysqli_query($connect, $sql);
                                ?>

                                <div class="home-filter__page">
                                    <span class="home-filter__page-num">
                                        <span class="home-filter__page-current"><?= $_SESSION['page_products']; ?>
                                        </span>/<?= $num_page; ?>
                                    </span>

                                    <div style="margin-right: 16px;" class="home-filter__page-control">
                                        <a href="update_page.php?type=before" style="background-color: #e7e7e7;" class="home-filter__page-btn">
                                            <i class="home-filter__page-icon fa-solid fa-angle-left"></i>
                                        </a>
                                        <a href="update_page.php?type=after&num_page=<?=$num_page?>" style="background-color: #e7e7e7;" class="home-filter__page-btn">
                                            <i class="home-filter__page-icon fa-solid fa-angle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="manage__dasboard-show">
                                <ul class="manage__dasboard-show-list">
                                    <li class="manage__dasboard-show-item-header">
                                        <div class="col col-1">Tên sản phẩm</div>
                                        <div class="col col-2">Mô tả</div>
                                        <div class="col col-3">Giá tiền</div>
                                        <div class="col col-3">Nhà sản xuất</div>
                                        <div class="col col-4">
                                            Hoạt động
                                        </div>
                                    </li>
                                    <?php foreach ($results as $value) { ?>
                                        <li class="manage__dasboard-show-item-body">
                                            <div class="col col-1 manage__dasboard-show-item-name-product">
                                                <img src="../../photos/<?= $value['photo'] ?>" alt="" class="manage__dasboard-show-item-img">
                                                <span class="manage__dasboard-show-item-name"><?= $value['name'] ?></span>
                                            </div>
                                            <div class="col col-2"><?= $value['description'] ?></div>
                                            <div class="col col-3"><?= $value['price'] ?></div>
                                            <div class="col col-3"><?= $value['company_name'] ?></div>
                                            <div class="col col-4">
                                                <a href="update.php?id=<?= $value['id'] ?>" class="manage__dasboard-show-item-action">Cập nhật</a>
                                                <a href="delete.php?id=<?= $value['id'] ?>" class="manage__dasboard-show-item-action">Xóa</a>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>