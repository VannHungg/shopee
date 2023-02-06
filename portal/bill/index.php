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

    $sql = "SELECT *FROM bill";
    $results = mysqli_query($connect, $sql);
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
                                        <div class="col col-0">Mã</div>
                                        <div class="col col-3">Thời gian đặt</div>
                                        <div class="col col-2">Tên người nhận</div>
                                        <div class="col col-2">Sđt người nhận</div>
                                        <div class="col col-2">Địa chỉ người nhận</div>
                                        <div class="col col-3">Trạng thái</div>
                                        <div class="col col-3">Tổng tiền</div>
                                        <div class="col col-4">Hoạt động</div>
                                    </li>
                                    <?php foreach ($results as $value) { ?>
                                        <li class="manage__dasboard-show-item-body">
                                            <div class="col col-0 manage__dasboard-show-item-name-product">
                                                <span class="manage__dasboard-show-item-name"><?= $value['id'] ?></span>
                                            </div>
                                            <div class="col col-3"><?= $value['time_order'] ?></div>
                                            <div class="col col-2"><?= $value['customer_name'] ?></div>
                                            <div class="col col-2"><?= $value['customer_phone'] ?></div>
                                            <div class="col col-2"><?= $value['customer_address'] ?></div>
                                            <div class="col col-3">
                                                <?php 
                                                if($value['status'] == 0) {
                                                    echo "Đang duyệt";
                                                }
                                                else if($value['status'] == 1){
                                                    echo "Đã duyệt";
                                                }
                                                else if($value['status'] == 2){
                                                    echo "Đã hủy";
                                                }
                                                ?>
                                            </div>
                                            <div class="col col-3"><?= number_format($value['total_price']) ?>đ</div>
                                            <div class="col col-4">
                                                <a href="detail.php?id=<?= $value['id'] ?>" class="manage__dasboard-show-item-action">Xem chi tiết</a>
                                                <?php if($value['status'] == 0) {?>
                                                    <a href="update.php?id=<?= $value['id'] ?>&status=1" class="manage__dasboard-show-item-action">Duyệt đơn</a>
                                                    <a href="update.php?id=<?= $value['id'] ?>&status=2" class="manage__dasboard-show-item-action">Hủy đơn</a>
                                                <?php } ?>
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