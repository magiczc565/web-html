<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"D:\wamp\www\ydwxfx\public/../app/index\view\index\open.html";i:1525500842;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0,user-scalable=0" />
		<link rel="stylesheet" type="text/css" href="/ydwxfx/public/static/css/open.css"/>
		<script src="/ydwxfx/public/static/js/jquery.min.js"></script>
		<script src="/ydwxfx/public/static/js/open.js"></script>
		<title></title>
	</head>
	<body>
		<div id="open">
			<div class="header">
				<h1>申请流程</h1>
				<a href="/ydwxfx/public/index.php/index/index/my" class="back"><span></span></a>
			</div>
			<div class="tysi">
				<div class="tish1">
					<h2>温馨提示：</h2>
					<p>亲，您的VIP达到三级以上，可以开启分销店铺。</p>
					<p>开启分销店铺的注意与流程：</p>
					<p>1、开启分销店铺必须填写本人的手机号码与真实姓名</p>
					<p>2、在您开启的分销店铺中所卖的东西可以获取提成</p>
					<p>3、您店铺中的东西是总店所有物，一切解释权归总店所有</p>
				</div>
			</div>
			<!--
            	
           
			<div id="sq">
				<div class="sq1">
					<div class="name">
						<div class="span">
							<span>店铺名字:</span>
						</div>
						<div class="input">
						<form action="" method="post">
							<input type="text" value=""/>
						</form>
						</div>
					</div>
					<div class="name">
						<div class="span">
							<span>真实姓名:</span>
						</div>
						<div class="input">
						<form action="" method="post">
							<input type="text" value=""/>
						</form>
						</div>
					</div>
					<div class="name">
						<div class="span">
							<span>手机号码:</span>
						</div>
						<div class="input">
						<form action="" method="post">
							<input type="text" value=""/>
						</form>
						</div>
					</div>
					<div class="name">
						<div class="span">
							<span>QQ号码:</span>
						</div>
						<div class="input">
						<form action="" method="post">
							<input type="text" value=""/>
						</form>
						</div>
					</div>
					<div class="tijiao">
						<div class="tijiao1">
						<form action="" method="post">
							<input type="submit" value="提交"/>
						</form>
						</div>
					</div>
				</div>
			</div>
			 -->
            <div class="tj">
	           <form action="" method="post" onsubmit = "return login_check()">  
               <label for="shopname">店铺名字:</label>  
               <input placeholder="" type="text" name="shopname" value="" id="shopname" tabindex="1"/>
               <br/><label for="username">真实姓名:</label>  
               <input placeholder="" type="text" name="username" value="" id="username" tabindex="2"/>  
               <br/><label for="photonum">手机号码:</label>  
               <input placeholder="" type="text" name="photonum" value="" id="photonum" tabindex="3"/> 
               <br/><label for="qqnum">QQ号码:</label>
               <input placeholder="" type="text" name="qqnum" value="" id="qqnum" tabindex="4" />  
               <br/><button type="submit" class="flatbtn-blu"  tabindex="3" >提交</button>  
		    </div>
		</div>
	</body>
</html>
