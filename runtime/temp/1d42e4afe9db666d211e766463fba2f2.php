<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"E:\phpstudy\PHPTutorial\WWW\ydwxfx\public/../app/index\view\index\shopitems.html";i:1528235344;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0,user-scalable=0"/>
    <link rel="stylesheet" type="text/css" href="/ydwxfx/public/static/css/shopitem.css"/>
    <link rel="stylesheet" href="/ydwxfx/public/static/css/pageSwitch.min.css">
    <script src="/ydwxfx/public/static/js/jquery.min.js" type="text/javascript"></script>
    <script src="/ydwxfx/public/static/js/shopitem.js" type="text/javascript"></script>
    <script src="/ydwxfx/public/static/js/common.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <title>商品详情</title>
</head>
<body>
<div id="shopitem">
    <div id="app">
        <div id="all">
            <div class="lubbo">
                <div id="container">
                    <div class="sections">
                        <div class="section" id="section0"></div>
                        <div class="section" id="section1"></div>
                        <div class="section" id="section2"></div>
                        <div class="section" id="section3"></div>
                    </div>
                </div>
            </div>
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
            <div id="items">
                <div class="jieshao">
                    {{items.describe}}
                </div>
                <p class="price">￥ {{ items.price }} </p>
            </div>
            <div class="xiangqing">
                <p>商品规格：</p>
                <img src="/ydwxfx/public/static/images/shenglue.png" @click='showGuiGe'/>
            </div>
            <div class="jsao">
                <p>评论</p>
            </div>
            <div class="pinglun1">
                <div class="pinglun1-img">
                    <img src="/ydwxfx/public/static/images/pic.png"/>
                </div>
                <div class="pinglun2">
                    <p>衣服很好看，质量好</p>
                </div>
            </div>
            <div class="jinru">
                <input type="button" id="GetComment" value="进入评论区" @click='showComments'/>
            </div>
            <div class="jsao">
                <p>详细</p>
            </div>
            <div class="image_show" v-for="src in items.goods_detail_image_src">
                <img :src="src"/>
            </div>
        </div>
        <div class="buy">
            <div class="value">
                <img class="value-img" :src="items.goods_detail_image_src[0]">
                <div class="buy-head">
                    <div class="mes">
                        <p id="price">{{items.price}}</p>
                        <p class="huo">有货</p>
                        <p>规格：</p>
                        <div id="mainSelect" class="divMain">
                            <p class="yese1">颜色</p>
                            <p class="chima1">尺码</p>
                        </div>
                    </div>
                    <div class="hide-img">
                        <img class="hide" src="/ydwxfx/public/static/images/hide.png" @click="hide">
                    </div>
                </div>
            </div>
            <div class="buy-all">
                <div class="specifications" style="height: auto;width: inherit"
                     v-for="(column,index1) in items.columns">
                    <br><br>
                    <p>{{column[0]}}</p><br>
                    <div class="color-all" style="height: auto">
                        <ul v-for="(item,index2) in column" class="ul-specifications">
                            <li v-if="index2 > 0"><p :class="'item_'+index1"
                                                     @click="activeButton('item_'+index1,$event)">{{item}}</p></li>
                        </ul>
                    </div>
                    <br>
                </div>
                <div class="num" style="width: inherit"><br>
                    <p style="text-align: left">购买数量</p>
                    <div class="shop-arithmetic" style="width: inherit;text-align: center;float: left">
                        <div style="width: 200px;margin: auto">
                            <a href="javascript:;" class="minus" @click="reduceNum"><img src="/ydwxfx/public/static/images/minus.png"/>
                            </a>
                            <span id="quantity" class="number">1</span>
                            <a href="javascript:;" class="plus" @click="addNum"><img src="/ydwxfx/public/static/images/add.png"/></a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="q-g">
                <a @click="doAddCart"><p>加入购物车</p></a>
            </div>
            <div class="q-l">
                <a @click="doBuyGoods"><p>确定</p></a>
            </div>
        </div>
        <div id="shopitem-button">
            <div class="shopitem-img">
                <ul>
                    <li><img src="/ydwxfx/public/static/images/pic.png"><br/><span>收藏</span></li>
                    <li><img src="/ydwxfx/public/static/images/pic.png"><br/><span>收藏</span></li>
                    <li><img src="/ydwxfx/public/static/images/pic.png"><br/><span>收藏</span></li>
                </ul>
            </div>
            <div class="buy2-all">
                <div class="join" @click='showAddCatDiv'>
                    <p>加入购物车</p>
                </div>
                <div class="buy-xuanzhe" @click='showToBuyDiv'>
                    <p>立即购买</p>
                </div>
            </div>
        </div>
        <div id="jinrup">
            <div class="pinglun-all">
                <div class="header">
                    <h1>评论区</h1>
                    <a href="" class="back"><span class="back1"></span></a>
                </div>
                <div class="pinglun-me" v-for="comment in comments">
                    <div class="pinglun3" style="height: auto;">
                        <p>{{comment.username}}</p><br>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{comment.review}}</p>
                        <p style="text-align: right">{{comment.crate_date}}</p>
                    </div>
                </div>
            </div>
            <div class="pinglun-pin">
                <input type="text" name="" id="text" value placeholder="发表你的评论"/>
                <input type="submit" id="submit" name="" value="发送"/>
            </div>
        </div>
    </div>
</div>
<script>
    $(".color-all li").click(function () {
        $(this).addClass("active").siblings().removeClass("active");
    });
    $(document).ready(function () {
        var vm = new Vue({
            el: '#app',
            data: {
                items: null,
                comments: null,
                show1: null,
                show2: null
            },
            methods: {
                showGuiGe: function () {
                    $("#shopitem-button").hide();
                    $("#all").hide();
                    $(".buy").show();
                    $(".q-g").show();
                },
                hide: function () {
                    $(".buy").hide();
                    $("#all").show();
                    $(".q-l").hide();
                    $(".q-g").hide();
                    $("#shopitem-button").show();
                },
                showComments: function () {
                    $("#all").hide();
                    $("#jinrup").show();
                    $(".pinglun-pin").show();
                    $("#shopitem-button").hide();
                },
                showAddCartDiv: function () {
                    $("#shopitem-button").hide();
                    $("#all").hide();
                    $(".buy").show();
                    $(".q-g").show();
                },
                addNum: function (event) {
                    var ele = $("#quantity");
                    ele.text(parseInt(ele.text()) + 1);
                    if (parseInt(ele.text()) <= 1) {
                        $("#quantity").text("1");
                    }
                },
                reduceNum: function () {
                    var ele = $("#quantity");
                    ele.text(parseInt(ele.text()) - 1);
                    if (parseInt(ele.text()) <= 1) {
                        $("#quantity").text("1");
                    }
                },
                activeButton: function (className, event) {
                    var el = event.currentTarget;
                    var str = "." + className;
                    $(str).removeClass('active');
                    $(el).addClass('active');
                },
                showAddCatDiv: function () {
                    $("#shopitem-button").hide();
                    $("#all").hide();
                    $(".buy").show();
                    $(".q-g").show();
                },
                showToBuyDiv: function () {
                    $("#shopitem-button").hide();
                    $("#all").hide();
                    $(".buy").show();
                    $(".q-l").show();
                },
                doAddCart: function () {
                    var activeArray = $("p.active");
                    var specifications = "";
                    for (var i = 0; i < activeArray.length; i++) {
                        specifications = activeArray[i].innerHTML + '=' + specifications;
                    }
                    var quantity = $("#quantity").text();
                    var ul_items = $(".specifications");

                    if (activeArray.length != ul_items.length) {
                        alert("请先选择商品规格");
                    }else if ("<?php echo $data['user_id']; ?>"=="") {
                        window.location.href="http://localhost/ydwxfx/public/index.php/index/index/login";
                    } else {
                        $.ajax({
                            url: "http://localhost/pcwxapi/public/index.php/user/user/createOrder",
                            data: {
                                goods_id: "<?php echo $data['gid']; ?>",
                                specifications: specifications,
                                quantity: quantity,
                                user_id: "<?php echo $data['user_id']; ?>",
                                user_token: "<?php echo $data['token']; ?>",
                                orderType: "G"
                            },
                            type: 'post',
                            success: function (data) {
                                var obj = JSON.parse(data);
                                if (obj.code == '0') {
                                    alert(obj.msg);
                                    vm.hide();
                                }
                            },
                            error: function () {
                                alert('error');
                            }
                        })
                    }

                },
                doBuyGoods: function () {
                    var activeArray = $("p.active");
                    var specifications = "";
                    for (var i = 0; i < activeArray.length; i++) {
                        specifications = activeArray[i].innerHTML + '=' + specifications;
                    }
                    var quantity = $("#quantity").text();

                    var ul_items = $(".specifications");
                    if (activeArray.length != ul_items.length) {
                        alert("请先选择商品规格");
                    } else if ("<?php echo $data['user_id']; ?>"=="") {
                        window.location.href="http://localhost/ydwxfx/public/index.php/index/index/login";
                    }
                    else {
                        $.ajax({
                            url: "http://localhost/pcwxapi/public/index.php/user/user/createOrder",
                            data: {
                                goods_id: "<?php echo $data['gid']; ?>",
                                specifications: specifications,
                                quantity: quantity,
                                user_id: "<?php echo $data['user_id']; ?>",
                                user_token: "<?php echo $data['token']; ?>"
                            },
                            type: 'post',
                            success: function (data) {
                                var obj = JSON.parse(data);
                                if (obj.code == '0') {
                                    alert('下单成功');
                                window.location.href="http://localhost/ydwxfx/public/index.php/index/pay/";
                                }
                            },
                            error: function () {
                                alert('error');
                            }
                        })
                    }

                }
            }
        });
        $.ajax({
            url: 'http://localhost/pcwxapi/public/index.php/index/index/getProductDetail',
            data: {
                goods_id: "<?php echo $data['gid']; ?>",
                seller_id: "<?php echo $data['sid']; ?>"
            },
            type: 'post',
            success: function (data) {
                var obj = JSON.parse(data);
                vm.items = obj.data;
            },
            error: function () {
                alert('error');
            }
        });
        $.ajax({
            url: 'http://localhost/pcwxapi/public/index.php/index/index/getreviewgoods',
            data: {
                goods_id: "<?php echo $data['gid']; ?>"
            },
            type: 'post',
            success: function (data) {
                var obj = JSON.parse(data);
                vm.comments = obj.data;
            },
            error: function () {
                alert('error');
            }
        })
    })
</script>
</body>
</html>
