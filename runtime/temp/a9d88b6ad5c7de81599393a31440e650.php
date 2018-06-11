<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:59:"D:\wamp\www\ydwxfx\public/../app/index\view\index\myfx.html";i:1526554061;s:52:"D:\wamp\www\ydwxfx\app\index\view\common\bottom.html";i:1526218830;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0,user-scalable=0"/>
    <title>我的微店</title>
    <link rel="stylesheet" href="/ydwxfx/public/static/css/myfx.css"/>
    <link rel="stylesheet" href="/ydwxfx/public/static/css/button.css"/>
    <script src="/ydwxfx/public/static/js/common.js"></script>
    <script src="/ydwxfx/public/static/js/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
</head>
<body>
<div id="myfx">
    <div class="all">
        <div class="head">
            <img :src="items.head_icon_image_src"/>
            <div class="name">
                <p class="shop-name">{{items.shopping_name}}</p>
            </div>
            <div class="mes">
                <div class="message">
                    <p class="num">等级</p>
                    <p class="num-mes" v-if="items.kind == '1'">青铜会员</p>
                    <p class="num-mes" v-if="items.kind == '2'">黄金会员</p>
                    <p class="num-mes" v-if="items.kind == '3'">铂金会员</p>
                    <p class="num-mes" v-if="items.kind == '4'">钻石会员</p>
                </div>
                <div class="message">
                    <p class="num">积分</p>
                    <p class="num-mes">{{items.integral}}</p>
                </div>
                <div class="message">
                    <p class="num">全部商品</p>
                    <p class="num-mes">{{items.saleGoodsCount}}</p>
                </div>
            </div>
        </div>
        <div id="shoping">
            <div id="shop" v-for="goods in goodsData">
                <div class="product">
                    <a :href="'/ydwxfx/public/index.php/index/index/shopitems?goods_id='+goods.id+'&seller_id='+items.seller_id"><img id="ptimg" :src="goods.iconimage_src"/></a>
                    <div class="items">
                        <div id="jieshao">
                            {{goods.describe}}
                        </div>
                        <p id="price">{{goods.price}}
                            <a :href="'/ydwxfx/public/index.php/index/index/shopitems?goods_id='+goods.id+'&seller_id='+items.seller_id">立即购买</a>
                        </p>
                    </div>
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
<script>
    var vm=new Vue({
        el: '#myfx',
        data: {
            items: null,
            goodsData:null,
            seller_id:null
        },
        methods:{
            handleScroll:function () {
                console.log('sssss');
                var scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop

            }
        },
        mounted:function () {

            window.addEventListener('scroll', function () {
                console.log('sssss');
            });
        }
    });
    $(document).ready(function () {
        checkLogin("<?php echo $data['user_id']; ?>","<?php echo $data['token']; ?>");
        $.ajax({
            url: "http://localhost/pcwxapi/public/index.php/user/seller/getShoppingInfo",
            data: {
                user_id: "<?php echo $data['user_id']; ?>",
                user_token: "<?php echo $data['token']; ?>"
            },
            type: 'post',
            async: false,
            dataType: 'json',
            success: function (data) {
                var Obj = JSON.parse(data);
                vm.items=Obj.data;
                vm.seller_id=Obj.data.seller_id;
            },
            error: function () {
                alert('失败');
            }
        });
        $.ajax({
            url: "http://localhost/pcwxapi/public/index.php/index/index/getGoodsOrSearch",
            data: {
                seller_id: vm.seller_id,
                offset: "1"
            },
            type: 'post',
            async: false,
            dataType: 'json',
            success: function (data) {

                var Obj = JSON.parse(data);
                vm.goodsData=Obj.data;
            },
            error: function () {
                alert('失败');
            }
        });
    });
</script>
</body>
</html>
