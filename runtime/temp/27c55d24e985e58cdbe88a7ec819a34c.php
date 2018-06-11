<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:58:"D:\wamp\www\ydwxfx\public/../app/index\view\index\pay.html";i:1526549852;}*/ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0,user-scalable=0"/>
    <link rel="stylesheet" href="/ydwxfx/public/static/css/pay.css">
    <script src="/ydwxfx/public/static/js/jquery.min.js" type="text/javascript"></script>
    <script src="/ydwxfx/public/static/js/pay.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <title></title>
</head>
<body>
<div id="payDiv">
    <div class="pay">
        <div v-for="address in items.receiving_address">
            <div class="head" v-if="address.isdefault_address == 1" >
                <div class="head-img">
                    <img src="/ydwxfx/public/static/images/revise.png"/>
                </div>
                <div class="midd">
                    <div class="peo">
                        <span>收件人：</span>
                        <p class="name">{{address.receiving_name}}</p>
                        <p class="photo">{{address.phone_number}}</p>
                    </div>
                    <div class="dizi">
                        <span>收货地址：</span>
                        <p class="address">{{address.address_region+' '+address.address_region}}</p>
                    </div>
                </div>
                <div class="head-img" @click="showAddress">
                    <img src="/ydwxfx/public/static/images/right.png"/>
                </div>
            </div>
        </div>
        <div class="shop">
            <div class="shop-name">
                <img src="/ydwxfx/public/static/images/pic.png"/>
                <p class="shop-n">张川的总店</p>
            </div>
            <div class="shop-u" v-for="(item,index) in items.order_goods">
                <div class="shop-a">
                    <input name='checkbox' type="checkbox" class="goodsCheck" @click="getAllPrice">
                    <div class="shop-b">
                        <a href="/ydwxfx/public/index.php/index/index/shopitems?goods_id=' + item.id">
                            <img :src="item.iconimage_src"/>
                        </a>
                    </div>
                    <div class="shop-c">
                        <p> {{item.describe}}</p>
                    </div>
                    <div class="shop-num">
                        <span>￥</span><span class="price">{{item.total_price}}</span>
                    </div>
                </div>
                <div class="num">
                    <div class="num-a">
                        <p>购买数量</p>
                    </div>
                    <div class="count">
                        <span :id="'number_'+index" class="number">{{item.quantity}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="botton">
            <div class="jg">
                <strong>总金额：<i class="total" id="AllTotal">0.00</i></strong>
            </div>
            <div class="tijiao" @click="pay">
                <p>
                    提交订单
                </p>
            </div>
        </div>
    </div>
    <div class="revise">
        <div class="header">
            <h1>勾选地址</h1>
            <a href="" class="back"><span></span></a>
        </div>
        <div class="add" v-for="address in items.receiving_address">
            <ul>
                <li>
                    <div class="box">
                        <input type="checkbox" class="check" :value="address.id">
                    </div>
                    <div class="address1">
                        地&nbsp&nbsp&nbsp区：<p>{{address.address_region+' '+address.address_region}}</p>
                        接收人：<p>{{address.receiving_name}}</p>
                        手机号：<p>{{address.phone_number}}</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    var user_id = "<?php echo $data['user_id']; ?>";
    var token = "<?php echo $data['token']; ?>";
    var order_account = "<?php echo $data['order_account']; ?>";

    var vm = new Vue({
        el: "#payDiv",
        data: {
            items: null
        },
        methods: {
            addNum: function (id) {
                var str = "#number_" + id;
                var ele = $(str);
                ele.text(parseInt(ele.text()) + 1);
                if (parseInt(ele.text()) <= 1) {
                    $(str).text("1");
                }
            },
            reduceNum: function (id) {
                var str = "#number_" + id;
                var ele = $(str);
                ele.text(parseInt(ele.text()) - 1);
                if (parseInt(ele.text()) <= 1) {
                    $(str).text("1");
                }
            },
            getAllPrice: function () {
                var checkedEle = $(".shop-u");
                var totalPrice = 0.00;
//                console.log(checkedEle.length);
                for (var i = 0; i < checkedEle.length; i++) {

                    var priceNode = $(checkedEle[i]).find("input[name='checkbox']:checked");
                    console.log(priceNode.length);
                    if (priceNode.length == 1) {
                        var bNode = $(checkedEle[i]).find("span.price");
                        totalPrice = totalPrice + parseInt(bNode.text());
                    }
                }
                $("#AllTotal").text(totalPrice);
            },
            showAddress: function () {
                $(".revise").show();
                $(".pay").hide();
            },
            pay:function () {
                $.ajax({
                    url: 'http://localhost/pcwxapi/public/index.php/user/user/pay',
                    data: {
                        user_id: user_id,
                        user_token: token,
                        order_account: order_account,
                        note_message:''
                    },
                    type: 'post',
                    success: function (data) {
                        var obj = JSON.parse(data);
                        if (obj.code == '0') {
                            alert('支付成功');
                            window.location.href="http://localhost/ydwxfx/public/index.php/index/index/myvip";
                        }
                    },
                    error: function (data) {
                        alert('error');
                    }
                })
            }
        }
    });

    $(document).ready(function () {
        if (user_id != "" && token != "") {
            $.ajax({
                url: 'http://localhost/pcwxapi/public/index.php/user/user/getCreateOrderInfo',
                data: {
                    user_id: user_id,
                    user_token: token,
                    order_account: order_account
                },
                type: 'post',
                success: function (data) {
                    var obj = JSON.parse(data);
                    if (obj.code == '0') {
                        vm.items = obj.data;
                    }
                },
                error: function (data) {
                    alert('error');
                }
            })
        } else {
            window.location.href = 'http://localhost/ydwxfx/public/index.php/index/index/login';
        }
    });

</script>
</body>
</html>
