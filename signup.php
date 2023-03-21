<!-- Modal -->
<div style="display:none;" class="modal" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- container-login -->
        <div class="modal-content">
            <div class="grid">
                <div class="container-login__content">
                    <form method="post" id="form-signup" class="auth-form--op-top-signup auth-form">
                        <div class="auth-form__container">
                            <header class="auth-form__header">
                                <h3 class="auth-form__heading">Đăng Ký</h3>
                                <a href="signin.php" class="auth-form__switch-btn">Đăng nhập</a>
                            </header>

                            <div class="auth-form__form">
                                <div class="alert alert-success" id="div-alert" style="display: none"></div>

                                <div class="auth-form__group">
                                    <input type="text" name="name" class="auth-form__input" placeholder="Nhập vào tên của bạn">
                                </div>

                                <div class="auth-form__group">
                                    <input type="email" name="email" class="auth-form__input" placeholder="Nhập vào email của bạn">
                                </div>

                                <div class="auth-form__group">
                                    <input type="password" name="password" class="auth-form__input" placeholder="Nhập vào mật khẩu của bạn">
                                </div>

                                <div class="auth-form__group">
                                    <input type="text" name="phone" class="auth-form__input" placeholder="Nhập vào sđt của bạn">
                                </div>

                                <div class="auth-form__group">
                                    <input type="text" name="address" class="auth-form__input" placeholder="Địa chỉ của bạn là ...">
                                </div>

                                <div class="auth-form__group auth-form__input-info">
                                    <span class="auth-form__input-gender-title">Giới tính</span>
                                    <div class="auth-form__input-gender-group">
                                        <input type="radio" id="male" name="gender" class="auth-form__input-radio" value="Nam">
                                        <label style="font-size: 1.3rem;" for="male">Nam</label>
                                    </div>

                                    <div class="auth-form__input-gender-group">
                                        <input type="radio" id="female" name="gender" class="auth-form__input-radio" value="Nữ">
                                        <label style="font-size: 1.3rem;" for="female">Nữ</label>
                                    </div>

                                    <div class="auth-form__input-birth-group">
                                        <label style="font-size: 1.3rem;" for="date">Date of Birth</label>
                                        <input id="date" type="date" name="dateofbirth" class="auth-form__input-birth" />
                                    </div>
                                </div>
                            </div>

                            <div class="auth-form__aside">
                                <p class="auth-form__policy-text">
                                    Bằng việc đăng kí, bạn đã đồng ý với Shopee về
                                    <a href="" class="auth-form__text-link">Điều khoản dịch vụ</a> &
                                    <a href="" class="auth-form__text-link"> Chính sách bảo mật</a>
                                </p>
                            </div>

                            <div class="auth-form__controls auth-form__controls--mr">
                                <a href="" class="btn auth-form__controls-back btn--normal">TRỞ LẠI</a>
                                <input type="submit" class="btn btn--primary" value="ĐĂNG KÝ">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#form-signup").validate({
            rules: {
                "name": {
                    required: true,
                    maxlength: 15
                },
                "email": {
                    required: true,
                    email: true
                },
                "password": {
                    required: true,
                    minlength: 8
                }
            },
            messages: {
                "name": {
                    required: "Bắt buộc nhập username",
                    maxlength: "hãy nhập tối đa 15 ký tự"
                },
                "email": {
                    required: "Bắt buộc nhập email",
                    maxlength: "hãy nhập tối đa 15 ký tự"
                },
                "password": {
                    required: "Bắt buộc nhập password",
                    maxlength: "hãy nhập ít nhất 8 ký tự"
                }
            },
            submitHandler: function() {
                $.ajax({
                    type: "POST",
                    url: "process_signup.php",
                    dataType: "html",
                    data: $("#form-signup").serializeArray(),
                    success: function(response) {
                        if (response !== "1") {
                            $('#div-alert').text(response);
                            $('#div-alert').show();
                            alert("chưa được");
                        } else {
                            $('#myModal').hide();
                            $('.modal-backdrop').remove();
                            $('#signin-guest').hide();
                            $('.signin-guest').hide();
                            $('#signin-user').show();
                            $('.header__navbar-user-name').text($("input[name='name']").val());
                        }
                    }
                });
            }
        });
    });
</script>