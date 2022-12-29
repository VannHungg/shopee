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
    require('../../connect.php');
    $sql = "SELECT id, name
            FROM companies";
    $result_companies = mysqli_query($connect, $sql);
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
                        <!-- css in base.css -->
                        <div class="form-container__crud">
                            <h3 class="form-container__crud-heading">Thông tin cơ bản</h3>

                            <form class="form-container__crud-form" action="process_insert.php" method="post" enctype="multipart/form-data">
                                <div class="form-container__crud-wrap">
                                    <div class="form-container__crud-title">
                                        <span class="form-container__crud-title-warning form-container__crud-title-warning--disabled">*</span>
                                        <span class="form-container__crud-title-primary">Tên sản phẩm</span>
                                    </div>

                                    <div class="form-container__crud-input-group">
                                        <input type="text" name="name" class="form-container__crud-input">
                                    </div>
                                </div>

                                <div class="form-container__crud-wrap">
                                    <div class="form-container__crud-title">
                                        <span class="form-container__crud-title-warning">*</span>
                                        <span class="form-container__crud-title-primary">Mô tả chi tiết</span>
                                    </div>

                                    <div class="form-container__crud-input-group">
                                        <textarea name="description"></textarea>
                                    </div>
                                </div>

                                <div class="form-container__crud-wrap">
                                    <div class="form-container__crud-title">
                                        <span class="form-container__crud-title-warning">*</span>
                                        <span class="form-container__crud-title-primary">Hình ảnh sản phẩm</span>
                                    </div>

                                    <div class="form-container__crud-input-group">
                                        <input type="file" name="photo" class="form-container__crud-input">
                                    </div>
                                </div>

                                <div class="form-container__crud-wrap">
                                    <div class="form-container__crud-title">
                                        <span class="form-container__crud-title-warning">*</span>
                                        <span class="form-container__crud-title-primary">Giá tiền</span>
                                    </div>

                                    <div class="form-container__crud-input-group">
                                        <input type="number" name="price" class="form-container__crud-input">
                                    </div>

                                    <div class="form-container__crud-title">
                                        <span class="form-container__crud-title-warning">*</span>
                                        <span class="form-container__crud-title-primary">Giảm giá(%)</span>
                                    </div>

                                    <div class="form-container__crud-input-group">
                                        <input type="number" name="discount" class="form-container__crud-input">
                                    </div>
                                </div>

                                <div class="form-container__crud-wrap">
                                    <div class="form-container__crud-title">
                                        <span class="form-container__crud-title-warning">*</span>
                                        <span class="form-container__crud-title-primary">Công ty sản xuất</span>
                                    </div>

                                    <div class="form-container__crud-input-group">
                                        <select name="company_id">
                                            <?php foreach ($result_companies as $result) { ?>
                                                <option value="<?= $result['id'] ?>"><?= $result['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-container__submit">
                                    <a href="index.php" class="btn btn--normal btn--css">Trở lại</a>
                                    <input class="btn btn--primary" type="submit" value="Thêm sản phẩm">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>