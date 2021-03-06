<?php
$list_buy = get_list_by_cart();
$list_info = get_info_cart();
$list_menus = db_fetch_array("SELECT*FROM `tbl_menus` ORDER BY `menu_order` ASC");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ISMART STORE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="<?php echo base_url(); ?>"/>
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/style.css" rel="stylesheet" type="text/css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>

        <script src="public/js/jquery-3.5.0.min.js" type="text/javascript"></script>
        <script src="public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/carousel/owl.carousel.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
        <script src="public/js/app.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div id="head-top" class="clearfix">
                        <div class="wp-inner">
                            <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                            <div id="main-menu-wp" class="fl-right">
                            <?php if(!empty($list_menus)){
                                ?>
                                <ul id="main-menu" class="clearfix">
                                    <?php foreach($list_menus as $menu){
                                        ?>
                                    <li>
                                        <a href="<?php echo $menu['menu_url_static']?>-<?php echo $menu['menu_id']?>.html" title=""><?php echo $menu['menu_title']?></a>
                                    </li> 
                                    <?php
                                    }
                                    ?>      
                                </ul> 
                                <?php
                                }
                                ?>                        
                            </div>
                        </div>
                    </div>
                    <div id="head-body" class="clearfix">
                        <div class="wp-inner">
                            <a href="" title="" id="logo" class="fl-left"><img src="public/images/logo.png"/></a>
                            <div id="search-wp" class="fl-left">
                                <form method="POST" action="tim-kiem.html">
                                    <input type="text" name="value" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!" value="<?php echo set_value('value')?>">
                                    <button type="submit" id="sm-s" name="sm_s" value="Tìm kiếm">Tìm kiếm</button>
                                </form>
                            </div>
                            <div id="action-wp" class="fl-right">
                                <div id="advisory-wp" class="fl-left">
                                    <span class="title">Tư vấn</span>
                                    <span class="phone">0987.654.321</span>
                                </div>
                                <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                <a href="?page=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num"><?php if(!empty($list_buy)){echo count($list_buy);}else{ echo '0';}?></span>
                                </a>
                                <div id="cart-wp" class="fl-right">
                                    <div id="btn-cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="num"><?php if(!empty($list_buy)){echo count($list_buy);}else{ echo '0';}?></span>
                                    </div>
                                    <div id="dropdown">
                                        <p class="desc">Có <span><?php if(!empty($list_buy)){echo count($list_buy);}else{ echo '0';}?> sản phẩm</span> trong giỏ hàng</p>
                                        <?php if(!empty($list_buy)){
                                            ?>
                                            <ul class="list-cart">
                                                <?php foreach($list_buy as $product){
                                                ?>
                                                    <li class="clearfix">
                                                        <a href="<?php echo $product['slug'] ?>-<?php echo $product['product_id'] ?>-i.html" title="" class="thumb fl-left">
                                                            <img src="admin/<?php echo  $product['product_thumb']?>" alt="">
                                                        </a>
                                                        <div class="info fl-right">
                                                            <a href="<?php echo $product['slug'] ?>-<?php echo $product['product_id'] ?>-i.html" title="" class="product-name"><?php echo  $product['product_title']?></a>
                                                            <p class="price"><?php echo currency_format($product['product_price_new'])?></p>
                                                            <p class="qty">Số lượng: <span><?php echo  $product['qty']?></span></p>
                                                        </div>
                                                    </li>
                                                <?php
                                                }
                                                ?>   
                                            </ul>
                                            <?php
                                        }
                                        ?> 
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng:</p>
                                            <p class="price fl-right"><?php echo currency_format($list_info['total'])?></p>
                                        </div>
                                        <dic class="action-cart clearfix">
                                            <a href="gio-hang.html" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                            <a href="thanh-toan.html" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                        </dic>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>