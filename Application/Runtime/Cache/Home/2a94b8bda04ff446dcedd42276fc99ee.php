<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="/Public/home/img/x_icon.png">
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>优乐-<?php echo ($title); ?></title>
  
    <link rel="stylesheet" href="/Public/home/css/reset.css">
    <link rel="stylesheet" href="/Public/home/css/index.css">
     <script type="text/javascript" src="/Public/home/js/jquery-1.8.3.min.js"></script>
     <style>
     a{text-decoration: none}
     
    .small{
        height:362px;
        width:560px;
    }
    .item_img{
        height:60px;
        width:60px;
    }

    </style>
</head>
<body>
    <div class="main">
        <div class="banner">
            <div class="header">
                <div class="nav after">
                    <img src="/Public/home/img/logo.png" alt="">
                    <ul class="nav_ul after">
                        <li class="nav_li">首页</li>
                        <li class="nav_li"><a href="<?php echo U('Market/index');?>" >应用市场</a></li>
                        <li class="nav_li" id="down">客户端下载 <img src="/Public/home/img/icon7.png" alt="">
                            <div class="hoverm">
                                <div class="hoverm_nav_li">客户端下载 <img src="/Public/home/img/icon7.png" alt=""></div>
                              <!--   <img class="hover_img" src="/Public/home/img/icon27.png" alt=""> -->
                                <img class="hover_img" src="<?php echo ($youle_erweima); ?>" alt="">
                                <p>扫二维码直接下载</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="banner_con after">
                    <div class="banner_con_left">
                       <!--  <img class="banner1" src="/Public/home/img/banner1.png" alt=""> -->
                         <img class="banner1" src="/Public/home/img/youle1.png" alt="">
                       <!--  <img class="banner2" src="/Public/home/img/banner2.png" alt=""> -->
                        <img class="banner2" src="/Public/home/img/youle2.png" alt="">
                    </div>
                    <div class="banner_con_right after">
                        <div class="banner_con_first after">
                            <img class="small_logo" src="/Public/home/img/small_logo.png" alt="">
                            <div class="font after">
                                <p class="font_first">优乐商店V1.2.3</p>
                                <p class="font_sen">2015.12.22    V1.2.3   10M</p>
                            </div>
                            <img class="small_logo1" src="/Public/home/img/android.png" alt="">
                        </div>
                        <div class="banner_hint">
                            满足你的百变需要
                        </div>
                        <div class="banner_down">
                            <a href="<?php echo ($youle_url); ?>" download><img src="/Public/home/img/download.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content after">
            <div class="game_li" style="height: 656px;">
                <p class="game_title"><?php echo ($banner['small'][0]['banner_name']); ?></p> 

                <!-- <p class="game_hint_font">优乐商店·  <?php echo date("m",$banner['small'][0]['time']);?>  月<?php echo date("d",$banner['small'][0]['time']);?>日</p> -->

                <p class="game_hint"><?php echo mb_substr(strip_tags($banner['small'][0]['app_introduce']),0,20,'utf-8');?>...</p>
                <!-- <img class="game_img" src="/Public/home/img/icon1.png" alt=""> -->

                <a href="<?php echo U('Market/details',['app_id'=>$banner['small'][0]['app_id']]);?>" target="_blank">
                <img class="game_img small"  src="<?php echo (C("OSS_DOMAIN")); echo ($banner['small'][0]['bannner']); ?>" alt="">
                </a>
                <div class="game_item after">
                   <a href="<?php echo U('Market/details',['app_id'=>$banner['small'][0]['app_id']]);?>" target="_blank"> <img class="item_img" src="<?php echo (C("OSS_DOMAIN")); echo ($banner['small'][0]['apk_icon']); ?>" alt=""></a>
                    <div class="game_item_font">

                        <p class="item_title"><a href="<?php echo U('Market/details',['app_id'=>$banner['small'][0]['app_id']]);?>" target="_blank"><?php echo ($banner['small'][0]['app_name']); ?></a></p>
                        <p class="item_tit"><?php echo ($banner['small'][0]['apk_size']); ?>M</p>
                    </div>
                   <!--  <a href="<?php echo (C("OSS_DOMAIN")); echo ($banner['small'][0]['apk']); ?>"><div class="down_btn">立即下载</div></a> -->
                     <a href="<?php echo U('Index/appDownload',['app_id'=>$banner['small'][0]['app_id']]);?>"><div class="down_btn">立即下载</div></a>
                </div>
            </div>
            <div class="game_li right_padding" style="height: 656px;">
                <p class="game_title"><?php echo ($banner['small'][1]['banner_name']); ?></p>

                <!-- <p class="game_hint_font">优乐商店· <?php echo date("m",$banner['small'][1]['time']);?>  月<?php echo date("d",$banner['small'][1]['time']);?>日</p> -->

                <p class="game_hint"><?php echo mb_substr(strip_tags($banner['small'][1]['app_introduce']),0,20,'utf-8');?>...</p>

                <a href="<?php echo U('Market/details',['app_id'=>$banner['small'][1]['app_id']]);?>" target="_blank">
                <img class="game_img small" src="<?php echo (C("OSS_DOMAIN")); echo ($banner['small'][1]['bannner']); ?>" alt="">
                </a>
                <div class="game_item after">
                <a href="<?php echo U('Market/details',['app_id'=>$banner['small'][1]['app_id']]);?>" target="_blank">
                    <img class="item_img" src="<?php echo (C("OSS_DOMAIN")); echo ($banner['small'][1]['apk_icon']); ?>" alt=""></a>
                    <div class="game_item_font">
                        <p class="item_title"><a href="<?php echo U('Market/details',['app_id'=>$banner['small'][1]['app_id']]);?>" target="_blank"><?php echo ($banner['small'][1]['app_name']); ?></a></p>
                        <p class="item_tit"><?php echo ($banner['small'][1]['apk_size']); ?>M</p>
                    </div>
                    <a href="<?php echo U('Index/appDownload',['app_id'=>$banner['small'][1]['app_id']]);?>"><div class="down_btn">立即下载</div></a>
                </div>
            </div>
        </div>
        <div class="big_game_li after">
            <p class="game_title"><?php echo ($banner['big']['banner_name']); ?></p>

            <!-- <p class="game_hint_font">
            优乐商店·<?php echo date("m",$banner['big']['time']);?>  月<?php echo date("d",$banner['big']['time']);?>日</p> -->

            <p class="game_hint"><?php echo mb_substr(strip_tags($banner['big']['app_introduce']),0,30,'utf-8');?>...</p>
         <!--    <img class="game_img"   src="/Public/home/img/icon5.png" alt=""> -->
         <a href="<?php echo U('Market/details',['app_id'=>$banner['big']['app_id']]);?>" target="_blank">
             <img class="game_img"   src="<?php echo (C("OSS_DOMAIN")); echo ($banner['big']['bannner']); ?>" alt="">
			 </a>

            <div class="game_item after" style="width: 100%">
            <a href="<?php echo U('Market/details',['app_id'=>$banner['big']['app_id']]);?>" target="_blank">
                <img class="item_img" src="<?php echo (C("OSS_DOMAIN")); echo ($banner['big']['apk_icon']); ?>" alt=""></a>
                <div class="game_item_font">
                    <p class="item_title">

                    <a href="<?php echo U('Market/details',['app_id'=>$banner['big']['app_id']]);?>" target="_blank"><?php echo ($banner['big']['app_name']); ?></a></p>
                    <p class="item_tit"><?php echo ($banner['big']['apk_size']); ?>M</p>
                </div>
                <a href="<?php echo (C("OSS_DOMAIN")); echo ($banner['big']['apk']); ?>">
                <div class="down_btn">立即下载</div></a>
            </div>
        </div>
        <div class="content bottom after">
            <div class="game_li">
                <p class="game_title"><?php echo ($banner['small'][2]['banner_name']); ?></p>

             <!--    <p class="game_hint_font">优乐商店· <?php echo date("m",$banner['small'][2]['time']);?>  月<?php echo date("d",$banner['small'][2]['time']);?>日</p> -->

                <p class="game_hint"><?php echo mb_substr(strip_tags($banner['small'][2]['app_introduce']),0,30,'utf-8');?>...</p>

                <a href="<?php echo U('Market/details',['app_id'=>$banner['small'][2]['app_id']]);?>" target="_blank">
                <img class="game_img small" src="<?php echo (C("OSS_DOMAIN")); echo ($banner['small'][2]['bannner']); ?>" alt=""></a>

                <div class="game_item after">
                <a href="<?php echo U('Market/details',['app_id'=>$banner['small'][2]['app_id']]);?>" target="_blank">
                    <img class="item_img" src="<?php echo (C("OSS_DOMAIN")); echo ($banner['small'][2]['apk_icon']); ?>" alt=""></a>
                    <div class="game_item_font">
                        <p class="item_title"><a href="<?php echo U('Market/details',['app_id'=>$banner['small'][2]['app_id']]);?>" target="_blank"> <?php echo ($banner['small'][2]['app_name']); ?></a></p>
                        <p class="item_tit"><?php echo ($banner['small'][2]['apk_size']); ?>M</p>
                    </div>
                    <a href="<?php echo U('Index/appDownload',['app_id'=>$banner['small'][2]['app_id']]);?>"><div class="down_btn">立即下载</div></a>
                </div>
            </div>
            <div class="game_li right_padding">
                <p class="game_title"><?php echo ($banner['small'][3]['banner_name']); ?></p>

             <!--    <p class="game_hint_font">优乐商店· <?php echo date("m",$banner['small'][3]['time']);?>  月<?php echo date("d",$banner['small'][3]['time']);?>日</p> -->
                
                <p class="game_hint"><?php echo mb_substr(strip_tags($banner['small'][3]['app_introduce']),0,30,'utf-8');?>...</p>

                <a href="<?php echo U('Market/details',['app_id'=>$banner['small'][3]['app_id']]);?>" target="_blank">
                <img class="game_img small" src="<?php echo (C("OSS_DOMAIN")); echo ($banner['small'][3]['bannner']); ?>" alt=""></a>
                <div class="game_item after">
                 <a href="<?php echo U('Market/details',['app_id'=>$banner['small'][3]['app_id']]);?>" target="_blank">
                    <img class="item_img" src="<?php echo (C("OSS_DOMAIN")); echo ($banner['small'][3]['apk_icon']); ?>" alt=""></a>
                    <div class="game_item_font">
                        <p class="item_title">
                        <a href="<?php echo U('Market/details',['app_id'=>$banner['small'][3]['app_id']]);?>" target="_blank">
                        <?php echo ($banner['small'][3]['app_name']); ?></a></p>
                        <p class="item_tit">3.98M</p>
                    </div> 
                    <a href="<?php echo U('Index/appDownload',['app_id'=>$banner['small'][3]['app_id']]);?>"><div class="down_btn">立即下载</div></a>
                </div>
            </div>
        </div>
        <div class="big_game_li after">
            <p class="game_title">关于优乐</p>
            <p class="game_hint">优乐商店是一款最受欢迎的手机助手。是可以作为安卓助手管理设备的软件、游戏、壁纸、铃声资源的下载安装的工具。致力于做一款注重用户体验的安卓助手设备管理软件。</p>
            <img class="game_img" src="/Public/home/img/icon6.png" alt="">
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