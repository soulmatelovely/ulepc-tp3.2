<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>优乐-<?php echo ($title); ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="/Public/home/img/x_icon.png">
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="/Public/home/css/reset.css">
    <link rel="stylesheet" href="/Public/home/css/details.css">
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

        <div class="details_con">
            <img class="details_con_img" src="<?php echo (C("OSS_DOMAIN")); echo ($app_info['picture']); ?>" alt="">
            <div class="details_font">
                <p class="details_title"><?php echo ($app_info["name"]); ?></p>
                <div class="num">
                    <div class="star">
 
                        <!-- <img src="/Public/home/img/icon23.png" alt=""> -->
                        <img src="/Public/home/img/star<?php echo ceil($app_info['comment']);?>.png" alt="">
                        <span><?php echo ($app_info["comment"]); ?>分</span>
                    </div>
                    <p class="down">大小：<span><?php echo ($app_info["apk_size"]); ?>M</span>
					<?php if(!empty($app_info['version_name'])): ?>版本：<span>V<?php echo ($app_info["version_name"]); ?></span><?php endif; ?>

                           下载次数：<span>

                            <?php if($app_info["people"] > 10000): echo sprintf('%.2f', $app_info['people']/10000);?> 万
                            <?php else: ?> 
                            <?php echo ($app_info["people"]); endif; ?>
                            次下载

                    </span></p>
                </div>
            </div>
            <div class="erweima">
                <!-- <img src="/Public/home/img/icon24.png" alt=""> -->
                <img src="<?php echo ($app_info["erweima"]); ?>" alt="">
                <p>扫描二维码下载</p>
            </div>
            <a href="<?php echo U('Index/appDownload',['app_id'=>$app_info['id']]);?>"><div class="button">
                一键下载
            </div></a>
        </div>
        <div class="nape_title">
            应用详情
        </div>
        <div class="details">
            <div class="details_img after">
                 <?php if(is_array($app_info["screenshot"])): $i = 0; $__LIST__ = $app_info["screenshot"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><img src="<?php echo (C("OSS_DOMAIN")); echo ($arr); ?>" alt=""><?php endforeach; endif; else: echo "" ;endif; ?>    
            </div>
            <div class="details_text">
                <pre><!-- 每日瑜伽」— 健身、减肥、塑形、马甲线、瘦身计划，冥想减压睡眠必备，你的专属瑜伽视频教练

瑜伽中遇到的常见问题：
-只看网络图片学不会、做不好瑜伽体式
-没有时间精力去瑜伽馆，想要随时随地能练习
-身边没有共同爱好瑜伽者，无法分享交流

来「每日瑜伽」吧：
-全面的体式词典，科学的训练课程与计划，加速实现你的蜕变
-无论在你是在家还是在公司，随时选择不同时长来习练
-有料的社区内容，专业的答疑与解惑，陪你一起跨过瓶颈再提升。 -->

                <?php echo ($app_info["introduce"]); ?>

                </pre>
                <p class="message"> 作者：<?php echo ($app_info["developer"]); ?>	<!-- 更新时间：2017-04-21 --></p>
                <p class="message">版本：V<?php echo ($app_info["version_name"]); ?>系统：Android 4.0以上</p>
                <p class="message"> 语言：中文</p>
            </div>
        </div>
        <div class="evaluate">
            <div class="left_evaluate">
                <div class="eval_main">
                    <ul class="option_title" >
                       
                        <li style="width: 100px;" class="option_active"> <a href="javascript:void(0)" class="comment" val='all'>全部</a></li>
                        <li><a href="javascript:void(0)" class="comment" val='good'>好评（<span><?php echo ($comment['good_num']); ?></span>）</a></li>
                        <li><a href="javascript:void(0)" class="comment" val='mid'>一般（<span><?php echo ($comment['mid_num']); ?></span>）</a></li>
                       <li> <a href="javascript:void(0)" class="comment" val='bad'>差评（<span><?php echo ($comment['bad_num']); ?></span>）</a></li>
                    </ul>
                    <div class="discuss">
                        <ul id="comment" app_id="<?php echo ($app_info["id"]); ?>">
                        <?php if(is_array($comment['data'])): $i = 0; $__LIST__ = $comment['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i; if($arr['grade'] < 6 ): ?><li class="after">
                                <div class="img"><img src="/Public/home/img/abc.jpg" alt=""></div>
                                <div class="name"><b><?php echo ($arr["petname"]); ?></b><img src="/Public/home/img/star<?php echo ceil($arr['grade']);?>.png" alt=""><?php echo ($arr["grade"]); ?>分</div>
                                <p class="time"><?php echo date("Y-m-d H:i:s",$arr['time']);?></p>
                                <p class="clear_p">
                                    
                                    <?php echo ($arr["info"]); ?>
                                   </p>
                            </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
   
                        </ul>
                    </div>
                </div>
            </div>
            <div class="right_evaluate">
                <div class="nape_title">
                    下载排行榜
                </div>
                <ul class="sisters_ul">
                <?php if(is_array($download_rank)): $i = 0; $__LIST__ = $download_rank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><li class="sisters_li after">
                    <a href="<?php echo U('Market/details',['app_id'=>$arr['gameid']]);?>">
                        <img class="finance_img" src="<?php echo (C("OSS_DOMAIN")); echo ($arr['picture']); ?>" alt=""></a>
                        <div class="finance_con">
                            <p class="down_title"><?php echo ($arr["name"]); ?></p>
                            <p class="down_num">
                                <?php if($arr["people"] > 10000): echo sprintf('%.2f', $arr['people']/10000);?> 万
                                        <?php else: ?>
                                        <?php echo ($arr["people"]); endif; ?>
                                    次下载

                            </p>
                        </div>
                        <a href="<?php echo U('Index/appDownload',['app_id'=>$arr['gameid']]);?>"><div class="down_button">下载</div></a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
 
                </ul>
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
 <script type="text/javascript" src="/Public/home/js/search.js"></script>
 <script type="text/javascript">

(function($) {
    $.extend({
        myTime: {
            /**
             * 当前时间戳
             * @return <int>        unix时间戳(秒)  
             */
            CurTime: function(){
                return Date.parse(new Date())/1000;
            },
            /**              
             * 日期 转换为 Unix时间戳
             * @param <string> 2014-01-01 20:20:20  日期格式              
             * @return <int>        unix时间戳(秒)              
             */
            DateToUnix: function(string) {
                var f = string.split(' ', 2);
                var d = (f[0] ? f[0] : '').split('-', 3);
                var t = (f[1] ? f[1] : '').split(':', 3);
                return (new Date(
                        parseInt(d[0], 10) || null,
                        (parseInt(d[1], 10) || 1) - 1,
                        parseInt(d[2], 10) || null,
                        parseInt(t[0], 10) || null,
                        parseInt(t[1], 10) || null,
                        parseInt(t[2], 10) || null
                        )).getTime() / 1000;
            },
            /**              
             * 时间戳转换日期              
             * @param <int> unixTime    待时间戳(秒)              
             * @param <bool> isFull    返回完整时间(Y-m-d 或者 Y-m-d H:i:s)              
             * @param <int>  timeZone   时区              
             */
            UnixToDate: function(unixTime, isFull, timeZone) {
                if (typeof (timeZone) == 'number')
                {
                    unixTime = parseInt(unixTime) + parseInt(timeZone) * 60 * 60;
                }
                var time = new Date(unixTime * 1000);
                var ymdhis = "";
                ymdhis += time.getUTCFullYear() + "-";
                ymdhis += (time.getUTCMonth()+1) + "-";
                ymdhis += time.getUTCDate();
                if (isFull === true)
                {
                    ymdhis += " " + time.getUTCHours() + ":";
                    ymdhis += time.getUTCMinutes() + ":";
                    ymdhis += time.getUTCSeconds();
                }
                return ymdhis;
            }
        }
    });
})(jQuery);

// console.log($.myTime.UnixToDate(1325347200,true));

$(function(){
    $('a.comment').click(function(){

        var type=$(this).attr('val');
        var app_id=$('ul#comment').attr('app_id');
        
            $(this).parents("li").addClass("option_active").siblings("li").removeClass("option_active")

            $.get("<?php echo U('Market/getComment');?>", {app_id:app_id,type: type },
              function(data){
                console.log(data)
                var html='';
                  
                     
                    if (data.code==1) {
                        $.each(data.data.data, function(i, n){
                          html+='<li class="after">\
                                <div class="img"><img src="/Public/home/img/abc.jpg" alt=""></div>\
                                <div class="name"><b>'+n.petname+
                                '</b><img src="/Public/home/img/star' +Math.ceil(n.grade)+'.png" >'+n.grade+
                                '分'+'</div>\
                                <p class="time">'+$.myTime.UnixToDate(n.time,true,8)+'</p>\
                                <p class="clear_p">'+n.info+'</p>\
                            </li>';
                        });

                        $('ul#comment').html(html);
                        // console.log(html);

                    }
             },'json');
    })
})
 </script>
</html>