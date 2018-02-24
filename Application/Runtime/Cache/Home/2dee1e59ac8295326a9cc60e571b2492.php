<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="/Public/home/img/x_icon.png">
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>优乐-<?php echo ($title); ?></title>
    <link rel="stylesheet" href="/Public/home/css/reset.css">
    <link rel="stylesheet" href="/Public/home/css/market.css">
    <link rel="stylesheet" href="/Public/home/css/idangerous.swiper.css">
     <script type="text/javascript" src="/Public/home/js/jquery-1.8.3.min.js"></script>
    <script src="/Public/home/js/idangerous.swiper.min.js"></script>
    <style>

    a{text-decoration: none}
    .device ,.recommend,.essential{
        width: 100%;
        height: 290px;
        padding: 0px 0px;
        position: relative;
    }
    .recommend,.essential{
        height: 200px;
        padding: 0px 45px;
    }
    .recommend .arrow-left,.essential .arrow-left{
        background: url(/Public/home/img/left.png) no-repeat left top;
        position: absolute;
        left: 10px;
        top: 50%;
        margin-top: -15px;
        width: 20px;
        height: 35px;
    }
    .recommend .arrow-right,.essential .arrow-right {
        background: url(/Public/home/img/right.png) no-repeat left bottom;
        position: absolute;
        right: 10px;
        top: 50%;
        margin-top: -15px;
        width: 20px;
        height: 35px;
    }
    .device .swiper-container {
        height: 290px;
        width: 100%;
    }
    .recommend .swiper-container,.essential .swiper-container{
        height: 200px;
        width: 100%;
    }
    .content-slide {
        padding: 0px;
        color: #fff;
    }
    .title {
        font-size: 25px;
        margin-bottom: 10px;
    }
    .pagination {
        position: absolute;
        left: 0;
        text-align: center;
        bottom:5px;
        width: 100%;
    }
    .swiper-pagination-switch {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 10px;
        background: #999;
        box-shadow: 0px 1px 2px #555 inset;
        margin: 0 3px;
        cursor: pointer;
    }
    .swiper-active-switch {
        background: #fff;
    }
    .pagination{
        /*display: none;*/
        z-index: 1;
    }
    .recommend .pagination, .essential .pagination{
        display: none;
    }
    .use_ul{
        padding: 20px 0px;
    }
        .use_li{
            width: 185px;
        }
    </style>
</head>
<body class="bg">
<div class="main">
   <!-- 头部 -->
     <div class="header">
        <div class="nav">
            <img src="/Public/home/img/icon9.png" alt="">
            <!--<ul class="nav_ul">-->
                <!--<li class="nav_li"><a href="<?php echo U('Index/index');?>">首页</a></li>-->
                <!--<li class="nav_li nav_active"><a href="<?php echo U('Market/index');?>">应用市场</a></li>-->
                <!--<li class="nav_li">客户端下载 <img src="/Public/home/img/icon10.png" alt=""></li>-->
            <!--</ul>-->
            <ul class="nav_ul after">
                <li class="nav_li"><a href="<?php echo U('Index/index');?>">首页</a></li>
                <li class="nav_li nav_active"><a href="<?php echo U('Market/index');?>" >应用市场</a></li>
                <li class="nav_li" id="down">客户端下载 <img src="/Public/home/img/icon28.png" alt="">
                    <div class="hoverm">
                        <div class="hoverm_nav_li">客户端下载 <img src="/Public/home/img/icon7.png" alt=""></div>
                        <!--   <img class="hover_img" src="/Public/home/img/icon27.png" alt=""> -->
                        <img class="hover_img" src="<?php echo ($youle_erweima); ?>" alt="">
                        <p>扫二维码直接下载</p>
                    </div>
                </li>
            </ul>
        </div>
</div>  
   
    <div class="content after">
        <!-- tab after -->
          <div class="tab after">
            <ul class="tab_ul after">
                <li class="tab_li"><a href="<?php echo U('Market/apply',['type'=>recommend]);?>">推荐</a><img src="/Public/home/img/icon11.png"  id='recommend' class="tab_li_img"></li>
                <li class="tab_li "><a href="<?php echo U('Market/apply',['type'=>apply]);?>">应用</a><img src="/Public/home/img/icon11.png" id='apply' class="tab_li_img"></li>
                <li class="tab_li"><a href="<?php echo U('Market/apply',['type'=>game]);?>">游戏</a><img src="/Public/home/img/icon11.png" id='game' class="tab_li_img"></li>
                <li class="tab_li"><a href="<?php echo U('Market/apply',['type'=>banking]);?>">金融</a><img src="/Public/home/img/icon11.png" id='banking' class="tab_li_img"></li>
            </ul>
            <div class="seach">
                <input  list="app-search" placeholder="找应用" class="seach_val">
                <datalist id="app-search"  > 
                 <?php if(is_array($app_name_list)): $i = 0; $__LIST__ = $app_name_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><option value="<?php echo ($arr); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
                </datalist> 
                <img class="seach_img" url="<?php echo U('Market/search');?>" src="/Public/home/img/icon21.png" alt=""> 
            </div>
        </div>  

        <!--<img class="small_banner" src="<?php echo (C("OSS_DOMAIN")); echo ($banner['market']['picture']); ?>" alt="">-->
        <div class="device">
            <a class="arrow-left" href="#"></a>
            <a class="arrow-right" href="#"></a>
            <div class="swiper-container">
                <div class="swiper-wrapper">
            <?php if(is_array($banner['market'])): $i = 0; $__LIST__ = $banner['market'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
                
                        <a href="<?php echo U('Market/details',['app_id'=>$val['appid']]);?>" target="_blank"><img class="small_banner" src="<?php echo (C("OSS_DOMAIN")); echo ($val['picture']); ?>" alt=""></a>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                   <!--  <div class="swiper-slide">
                        <img class="small_banner" src="<?php echo (C("OSS_DOMAIN")); echo ($banner['market']['picture']); ?>" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img class="small_banner" src="<?php echo (C("OSS_DOMAIN")); echo ($banner['market']['picture']); ?>" alt="">
                    </div> -->
                    <!-- <div class="swiper-slide">3</div> -->
                </div>
            </div>
            <div class="pagination"></div>
        </div>
        <div class="nape_title">
            热门推荐
        </div>
        <div class="use_ul after">
            <div class="recommend">
                <a class="arrow-left" href="#"></a>
                <a class="arrow-right" href="#"></a>
                <div class="swiper-container recommend_swiper">
                    <div class="swiper-wrapper">
                     <?php if(is_array($recommend_hot)): $i = 0; $__LIST__ = $recommend_hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
                                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><div class="use_li">
                                        <a href="<?php echo U('Market/details',['app_id'=>$arr['gameid']]);?>" target="_blank"><img src="<?php echo (C("OSS_DOMAIN")); echo ($arr['picture']); ?>" alt=""></a>
                                            
                                         <!--     <p class="user_li_title"> </a><?php echo ($arr["name"]); ?></p>
                                        <a href="<?php echo (C("OSS_DOMAIN")); echo ($arr['apk']); ?>"><div class="button">立即下载</div></a>
 -->

                                        <p class="user_li_title"> </a><?php echo ($arr["name"]); ?></p>
                                        <a href="<?php echo U('Index/appDownload',['app_id'=>$arr['gameid']]);?>"><div class="button">立即下载</div></a>
                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                <div class="pagination"></div>
            </div>
        </div>
        <div class="nape_title">
            精品特辑
        </div>
        <ul class="show_ul after">
            <?php if(is_array($banner['boutique'])): $i = 0; $__LIST__ = $banner['boutique'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i; if($key == 0 ): ?><li class="show_li" style="margin-left: 0px;">
            <?php else: ?>  
            <li class="show_li"  ><?php endif; ?>
                <!-- <li class="show_li" style="margin-left: 0px;"> -->
                    <a href="<?php echo U('Market/details',['app_id'=>$data['appid']]);?>" target="_blank"> <img src="<?php echo (C("OSS_DOMAIN")); echo ($data['picture']); ?>" alt=""></a>
                    <p class="show_title"><?php echo ($data["name"]); ?></p>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <div class="nape_title">
            装机必备
        </div>
        <div class="use_ul after">
            <div class="essential">
                <a class="arrow-left" href="#"></a>
                <a class="arrow-right" href="#"></a>
                <div class="swiper-container essential_swiper">
                    <div class="swiper-wrapper">
                     <?php if(is_array($recommend_necessary)): $i = 0; $__LIST__ = $recommend_necessary;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><div class="use_li">
                                    <a href="<?php echo U('Market/details',['app_id'=>$arr['gameid']]);?>" target="_blank"><img src="<?php echo (C("OSS_DOMAIN")); echo ($arr['picture']); ?>" alt=""></a>
                                    <p class="user_li_title"><?php echo ($arr["name"]); ?></p>
                                    <a href="<?php echo U('Index/appDownload',['app_id'=>$arr['gameid']]);?>"><div class="button">立即下载</div></a>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                <div class="pagination"></div>
            </div>
        </div>
    </div>
    <div class="h_40"></div>
     <div class="footer">
            <p class="footer_font">优乐商店是一款受欢迎的手机助手。是可以作为安卓助手管理设备的软件、游戏、壁纸、铃声资源的下载安装的工具。致力于做一款注重用户体验的安卓助手设备管理软件。</p>
             <p class="footer_font">Copyright © 北京东方时海科技有限公司 版权所有 备案号:京ICP备16001836号-3</p>
           <!--  <p>Copyright © 2014 - 2016 Guangzhou UC Network Technology Co., Ltd. All rights reserved</p> -->
           <!--   <p>Copyright © 北京东方时海科技有限公司 版权所有 备案号:京ICP备16001836号-3</p> -->
            <!-- <p> 北京东方时海科技有限公司版权所有 京ICP备16001836号-3</p> -->
            <!-- <p>京ICP备16001836号-3  </p> -->
        </div> 
</div>
</body>
<script>
  $('.tab_li_img').hide();
     $('#recommend').show();
    $(function(){
        var mySwiper = new Swiper('.swiper-container',{
            pagination: '.device .pagination',
            loop:true,
            autoplay: 3000,
            grabCursor: true,
            paginationClickable: false
        })
//
        var mySwipers = new Swiper('.recommend_swiper',{
            pagination: '.recommend .pagination',
            loop:true,
            paginationClickable: false
        })
        $('.recommend .arrow-left').on('click', function(e){
            e.preventDefault()
            mySwipers.swipePrev()
        })
        $('.recommend .arrow-right').on('click', function(e){
            e.preventDefault()
            mySwipers.swipeNext()
        })
        var mySwiperes = new Swiper('.essential_swiper',{
            pagination: '.essential .pagination',
            loop:true,
            paginationClickable: false
        })
        $('.essential .arrow-left').on('click', function(e){
            e.preventDefault()
            mySwiperes.swipePrev()
        })
        $('.essential .arrow-right').on('click', function(e){
            e.preventDefault()
            mySwiperes.swipeNext()
        })
    })
</script>
 <script type="text/javascript" src="/Public/home/js/search.js"></script>
</html>