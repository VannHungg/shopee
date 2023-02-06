<?php
session_start();

//chưa đăng nhập vào admin
$level = isset($_SESSION['level']) ? $_SESSION['level'] : null;
if($level == 2) {
    $_SESSION['status'] = "fail";
    $_SESSION['message'] = "Bạn cần phải đăng nhập với tư cách admin";
    header("Location: signin.php");
    return 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopee - Kênh bán hàng</title>

    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/shopee-icon.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./fonts/fontawesome-free-6.1.2-web/css/all.min.css">
    <link rel="stylesheet" href="./fonts/themify-icons/themify-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500;700&display=swap" rel="stylesheet">

    <script type="text/javascript" src="https://livejs.com/live.js"></script>
</head>

<body>
    <div class="app">
        <?php
            include "header.php";
        ?>

        <div class="app__container">
            <div class="grid">
                <div class="grid__row app__content">
                    <?php 
                        include "sidebar/sidebar.php";
                    ?>

                    <div class="grid__column-10 app__content-product">
                        <div class="app__content-advertisement"
                        style="background-image: url(./assets/img/banhang.shopee.png);"></div>

                        <div class="app__content-product-to-do-list">
                            <div class="app__content-product-to-do-list__heading">
                                <span class="app__content-product-to-do-list__title">Danh sách cần làm</span>
                                <span class="app__content-product-to-do-list__description">Những việc bạn sẽ phải làm</span>
                            </div>

                            <div class="grid__row">
                                <div class="grid__column-3">
                                    <a href="" class="to-do-list-wrap">
                                        <span class="to-do-list-wrap__number">0</span>
                                        <span class="to-do-list-wrap__name">Chờ xác nhận</span>
                                    </a>
                                </div>

                                <div class="grid__column-3">
                                    <a href="" class="to-do-list-wrap">
                                        <span class="to-do-list-wrap__number">0</span>
                                        <span class="to-do-list-wrap__name">Chờ lấy hàng</span>
                                    </a>
                                </div>

                                <div class="grid__column-3">
                                    <a href="" class="to-do-list-wrap">
                                        <span class="to-do-list-wrap__number">0</span>
                                        <span class="to-do-list-wrap__name">Đã xử lý</span>
                                    </a>
                                </div>

                                <div class="grid__column-3">
                                    <a href="" class="to-do-list-wrap">
                                        <span class="to-do-list-wrap__number">0</span>
                                        <span class="to-do-list-wrap__name">Đơn hủy</span>
                                    </a>
                                </div>

                                <div class="grid__column-3">
                                    <a href="" class="to-do-list-wrap">
                                        <span class="to-do-list-wrap__number">0</span>
                                        <span class="to-do-list-wrap__name">Trả/hoàn tiền chờ xử lý</span>
                                    </a>
                                </div>

                                <div class="grid__column-3">
                                    <a href="" class="to-do-list-wrap">
                                        <span class="to-do-list-wrap__number">0</span>
                                        <span class="to-do-list-wrap__name">Sản phẩm bị tạm khóa</span>
                                    </a>
                                </div>

                                <div class="grid__column-3">
                                    <a href="" class="to-do-list-wrap">
                                        <span class="to-do-list-wrap__number">0</span>
                                        <span class="to-do-list-wrap__name">Sản phẩm hết hàng</span>
                                    </a>
                                </div>

                                <div class="grid__column-3">
                                    <a href="" class="to-do-list-wrap">
                                        <span class="to-do-list-wrap__number">0</span>
                                        <span class="to-do-list-wrap__name">Chương trình khuyến mãi chờ xử lý</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>