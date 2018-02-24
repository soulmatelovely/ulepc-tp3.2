<?php
namespace Home\Controller;
use Think\Controller;
class MarketController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $app_name_list=D('App')->findAppNameList();
        $youle_erweima=D('App')->qrcode(C('YOULE_APP'));
        $this->assign('youle_erweima',$youle_erweima);
        $this->assign('app_name_list',$app_name_list);
    }
    // 应用市场
    public function index(){

        $recommend_hot=D('App')->findAppByType('recommend.hot');
        $recommend_hot=array_chunk($recommend_hot,6);   
        $recommend_necessary=D('App')->findAppByType('recommend.necessary','',6);
        $recommend_necessary=array_chunk($recommend_necessary,6);   
         
        $banner=D('App')->getBanner('market');
        $this->assign('recommend_hot',$recommend_hot);
        $this->assign('recommend_necessary',$recommend_necessary);
        $this->assign('title','应用市场');

        $this->assign('banner',$banner);
        $this->display('market');
    }
    // 应用
    public function apply($value='')
    {
        $type=I('get.type/s');
        
        $keys=['apply','game','recommend','banking'];
        if (!in_array($type, $keys)) {
           $this->redirect('Market/index');
        }

        if ($type=='recommend') {
              $this->redirect('Market/index');
              
        }else{
            
             $recommend=D('App')->findAppByType($type.'.recommend');//推荐
             
            $recommend=array_chunk($recommend,15);     
        }


        $banner=D('App')->getBanner($type);
         
        $app_list=D('App')->findAppByType($type);//所有

        $app_list=array_chunk($app_list,15);     
 
        $download_rank=D('App')->findAppByType('app.download','',10);//下载排行榜
        // 
        // $soaring_rank=D('App')->hotRanking();//新飙升排行榜
       
        $soaring_rank=D('App')->findAppByType('app.soaring','',10);//飙升排行榜
     
       
        $this->assign('for_count',$for_count);
        $this->assign('download_rank',$download_rank);
        $this->assign('soaring_rank',$soaring_rank);
        $this->assign('title','应用');
        $this->assign('recommend',$recommend);
        $this->assign('app_list',$app_list);
        $this->assign('type',$type);
        $this->assign('banner',$banner);
        $this->display('finance');
    }
    // 详情
    public function details($value='')
    {
        $app_id=I('get.app_id/d');
        $app_info=D('App')->getAppInfoById($app_id);
       
        if (!array_key_exists('id', $app_info)){
             $this->redirect('Market/index');
        }

        $comment=D('App')->findCommentByApp($app_id,'all');
        
        $download_rank=D('App')->findAppByType('app.download');//下载排行榜

        $this->assign('title','详情');

        $this->assign('comment',$comment);
        $this->assign('app_info',$app_info);
        $this->assign('download_rank',$download_rank);
        $this->display();
    }
    //搜索
    public function search()
    {
        $app_name=I('get.app_name','');  
        
        $app_list=D('App')->searchAppByName($app_name);

        $this->assign('title','搜索');
        $this->assign('app_name',$app_name);
        
        $this->assign('app_list',$app_list);
        $this->display();
    }
    
    public function _empty(){
        $this->redirect('Index/index');
    }

   public function getComment($value='')
   {
        $app_id=I('get.app_id/d');
        $type=I('get.type');
        $app_list=D('App')->findCommentByApp($app_id,$type);
        if (empty($app_list)) {
             $result['msg']='查询失败';
             $result['code']=0;
        }else{
             $result['msg']='查成功';
             $result['code']=1;
             $result['data']=$app_list;
        }
        exit(json_encode($result));  
   }



   public function test()
   {
        header("Content-type:text/html;charset=utf-8");
        $app_list=D('App')->hotRanking();
        dump($app_list);
   }
 
}