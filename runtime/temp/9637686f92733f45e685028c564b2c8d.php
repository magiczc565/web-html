<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"E:\phpstudy\PHPTutorial\WWW\ydwxfx2\public/../app/index\view\index\goods2.html";i:1526569117;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0,user-scalable=0"/>
    <link rel="stylesheet" type="text/css" href="/ydwxfx2/public/static/css/goods2.css">
    <script src="/ydwxfx2/public/static/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/ydwxfx2/public/static/js/allgoods.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <title></title>
</head>
<body>
<div id="showGoods">
    <div id="shop-all">
        <div id="head">
            <div class="head-center">
                <div class="head-img">
                    <img src="/ydwxfx/public/static/images/sousuo.png">
                </div>

                <div class="head-input">
                    <form action="" method="post">
                        <input type="search" id="search-input" value placeholder="寻找你喜欢的商品" maxlength="20">
                    </form>
                </div>
                <a href="/ydwxfx2/public/index/index/goods1" class="back"><span></span></a>
            </div>
        </div>
        <div class="saixuan">
            <div class="option">
                <p>
                    综合
                </p>
            </div>
            <div id="saleSort" @click="setSaleSort">
                <div class="option" id="sales">
                    <p>
                        销量
                    </p>
                </div>
                <div class="up-down">
                    <p class="num" style="display: none;">1</p>
                    <div class="up1">
                        <img src="/ydwxfx/public/static/images/up2.png" id="up1"/>
                    </div>
                    <div class="down1">
                        <img src="/ydwxfx/public/static/images/down2.png" id="down1"/>
                    </div>
                </div>
            </div>
            <div @click="setPriceSort">
                <div class="option" id="price-x" >
                    <p>价格</p>
                </div>
                <div class="up-down">
                    <p class="number" style="display: none;">1</p>
                    <div class="up2">
                        <img src="/ydwxfx/public/static/images/up2.png" id="up2"/>
                    </div>
                    <div class="down2">
                        <img src="/ydwxfx/public/static/images/down2.png" id="down2"/>
                    </div>
                </div>
            </div>
            <div class="option" id="dressing">
                <p>
                    筛选
                </p>
            </div>
        </div>
        <div v-for="item in items">
            <div id="shop">
                <div class="product">
                    <a :href="'/ydwxfx2/public/index/index/shopitems?goods_id='+item.id+'&seller_id='+item.seller_id"><img id="ptimg"
                                                                                                       :src="item.iconimage_src"/></a>
                    <div class="items">
                        <div id="jieshao">
                            {{item.describe}}
                        </div>
                        <p id="price">￥{{item.price}}
                            <a :href="'/ydwxfx2/public/index/index/shopitems?goods_id='+item.id+'&seller_id='+item.seller_id">立即购买</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dressing">
        <div class="hide1">
            <p>点击此处进行隐藏</p>
        </div>
        <div class="price-region">
            <p class="price-r">价格范围</p>
            <div class="price-region1">
                <ul>
                    <li class="active"><p>0-150</p></li>
                    <li><p>150-300</p></li>
                    <li><p>300以上</p></li>
                </ul>
            </div>
            <div class="price-reg">
                <input type="text" id="price-min" value=""/>
                <p>元--</p>
                <input type="text" id="price-max" value=""/>
                <p>元</p>
            </div>
            <p class="kind">种类</p>
            <div class="left-menu">
                <ul>
                    <li class="active"><p>女装</p></li>
                    <li><p>女鞋</p></li>
                    <li><p>男装</p></li>
                    <li><p>男鞋</p></li>
                    <li><p>内衣</p></li>
                    <li><p>母婴</p></li>
                    <li><p>手机</p></li>
                    <li><p>数码</p></li>
                    <li><p>家电</p></li>
                    <li><p>美妆</p></li>
                    <li><p>箱包</p></li>
                    <li><p>运动</p></li>
                    <li><p>户外</p></li>
                    <li><p>家装</p></li>
                </ul>
            </div>
            <input type="submit" id="true-dress" name="" value="确定"/>
        </div>
    </div>
</div>
<script>

    var vm = new Vue({
        el: "#showGoods",
        data: {
            items: null,
            seller_id: "<?php echo $data['seller_id']; ?>",
            sortType: "<?php echo $data['sortType']; ?>",
            offset: 1,
            searchText: "<?php echo $data['searchText']; ?>"
        },
        methods: {
            setPriceSort: function () {
                if ("<?php echo $data['sortType']; ?>" == "priceUp") {
                    vm.sortType = "priceDown"
                } else if ("<?php echo $data['sortType']; ?>" == "priceDown") {
                    vm.sortType = "priceUp"
                } else {
                    vm.sortType = "priceDown"
                }
                vm.doPostData();
            },
            setSaleSort: function () {
                if ("<?php echo $data['sortType']; ?>" == "hotSaleUp") {
                    vm.sortType = "hotSaleDown"
                } else if ("<?php echo $data['sortType']; ?>" == "hotSaleDown") {
                    vm.sortType = "hotSaleUp"
                } else {
                    vm.sortType = "hotSaleDown"
                }

                vm.doPostData();
            },
            doPostData: function () {
                var data = "?sortType=" + vm.sortType + "&searchText=" + vm.searchText;
                window.location.href = "http://localhost/ydwxfx/public/index.php/index/index/goods2" + data;
            },
            doReadyAjax: function () {
                $.ajax({
                    url: "http://localhost/pcwxapi/public/index.php/index/index/getGoodsOrSearch",
                    data: {
                        seller_id: "<?php echo $data['seller_id']; ?>",
                        sortType: "<?php echo $data['sortType']; ?>",
                        searchText: "<?php echo $data['searchText']; ?>"
                    },
                    success: function (data) {
                        var obj = JSON.parse(data)
                        vm.items = obj.data;
                        vm.changeSalePic();
                        vm.changePricePic();
                    }
                })
            },
            changeSalePic: function () {
                if ("<?php echo $data['sortType']; ?>" == "hotSaleDown") {
                    $("#down1").show();
                    $("#up1").hide();
                } else if ("<?php echo $data['sortType']; ?>" == "hotSaleUp") {
                    $("#up1").show();
                    $("#down1").hide();
                } else {
                    $("#up1").show();
                    $("#down1").show();
                }
            },
            changePricePic: function () {
                if ("<?php echo $data['sortType']; ?>" == "priceDown") {
                    $("#down2").show();
                    $("#up2").hide();
                } else if ("<?php echo $data['sortType']; ?>" == "priceUp") {
                    $("#up2").show();
                    $("#down2").hide();
                } else {
                    $("#up2").show();
                    $("#down2").show();
                }
            }
        }
    });

    $(document).ready(function () {
        vm.doReadyAjax();
    });
</script>
</body>
</html>
