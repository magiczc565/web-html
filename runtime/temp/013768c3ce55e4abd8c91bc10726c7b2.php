<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:57:"D:\wamp\www\ydwxfx\public/../app/index\view\index\my.html";i:1526638291;s:52:"D:\wamp\www\ydwxfx\app\index\view\common\bottom.html";i:1526218830;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0,user-scalable=0" />
		<link rel="stylesheet" type="text/css" href="/ydwxfx/public/static/css/my.css"/>
		<link rel="stylesheet" type="text/css" href="/ydwxfx/public/static/css/button.css" />
		<script src="https://cdn.jsdelivr.net/npm/vue"></script>
		<script type="text/javascript" src="/ydwxfx/public/static/js/jquery.min.js"></script>
		<title></title>
	</head>
	<body>
		<div id="my">
			<div class="head">
				<div class="main-img">
					<img src="/ydwxfx/public/static/images/pic.png"/>
				</div>
				<div class="name">
					<p>{{items.username}}</p>
					<span v-if="items.kind ==  '1'">大众会员</span>
					<span v-if="items.kind ==  '2'">青铜会员</span>
					<span v-if="items.kind ==  '3'">黄金会员</span>
					<span v-if="items.kind ==  '4'">铂金会员</span>
					<span v-if="items.kind ==  '5'">钻石会员</span>
					<img class="vip1" src="/ydwxfx/public/static/images/vip/1dz.png">
					<img class="vip2" src="/ydwxfx/public/static/images/vip/v1.png"/>
				</div>
			</div>
			<div class="center">
				<div class="order" >
					<p>我的订单</p>
					<a href="/ydwxfx/public/index.php/index/index/orderforgoods" class="back"><span></span></a>
				</div>
			</div>
			<div class="menu">
				<p></p>
				<ul>
					<li><a href="/ydwxfx/public/index.php/index/index/myvip"><img src="/ydwxfx/public/static/images/vip.png"/></a><br/>
					<span>我的VIP</span></li>
					<li><a href="#"><img src="/ydwxfx/public/static/images/mes3.png"/></a><br/>
						<span>个人信息</span></li>
					<li><a href="/ydwxfx/public/index.php/index/index/shopcat"><img src="/ydwxfx/public/static/images/cart1.png"/></a><br/>
						<span>购物车</span></li>
					<li><a href="/ydwxfx/public/index.php/index/index/open"><img src="/ydwxfx/public/static/images/safe1(1).png"/></a><br/>
						<span>信息安全</span></li>
				</ul>
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
			var user_id="<?php echo $data['user_id']; ?>";
			var token="<?php echo $data['token']; ?>";

			var vm=new Vue({
				el:"#my",
				data:{
					items:null
				}
			});
			
			$(document).ready(function () {
				checkLogin();
				$.ajax({
					url: 'http://localhost/pcwxapi/public/index.php/user/user/getUserInfo',
					data: {
						user_id: user_id,
						user_token: token
					},
					type: 'post',
					success: function (data) {
						var obj=JSON.parse(data)
						vm.items=obj.data;
					},
					error: function () {
						alert('error');
					}
				})
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
