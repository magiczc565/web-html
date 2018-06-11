<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"D:\wamp\www\ydwxfx\public/../app/index\view\index\shopcat.html";i:1526546199;}*/ ?>
﻿<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0,user-scalable=0"/>
    <title>购物车商品结算</title>

    <script type="text/javascript" src="/ydwxfx/public/static/js/jquery.min.js"></script>
    <script type="text/javascript" src="/ydwxfx/public/static/js//shopping.js"></script>
    <script src="/ydwxfx/public/static/js/common.js"></script>
    <script src="/ydwxfx/public/static/js/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <link type="text/css" rel="stylesheet" href="/ydwxfx/public/static/css/base.css"/>
    <link type="text/css" rel="stylesheet" href="/ydwxfx/public/static/css/module.css"/>

</head>
<body>
<div class="header">
    <h1>购物车</h1>
    <a href="/ydwxfx/public/index.php/index/index/index" class="back"><span></span></a>
    <a href="#" class=""></a>
</div>
<!--头部结束-->
<div id="shoppingCartDiv" class="shopping">

    <div class="shop-group-item">
        <div class="shop-name">
            <div class="coupons"><span @click="doDeleteCart">删除</span></div>
        </div>
        <ul>
            <li>
                <div class="shop-info" v-for="item in items">
                    <input name="checkbox" type="checkbox" class="check goods-check goodsCheck" :value="item.cat_id"  @click="getAllPrice">
                    <div class="shop-info-img"><a href="#"><img :src="item.iconimage_src"/></a></div>
                    <div class="shop-info-text">
                        <h4>{{item.describe}}</h4>
                        <div class="shop-brief"><span>{{item.specifications.replace(/=/g,' ')}}</span></div>
                        <div class="shop-price">
                            <div class="shop-pices">￥<b class="price">{{item.total_price}}</b></div>
                            <div class="shop-arithmetic">
                                <a href="javascript:;" class="minus" @click="reduceNum(item.cat_id);getAllPrice()">-</a>
                                <span :id="'num'+item.cat_id" class="num">{{item.quantity}}</span>
                                <a href="javascript:;" class="plus" @click="addNum(item.cat_id);getAllPrice()">+</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="payment-bar">
        <div class="all-checkbox"><input id="allChecked" type="checkbox" class="check goods-check" @click="setAllCheck">全选</div>
        <div class="shop-total">
            <strong>总价：<i id="total_price" class="total" id="AllTotal">0.00</i></strong>
            <span>减免：123.00</span>
        </div>
        <a class="settlement" @click="doAddCart">结算</a>
    </div>
</div>
<script>
    var user_id = "<?php echo $data['user_id']; ?>";
    var token = "<?php echo $data['token']; ?>";
    var vm = new Vue({
        el: "#shoppingCartDiv",
        data: {
            items: null
//            specifications_str:null
        },
        methods: {
            doDeleteCart: function () {
                var checkedEle = $("input[name='checkbox']:checked");
                var id_str = "";
                for (var i = 0; i < checkedEle.length; i++) {
                    id_str = checkedEle[i].value + "@"+id_str;
                }
                if(checkedEle.length>0&&confirm('是否从购物车中删除改商品？')){
                    $.ajax({
                        url: "http://localhost/pcwxapi/public/index.php/user/user/deleteCartGoods",
                        data: {
                            user_id: user_id,
                            user_token: token,
                            id_str:id_str
                        },
                        type: "post",
                        success: function (data) {
                            var Obj = JSON.parse(data);
                            if (Obj.code == "0") {
                                window.location.href="http://localhost/ydwxfx/public/index.php/index/index/shopcat";
                            }
                        }
                    })
                }
            },
            getCart: function () {
                if (user_id != "" && token != "") {
                    $.ajax({
                        url: 'http://localhost/pcwxapi/public/index.php/user/user/getCreateOrderInfo',
                        data: {
                            user_id: "<?php echo $data['user_id']; ?>",
                            user_token: "<?php echo $data['token']; ?>",
                            orderType: "G"
                        },
                        type: 'post',
                        success: function (data) {
                            var obj = JSON.parse(data);
                            if (obj.code == '0') {
                                vm.items = obj.data.cat_goods;
//                                var str=obj.data.cat_goods.specifications;
//                                vm.specifications_str = specArray[0]+' '+specArray[1];
                            }
                        },
                        error: function () {
                            alert("error");
//                    window.location.href="";
                        }
                    })
                } else {
                    checkLogin(user_id, token);
                }
            },
            getAllPrice:function () {
                var checkedEle = $(".shop-info");
                var totalPrice=0.00;

                for (var i = 0; i < checkedEle.length; i++) {
                    console.log($(checkedEle[i]));
                    var priceNode=$(checkedEle[i]).find("input[name='checkbox']:checked");
                    if(priceNode.length==1){
                        var bNode=$(checkedEle[i]).find("b.price");
                        var quantityNode=$(checkedEle[i]).find("span.num");
                        totalPrice=totalPrice+parseInt(bNode.text())*parseInt(quantityNode.text());
                    }
                }
                $("#total_price").text(totalPrice);
            },
            setAllCheck:function (event) {

                var el=event.currentTarget;
                if(el.checked){
                    $("input[name='checkbox']").prop("checked", true);
                }else{
                    $("input[name='checkbox']").prop("checked", false);
                }
                vm.getAllPrice();
            },
            addNum: function (id) {
                var str="#num"+id;
                var ele = $(str);
                ele.text(parseInt(ele.text()) + 1);
                if (parseInt(ele.text()) <= 1) {
                    $(str).text("1");
                }
            },
            reduceNum: function (id) {
                var str="#num"+id;
                var ele = $(str);
                ele.text(parseInt(ele.text()) - 1);
                if (parseInt(ele.text()) <= 1) {
                    $(str).text("1");
                }
            },
            doAddCart:function () {
                var checkedEle = $(".shop-info");
                var id_count='';
                for (var i = 0; i < checkedEle.length; i++) {
                    var priceNode=$(checkedEle[i]).find("input[name='checkbox']:checked");
                    if(priceNode.length==1){
                        var id=$(priceNode).val();
                        var num=$(checkedEle[i]).find("span.num").text();
                        id_count=id+"="+num+"@"+id_count;
                    }
                }
                if(id_count.length>0){
                    $.ajax({
                        url: "http://localhost/pcwxapi/public/index.php/user/user/createOrder",
                        data: {
                            catString: id_count,
                            user_id: "<?php echo $data['user_id']; ?>",
                            user_token: "<?php echo $data['token']; ?>"
                        },
                        type: 'post',
                        success: function (data) {
                            var obj = JSON.parse(data);
                            if (obj.code == '0') {
//                                var str="http://localhost/ydwxfx/public/index.php/index/index/pay?order_account="+data.data.order_account;
                                window.location.href="http://localhost/ydwxfx/public/index.php/index/index/pay?order_account="+obj.data.order_account;
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
    $(document).ready(function () {
        vm.getCart();
    });
</script>
</body>
</html>

