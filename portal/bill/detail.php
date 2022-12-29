<?php
require('../check_admin_login.php');
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
    session_start();
    require('../../connect.php');

    $bill_id = $_GET['id'];

    $sql = "SELECT *
            FROM bill_product JOIN products
            ON bill_product.product_id = products.id
            WHERE bill_id = '$bill_id'";
    $results = mysqli_query($connect, $sql);
    $total_price = 0;
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

                                <!-- <a href="insert.php" class="manage__dasboard-nav--insert">Thêm sản phẩm</a> -->
                            </div>

                            <div class="manage__dasboard-show">
                                <ul class="manage__dasboard-show-list">
                                    <li class="manage__dasboard-show-item-header">
                                        <div class="col col-2">Tên sản phẩm</div>
                                        <div class="col col-1">Giá tiền</div>
                                        <div class="col col-1">Số lượng</div>
                                    </li>
                                    <?php foreach ($results as $value) { ?>
                                        <li class="manage__dasboard-show-item-body">
                                            <div class="col col-2"><?= $value['name'] ?></div>
                                            <div class="col col-1"><?= $value['price'] ?></div>
                                            <div class="col col-1"><?= $value['quantity'] ?></div>
                                        </li>
                                        <?php
                                            $total_price += $value['price'] * $value['quantity'];
                                        ?>
                                    <?php } ?>
                                </ul>

                                <ul class="manage__dasboard-show-list">
                                    <li class="manage__dasboard-show-item-header">
                                        <div class="">
                                            Tổng tiền: <span style="font-size: 1.4rem; font-weight: 550; color: var(--primary-color);"><?=number_format($total_price)?>đ</span>
                                        </div>
                                        <a href="index.php" class="btn btn--primary">Quay lại</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>