<?
require_once "functions/database.php";
$action = new Action();
$title = "ابر پایا";
include_once "header.php"
?>

    <section class="main_slider">
        <div class="carousel"
             data-flickity='{ "wrapAround": true }'>
            <img class="carousel-cell" src="assets/images/slide1.png">
            <img class="carousel-cell" src="assets/images/slide1.png">
            <img class="carousel-cell" src="assets/images/slide1.png">
            <img class="carousel-cell" src="assets/images/slide1.png">
            <img class="carousel-cell" src="assets/images/slide1.png">

        </div>
    </section>
    <!-- eof slider -->


    <!-- features -->
    <div class="container index_features">
        <h3 style="font-size: 26px;">ابرپایو چه میکند؟</h3>
        <div class="index_features_row">
            <div class="feature_cell">
                <div class="feature_inner">
                    <img src="assets/images/Group 297@2x.png">
                    <h3>ثبت کارت بانکی در اپلیکیشن ابرپویه</h3>
                    <p>همه ی کارت های عضو شتاب قابل قبوله</p>
                </div>
            </div>
            <div class="feature_cell">
                <div class="feature_inner">
                    <img src="assets/images/Group 298@2x.png">
                    <h3>خرید با کارت بانکی و اعتبار نقدی</h3>
                    <p style="margin-bottom: 0;">فروشگاه ها و کسب و کارهای ابر پایو بسیار زیادی در
                        سراسر کشور هستن</p>
                </div>
            </div>
            <div class="feature_cell">
                <div class="feature_inner">
                    <img src="assets/images/Group 301@2x.png">
                    <h3>از ۴ تا ۱۴ درصد پاداش نقدی بگیر</h3>
                    <p>پاداش نقدی خرید هر روز ۹ صبح تو کیف پولته</p>
                </div>
            </div>

        </div>
        <div class="index_features_row">
            <div class="feature_cell">
                <div class="feature_inner">
                    <img src="assets/images/Group 302@2x.png">
                    <h3>تجارت الکترونیک</h3>
                    <p>آشنا کردن مردم با دنیای دیجیتال و صنعت
                        تجارت الکترونیک با اجرای طرح های دانش بنیانی</p>
                </div>
            </div>
            <div class="feature_cell">
                <div class="feature_inner">
                    <img src="assets/images/Group 306@2x.png">
                    <h3>تخفیفات ارزشمند</h3>
                    <p>ارائه خدمات متنوع و کالاهای ایرانی با حداقل
                        هزینه و بدون واسطه</p>
                </div>
            </div>
            <div class="feature_cell">
                <div class="feature_inner">
                    <img src="assets/images/Group 307@2x.png">
                    <h3>ایجاد منبع درآمدی </h3>
                    <p>ایجاد اشتغال زایی و ایجاد منبع درآمدی ایمن و
                        مناسب برای آحاد جامعه ، بالاخص اقشار کم درآمد</p>
                </div>
            </div>
        </div>
    </div>
    <!--eof features -->
    <div class="row">
        <button class="main_btn middle_btn">
            <i class="fa fa-play"></i>
            ویدیو آموزشی
        </button>
    </div>


    <!-- stores -->
    <section class="container">
        <h3 class="index_title">فروشگاه های روز</h3>

        <!-- buttons -->
        <div class="tab_index">
            <button class="tablinks active_tablink">رستوران و کافی شاپ</button>
            <button class="tablinks">تفریحی ورزشی</button>
            <button class="tablinks">آرایشی و بهداشتی</button>
            <button class="tablinks">پزشکی و سلامتی</button>
            <button class="tablinks">فرهنگی و هنری</button>
            <button class="tablinks">کالا و خدمات</button>
        </div>
        <!-- eof btns -->
        <!--tabs content  -->
        <div class="tabcontent">
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <button class="main_btn">

                <a>
                    <i class="fa fa-reply"></i>
                </a>
                بیشتر
            </button>

        </div>

        <div class="tabcontent">
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <button class="main_btn">

                <a>
                    <i class="fa fa-reply"></i>
                </a>
                بیشتر
            </button>

        </div>

        <div class="tabcontent">
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <button class="main_btn">

                <a>
                    <i class="fa fa-reply"></i>
                </a>
                بیشتر
            </button>

        </div>

        <div class="tabcontent">
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <button class="main_btn">

                <a>
                    <i class="fa fa-reply"></i>
                </a>
                بیشتر
            </button>

        </div>

        <div class="tabcontent">
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <button class="main_btn">

                <a>
                    <i class="fa fa-reply"></i>
                </a>
                بیشتر
            </button>

        </div>

        <div class="tabcontent">
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <button class="main_btn">

                <a>
                    <i class="fa fa-reply"></i>
                </a>
                بیشتر
            </button>

        </div>

        <div class="tabcontent">
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <button class="main_btn">

                <a>
                    <i class="fa fa-reply"></i>
                </a>
                بیشتر
            </button>

        </div>

        <div class="tabcontent">
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div class="index_shop">
                <div class="index_shop_inner">
                    <div style="width: 100%;position: relative;">
                        <img src="assets/images/26409.png">
                        <div class="shop_off">23%</div>
                    </div>
                    <div class="shop_content">
                        <h4>دندان پزشکی اسمایل سنتر</h4>
                        <h6>
                            <i class="fa fa-map"></i>
                            میدان اطلسی
                        </h6>
                    </div>
                    <div class="shop_star">
                        <div class="row">
                            <div class="col-3">
                                <div class="star_card"><i class="fa fa-star"></i> 3.8</div>
                            </div>
                            <div class="col-9 sell_card">
                                <i class="fas fa-shopping-cart"></i>

                                <p>
                                    <span>256</span>
                                    خرید
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <button class="main_btn">

                <a>
                    <i class="fa fa-reply"></i>
                </a>
                بیشتر
            </button>

        </div>
        <!-- eof tabs -->
    </section>

<? include_once "footer.php" ?>