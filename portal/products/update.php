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
    $id = $_GET['id'];

    $sql_products = "SELECT *FROM products WHERE id = '$id'";
    $arr_products = mysqli_query($connect, $sql_products);
    $results_products = mysqli_fetch_array($arr_products);

    $sql_companies = "SELECT id, name FROM companies";
    $results_companies = mysqli_query($connect, $sql_companies);
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

                            <form class="form-container__crud-form" action="process_update.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $results_products['id'] ?>">
                                <div class="form-container__crud-wrap">
                                    <div class="form-container__crud-title">
                                        <span class="form-container__crud-title-warning form-container__crud-title-warning--disabled">*</span>
                                        <span class="form-container__crud-title-primary">Tên sản phẩm</span>
                                    </div>

                                    <div class="form-container__crud-input-group">
                                        <input type="text" name="name" class="form-container__crud-input" value="<?= $results_products['name'] ?>">
                                    </div>
                                </div>

                                <div class="form-container__crud-wrap">
                                    <div class="form-container__crud-title">
                                        <span class="form-container__crud-title-warning">*</span>
                                        <span class="form-container__crud-title-primary">Mô tả chi tiết</span>
                                    </div>

                                    <div class="form-container__crud-input-group">
                                        <textarea name="description"><?= strip_tags($results_products['description']) ?></textarea>
                                    </div>
                                </div>

                                <div class="form-container__crud-wrap">
                                    <div class="form-container__crud-title">
                                        <span class="form-container__crud-title-warning form-container__crud-title-warning--disabled">*</span>
                                        <span class="form-container__crud-title-primary">Giữ lại ảnh cũ</span>
                                    </div>
                                    <img src="../../photos/<?= $results_products['photo'] ?>" class="manage__dasboard-show-item-img" alt="ảnh đại diện cũ">
                                    <input type="hidden" name="old_photo" value="<?=$results_products['photo']?>">
                                </div>

                                <div class="form-container__crud-wrap">
                                    <div class="form-container__crud-title">
                                        <span class="form-container__crud-title-warning">*</span>
                                        <span class="form-container__crud-title-primary">Hoặc thay ảnh mới</span>
                                    </div>

                                    <div class="form-container__crud-input-group">
                                        <input type="file" name="new_photo" class="form-container__crud-input">
                                    </div>
                                </div>

                                <div class="form-container__crud-wrap">
                                    <div class="form-container__crud-title">
                                        <span class="form-container__crud-title-warning">*</span>
                                        <span class="form-container__crud-title-primary">Giá tiền</span>
                                    </div>

                                    <div class="form-container__crud-input-group">
                                        <input type="number" name="price" class="form-container__crud-input" value="<?=$results_products['price']?>">
                                    </div>

                                    <div class="form-container__crud-title">
                                        <span class="form-container__crud-title-warning">*</span>
                                        <span class="form-container__crud-title-primary">Giảm giá(%)</span>
                                    </div>

                                    <div class="form-container__crud-input-group">
                                        <input type="number" name="discount" class="form-container__crud-input" value="<?=$results_products['discount']?>">
                                    </div>
                                </div>

                                <div class="form-container__crud-wrap">
                                    <div class="form-container__crud-title">
                                        <span class="form-container__crud-title-warning">*</span>
                                        <span class="form-container__crud-title-primary">Công ty sản xuất</span>
                                    </div>

                                    <div class="form-container__crud-input-group">
                                        <select name="company_id">
                                            <?php foreach ($results_companies as $result_1) { ?>
                                                <option
                                                <?php if($result_1['id'] == $results_products['company_id']) {?>
                                                    selected
                                                <?php } ?>
                                                value="<?= $result_1['id'] ?>"><?= $result_1['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-container__submit">
                                    <a href="index.php" class="btn btn--normal btn--css">Trở lại</a>
                                    <input class="btn btn--primary" type="submit" value="Sửa sản phẩm">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>