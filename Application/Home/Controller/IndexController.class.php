<?php
namespace Home\Controller;
use Think\Controller;
use Think\Log;
class IndexController extends Controller {
    public function index(){
        $banner=D('App')->getBanner('index');
        $apk="http://file.oneweone.cn//ule_v1.2.3.apk";
        $youle_erweima=D('App')->qrcode($apk);
        $this->assign('title','首页');
        $this->assign('youle_url',$apk);
        $this->assign('youle_erweima',$youle_erweima);
        $this->assign('banner',$banner);
        $this->display();
    }
    
    // 下载
    public function appDownload($value='')
    {
        $app_id=I('get.app_id/d');
        D('App')->appDownload($app_id);
    }
    public function _empty(){
        $this->redirect('Index/index');
    }
}