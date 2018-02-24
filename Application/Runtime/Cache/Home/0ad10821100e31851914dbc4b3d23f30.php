<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>优乐-<?php echo ($title); ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="/Public/home/img/x_icon.png">
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="/Public/home/css/reset.css">
    <link rel="stylesheet" href="/Public/home/css/search.css">
    <script type="text/javascript" src="/Public/home/js/jquery-1.8.3.min.js"></script>
    <style>

    a{text-decoration: none}

    </style>
</head>
<body class="bg">
<div class="main">
 

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
        <p class="seach_title">一共为您找到 <span><?php echo count($app_list);?></span> 款 "<span><?php echo ($app_name); ?></span>"相关应用</p>
        <ul class="ul_search">
            <?php if(is_array($app_list)): $i = 0; $__LIST__ = $app_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><li class="search_li">
                   <!--  <img class="search_img" src="/Public/home/img/icon22.png" alt=""> -->
                    <a href="<?php echo U('Market/details',['app_id'=>$arr['gameid']]);?>"><img class="search_img" src="<?php echo (C("OSS_DOMAIN")); echo ($arr['picture']); ?>" alt=""></a>
                    <div class="search_con">
                        <p class="search_title"><?php echo ($arr["name"]); ?></p>
                        <p class="search_font">
                        <?php echo mb_substr(strip_tags($arr['introduce']),0,30,'utf-8');?>...
                        </p>
                       
                    </div>
                    <div class="num">
                        <div class="star">
                            <img src="/Public/home/img/star<?php echo ceil($arr['comment']);?>.png" alt="">
                            <span><?php echo ($arr["comment"]); ?>分</span>
                        </div>
                        <p class="down">


                            <?php if($arr["people"] > 10000): echo sprintf('%.2f', $arr['people']/10000);?> 万
                            <?php else: ?> 
                            <?php echo ($arr["people"]); endif; ?>
                            次下载
                         </p>
                    </div>
                    <a href="<?php echo U('Index/appDownload',['app_id'=>$arr['gameid']]);?>"> <div class="button">立即下载</div> </a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
 
        </ul>
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

 <script type="text/javascript" src="/Public/home/js/search.js"></script>
</html>