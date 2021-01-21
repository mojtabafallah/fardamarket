<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Farda</title>
    <link rel="stylesheet" href="css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="css/swiper_bundle.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/flickity.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div class="container main_container">
    <div class="col-12 user_Regestration">
        <div class="col-10 user_section">
            <div class="col-12  col-sm-12 col-md-7 col-lg-7" style="padding: 0;">
                <div id="tab2" class="tab_custom2">
                    <ul>
                        <li><a href="#tabs-1">ورود</a></li>
                        <li><a href="#tabs-2">ثبت نام</a></li>
                    </ul>

        <?php endif; ?>

        <h2><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>

        <form class="woocommerce-form woocommerce-form-login login" method="post">

            <?php do_action( 'woocommerce_login_form_start' ); ?>



            <?php do_action( 'woocommerce_login_form' ); ?>
            <div id="tabs-1">


            <input type="text" placeholder="" name="username" required><span class="phone"></span> <span class="enter_user_mobile enter_user_mobile_1">شماره موبایل یا ایمیل خود را وارد کنید</span>
            <input type="password" placeholder="" name="password" required><span class="password"></span><span class="enter_user_password">رمز عبور خود را وارد کنید</span>
            <div class="user_remember_pass">

                <label class="checkbox_container">به خاطر داشتن
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label for="" style="font-family: IRANSans_medium;">رمز عبور خود را فراموش کردید؟</label>
            </div>
            <button name="register">ورود</button>
            <div class="rule">
                <p>
                    با ورود و یا ثبت نام در سایت فردامارکت شما<span><a href="#">   شرایط و قوانین </a></span> استفاده از سرویس های سایت و <span> <a href="#">    قوانین حریم خصوصی </a> </span> آن را می‌پذیرید.


                </p>
            </div>
            </div>
            <?php do_action( 'woocommerce_login_form_end' ); ?>

        </form>

        <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

    </div>

    <div class="u-column2 col-2">

        <h2><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>

        <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

            <?php do_action( 'woocommerce_register_form_start' ); ?>

            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                </p>

            <?php endif; ?>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
            </p>

            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                    <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
                </p>

            <?php else : ?>

                <p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

            <?php endif; ?>

            <?php do_action( 'woocommerce_register_form' ); ?>

            <p class="woocommerce-form-row form-row">
                <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
            </p>

            <?php do_action( 'woocommerce_register_form_end' ); ?>

        </form>

    </div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>


<body>


                    <div id="tabs-2">
                        <form id="msform" action="" method="post">
                            <!-- start progressbar -->
                            <ul id="progressbar">
                                <li class="active"><span>1</span> </li>
                                <li><span>2</span></li>
                                <li><span>3</span></li>
                            </ul>
                            <!-- end progressbar -->
                            <!-- start step one form -->
                            <fieldset>

                                <div class="phone_email_section">
                                    <select name="webmenu" id="webmenu">
                                        <option value="98" data-image="img/iranFlag.png"></option>
                                        <option value="98" data-image="img/iranFlag.png"></option>
                                        <option value="98" data-image="img/iranFlag.png"></option>

                                    </select>

                                    <input type="text" placeholder="" required class="enter_user_mobile_input"> <span class="enter_user_mobile enter_user_mobile_2">شماره موبایل یا ایمیل خود را وارد کنید</span>
                                </div>


                                <input type="button" name="next" class="next action-button" value="ادامه" />

                                <div class="rule">
                                    <p>
                                        با ورود و یا ثبت نام در سایت فردامارکت شما<span> <a> شرایط و قوانین </a> </span> استفاده از سرویس های سایت و <span> <a>   قوانین حریم خصوصی </a></span> آن را می‌پذیرید.
                                    </p>
                                </div>

                            </fieldset>
                            <!-- end step one form -->
                            <!-- start step two form -->
                            <fieldset>
                                <div class="authentication_code">
                                    <p>کد احراز هویت شما به شماره <span>   09123456789</span> ارسال شد <br>آن را وارد کنید:</p>

                                </div>
                                <div class="number_authentication_section">
                                    <input type="text">
                                    <input type="text">
                                    <input type="text">
                                    <input type="text">
                                </div>


                                <input type="button" name="next" class="next action-button" value="ادامه" />

                                <div class="rule">
                                    <p>
                                        با ورود و یا ثبت نام در سایت فردامارکت شما<span> <a> شرایط و قوانین </a> </span> استفاده از سرویس های سایت و <span> <a>   قوانین حریم خصوصی </a></span> آن را می‌پذیرید.
                                    </p>
                                </div>
                            </fieldset>
                            <!-- end step two form -->
                            <!-- start step three form -->
                            <fieldset>
                                <div class="phone_email_section">
                                    <input type="password" placeholder="" required class="password1"><span class="password password1"></span> <span class="enter_user_mobile enter_user_mobile_3">رمز عبور خود را وارد کنید</span>
                                    <input type="password" placeholder="" required class="password2"><span class="password password2"></span><span class="repeat_passoword">رمز عبور خود را تکرار کنید</span>
                                </div>

                                <input type="submit" name="next" class="next action-button" value="ثبت نام" />
                                <div class="rule">
                                    <p>
                                        با ورود و یا ثبت نام در سایت فردامارکت شما<span> <a> شرایط و قوانین </a> </span> استفاده از سرویس های سایت و <span> <a>   قوانین حریم خصوصی </a></span> آن را می‌پذیرید.
                                    </p>
                                </div>

                            </fieldset>
                            <!-- end step three form -->
                        </form>

                    </div>

                </div>

            </div>
            <div class="col-4 d-none d-md-block col-md-5 col-lg-5 doctor_section">
                <div>
                    <div class="pharmecy_img">
                        <img src="img/pharmecy.png" alt="">
                    </div>
                    <div class="welcome_to_fadra">
                        <span>خوش آمدید</span>
                    </div>
                    <div class="farda_logo_welcome">
                        <img src="img/farda_log.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/swiper_bundle.js"></script>
<script src="js/myfunction.js"></script>
<script src="js/flickity.pkgd.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/jquery.dd.min.js"></script>

</html>

