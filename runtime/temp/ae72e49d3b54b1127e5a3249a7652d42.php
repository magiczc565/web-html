<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"E:\phpstudy\PHPTutorial\WWW\ydwxfx2\public/../app/index\view\index\my.html";i:1526283262;s:69:"E:\phpstudy\PHPTutorial\WWW\ydwxfx2\app\index\view\common\bottom.html";i:1526218830;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0,user-scalable=0"/>
    <link rel="stylesheet" type="text/css" href="/ydwxfx2/public/static/css/my.css"/>
    <link rel="stylesheet" type="text/css" href="/ydwxfx2/public/static/css/button.css"/>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script type="text/javascript" src="/ydwxfx2/public/static/js/jquery.min.js"></script>
    <title></title>
</head>
<body>
<div id="my">
    <div class="head">
        <div class="main-img">
            <img src="/ydwxfx/public/static/images/pic.png"/>
        </div>
        <div class="name">
            <p>张川</p>
            <span>普通会员</span>
            <img class="vip1" src="/ydwxfx/public/static/images/vip/1dz.png">
            <img class="vip2" src="/ydwxfx/public/static/images/vip/v1.png"/>
        </div>
    </div>
    <div class="center">
        <div class="order">
            <p>我的订单</p>
            <a href="/ydwxfx2/public/index/index/orderforgoods" class="back"><span></span></a>
        </div>
        <div class="order1">
            <ul>
                <li><a href="/ydwxfx2/public/index/index/orderforgoods">待付款</a></li>
                <li><a href="/ydwxfx2/public/index/index/orderforgoods">待发货</a></li>
                <li><a href="/ydwxfx2/public/index/index/orderforgoods">待收货</a></li>
                <li><a href="/ydwxfx2/public/index/index/orderforgoods">待评价</a></li>
            </ul>
        </div>
    </div>
    <div class="menu">
        <p></p>
        <ul>
            <li><a href="/ydwxfx2/public/index/index/myvip"><img src="/ydwxfx/public/static/images/vip.png"/></a><br/>
                <span>我的VIP</span></li>
            <li><a href="#"><img src="/ydwxfx/public/static/images/mes3.png"/></a><br/>
                <span>个人信息</span></li>
            <li><a href="/ydwxfx2/public/index/index/shopcat"><img src="/ydwxfx/public/static/images/cart1.png"/></a><br/>
                <span>购物车</span></li>
            <li><a href="/ydwxfx2/public/index/index/open"><img src="/ydwxfx/public/static/images/safe1(1).png"/></a><br/>
                <span>信息安全</span></li>
        </ul>
    </div>
    <div id="button">
	<div class="icon">
		<a href="/ydwxfx2/public/index/index/index">
			<img src="/ydwxfx/public/static/images/homepage.png" >
		</a>
		<span class="active">主页面</span>
	</div>
	<div class="icon">
		<a href="/ydwxfx2/public/index/index/goods1">
			<img src="/ydwxfx/public/static/images/goods.png" >
		</a>
		<span>分类</span>
	</div>
	<div class="icon">
		<a href="/ydwxfx2/public/index/index/myfx">
			<img src="/ydwxfx/public/static/images/icon-kin.png" >
		</a>
		<span>微商</span>
	</div>
	<div class="icon">
		<a href="/ydwxfx2/public/index/index/shopcat">
			<img src="/ydwxfx/public/static/images/cart.png" >
		</a>
		<span>购物车</span>
	</div>
	<div class="icon">
		<a href="/ydwxfx2/public/index/index/my">
			<img src="/ydwxfx/public/static/images/my.png" >
		</a>
		<span>我的</span>
	</div>
</div>
</div>
<script>
    var user_id="<?php echo $data['user_id']; ?>";
    var token="<?php echo $data['token']; ?>";

    $(document).ready(function () {
        checkLogin();

    });
    function checkLogin() {
        if (user_id != "" && token != "") {
            $.ajax({
                url: 'http://localhost/pcwxapi/public/index.php/user/user/isLogin',
                data: {
                    user_id: user_id,
                    user_token: token
                },
                type: 'post',
                success: function (data) {
                    var obj = JSON.parse(data);
                    if (obj.code == '100') {
                        window.location.href = 'http://localhost/ydwxfx/public/index.php/index/index/login';
                    }
                },
                error: function (data) {
                    alert('error');
                }
            })
        } else {
            window.location.href = 'http://localhost/ydwxfx/public/index.php/index/index/login';
        }
    }
</script>
</body>
</html>
