<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"E:\phpstudy\PHPTutorial\WWW\ydwxfx\public/../app/index\view\index\index.html";i:1526806525;s:68:"E:\phpstudy\PHPTutorial\WWW\ydwxfx\app\index\view\common\bottom.html";i:1526218830;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0,user-scalable=0"/>
    <link rel="stylesheet" type="text/css" href="/ydwxfx/public/static/css/head-shop.css">
    <link rel="stylesheet" href="/ydwxfx/public/static/css/pageSwitch.min.css">
    <link rel="stylesheet" type="text/css" href="/ydwxfx/public/static/css/button.css"/>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script type="text/javascript" src="/ydwxfx/public/static/js/jquery.min.js"></script>
    <title>分销商城</title>
</head>
<body>
<div id="homepage">
    <div class="all">
        <div id="head">
            <div class="head-lr">
                <img src="/ydwxfx/public/static/images/sos.png">
            </div>
            <div class="head-center">
                <div class="head-img2">
                    <img src="/ydwxfx/public/static/images/sousuo.png" @click="searchGoods">
                </div>
                <div class="head-input">
                    <form action="" method="post" id="searchForm">
                        <input id="searchInput" type="search" placeholder="商品搜索：请输入商品、店铺名称" maxlength="30">
                    </form>
                </div>
            </div>
            <div class="head-lr">
                <img src="/ydwxfx/public/static/images/mg.png">
            </div>
        </div>
        <div id="container">
            <div class="sections">
                <div class="section" id="section0"></div>
                <div class="section" id="section1"></div>
                <div class="section" id="section2"></div>
                <div class="section" id="section3"></div>
            </div>
        </div>
        <script src="/ydwxfx/public/static/js/jquery.min.js" type="text/javascript"></script>
        <script src="/ydwxfx/public/static/js/pageSwitch.min.js"></script>
        <script>
            $("#container").PageSwitch({
                direction: 'horizontal',
                easing: 'ease-in',
                duration: 1000,
                autoPlay: true,
                loop: 'false'
            });
        </script>

        <div class="choose">
            <ul>
                <li>
                    <a href="/ydwxfx/public/index.php/index/index/goods2">
                        <img src="/ydwxfx/public/static/images/2-1.gif">
                    </a>
                    <br/>
                    <span>商城</span>
                <li>
                    <a href="/ydwxfx/public/index.php/index/index/xianshi">
                        <img src="/ydwxfx/public/static/images/2-2.gif">
                    </a>
                    <br/>
                    <span>限时抢购</span>
                <li>
                    <a href="/ydwxfx/public/index.php/index/index/myvip.html">
                        <img src="/ydwxfx/public/static/images/2-3.gif">
                    </a>
                    <br/>
                    <span>会员中心</span>
                <li>
                    <a href="/ydwxfx/public/index.php/index/index/shopcat.html">
                        <img src="/ydwxfx/public/static/images/2-4.gif">
                    </a>
                    <br/>
                    <span>购物车</span>
                </li>
            </ul>
        </div>

        <div id="goods">
            <div id="shop" v-for="item in items">
                <div class="product">
                    <a :href="'/ydwxfx/public/index.php/index/index/shopitems?goods_id=' + item.id + '&seller_id=' + item.seller_id"><img id="ptimg"
                                                                                                             :src="item.iconimage_src"/></a>
                    <div class="items">
                        <div id="jieshao">
                            {{ item.describe }}
                        </div>
                        <p id="price">{{ item.price }}
                            <a :href="'/ydwxfx/public/index.php/index/index/shopitems?goods_id=' + item.id + '&seller_id=' + item.seller_id">立即购买</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="button">
	<div class="icon">
		<a href="/ydwxfx/public/index.php/index/index/index">
			<img src="/ydwxfx/public/static/images/homepage.png" >
		</a>
		<span class="active">主页面</span>
	</div>
	<div class="icon">
		<a href="/ydwxfx/public/index.php/index/index/goods1">
			<img src="/ydwxfx/public/static/images/goods.png" >
		</a>
		<span>分类</span>
	</div>
	<div class="icon">
		<a href="/ydwxfx/public/index.php/index/index/myfx">
			<img src="/ydwxfx/public/static/images/icon-kin.png" >
		</a>
		<span>微商</span>
	</div>
	<div class="icon">
		<a href="/ydwxfx/public/index.php/index/index/shopcat">
			<img src="/ydwxfx/public/static/images/cart.png" >
		</a>
		<span>购物车</span>
	</div>
	<div class="icon">
		<a href="/ydwxfx/public/index.php/index/index/my">
			<img src="/ydwxfx/public/static/images/my.png" >
		</a>
		<span>我的</span>
	</div>
</div>
    </div>
</div>
<script>
    var vm = new Vue({
                el: '#homepage',
                data: {
                    items: null
                },
                methods: {
                    searchGoods:function () {
             window.location.href="http://localhost/ydwxfx/public/index.php/index/index/goods2?searchText="+$("#searchInput").val();
                    }
                }
            })
            ;
    $(document).ready(function () {
        $.ajax({
            url: "http://localhost/pcwxapi/public/index.php/index/index/getGoodsOrSearch",
            data: {
                seller_id: '1111',
                offset: '1'
            },
            type: 'post',
            dataType: 'json',
            success: function (data) {
                var Obj = JSON.parse(data);
                vm.items = Obj.data
            },
            error: function () {
                alert('失败');
            }
        });
    });
</script>
</body>
</html>
