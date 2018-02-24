<?php 
namespace Home\Model;
use Think\Model;
use Think\Log;
class AppModel extends Model {
	protected $tableName = 'gameinfo'; 
 
 
	 // 'LOG_RECORD' => true, // 开启日志记录


	 /**
     * app列表
     * @author  syh
     * @param 	string   $type 应用类型 recommend 推荐|2 apply 应用|3 game游戏|4 banking 金融
     * @param   string   $limit 条数  
     * @return  boolean         
     */
    public function findAppByType($service='recommend.hot',$field='*',$limit)
    {
         

        $model=M('gameinfo');
        

        $where=[
            // 热门精选
            'recommend.hot'=>'table_gametype.ishotselect=1 and   table_gametype.isapply=1 and  table_gameinfo.isshow=1',
            // 装机必备
            'recommend.necessary'=>'table_gametype.isinstallness=1 and    table_gameinfo.isshow=1',
            // 应用列表
            'apply'=>'(table_gametype.ishotselect=1 or table_gametype.ispopulariy=1 or table_gametype.isinstallness=1 ) and  table_gameinfo.isshow=1',
            // 游戏列表
            'game'=>'(table_gametype.ishotgame=1 or table_gametype.isinternetgame=1 or table_gametype.isphonegame=1 or table_gametype.ispcgame=1 ) and  table_gameinfo.isshow=1',
            // 金融列表
            'banking'=>'(table_gametype.isborrow=1 or table_gametype.ismanagemoney=1 ) and table_gameinfo.isshow=1',
             // 下载排行榜
            'app.download'=>'table_gameinfo.isshow=1 and table_gametype.is_download_notice=1',
             // 飙升排行榜
            'app.soaring'=>'table_gameinfo.isshow=1 and table_gametype.is_soaring_notice=1',
             // 应用推荐
            'apply.recommend'=>'table_gametype.isapply=1  and  table_gameinfo.isshow=1',
             // 游戏推荐
            'game.recommend'=>'table_gametype.isgame=1  and  table_gameinfo.isshow=1',
            // 金融推荐
            'banking.recommend'=>'table_gametype.isbank=1  and  table_gameinfo.isshow=1',
             // 所有推荐
            'recommend'=>'(table_gametype.isapply=1 or table_gametype.isbank or table_gametype.isgame ) and  table_gameinfo.isshow=1',
            
        ];

        $order=[
            'recommend.hot'=>'table_gametype.hotselectrank desc',
            'recommend.necessary'=>'table_gametype.installnessrank asc',
            'apply'=>'table_gametype.appallrank desc',
            'game'=>'table_gametype.gameallrank desc',
            'banking'=>'table_gametype.bankallrank desc',
            'app.download'=>'table_gameinfo.people desc',
            'app.soaring'=>'table_gametype.soaring_rank desc',
            'apply.recommend'=>'table_gametype.applyrank asc',
            'game.recommend'=>'table_gametype.gamerank desc',
            'banking.recommend'=>'table_gametype.bankallrank desc',
            'recommend'=>'table_gametype.gameid desc',
        ];

    	$obj=$model->join('table_gametype on table_gametype.gameid=table_gameinfo.id ');

        $obj=$obj->where($where[$service])->field($field)->order($order[$service]);
    	$data=empty($limit)?$obj->select():$obj->limit($limit)->select();

        // $sql=$model->_sql();
        
        
    	return $data;
     
    }

    // 获取详情
    public function getAppInfoById($app_id,$field='*')
    {
    	$data=M('gameinfo')->join('table_gametype on table_gametype.gameid=table_gameinfo.id ')->field('id,name,picture,screenshot,introduce,apk_size,people,developer,comment,version_name,apk')->where(['table_gameinfo.id'=>$app_id])->find();
        $data['screenshot']=explode(',',$data['screenshot']);
        $data['erweima']=$this->qrcode(C('OSS_DOMAIN').$data['apk']);

        return $data;
    }

    // 搜索
    public function searchAppByName($app_name,$field='*')
    {
        $map['table_gameinfo.name'] = ['like',"%{$app_name}%"];
        $map['table_gameinfo.isshow'] = 1;
        return  M('gameinfo')->join('table_gametype on table_gametype.gameid=table_gameinfo.id ')->field($field)->where($map)->select();
    }

    // 获取所以app名
    public function findAppNameList()
    {
        return  M('gameinfo')->getField('name',true);

    }

     /**
     * 二位码生成
     * @author  syh
     * @param     string   $apk 数据库apk地址
     * @return  boolean         
     */
    public function qrcode($apk)
    {
       
        $save_path = './Public/qrcode/';  //图片存储的绝对路径
        $web_path = __ROOT__.'/Public/qrcode/';        //图片在网页上显示的路径
        $qr_data = $apk;
        $qr_level = 'H';//容错等级
        $qr_size = '4';//二维码大小
        $save_prefix ='SHIHAI';//文件名前缀
        if($filename = createQRcode($save_path,$qr_data,$qr_level,$qr_size,$save_prefix)){
            $pic = $web_path.$filename; //二位码路径
        }
        
        return  $pic;
    }

    // 评论
    public function findCommentByApp($app_id,$type='all')
    {
        $comment_all=M('comment a')->join('table_user b on a.userid=b.id')->field('a.id,b.petname,a.grade,a.time,a.info')->where(['a.appid'=>$app_id])->order('grade desc')->select();

        $len=count($comment_all);
        
    
         
        $comment['good']=array_map(function($val){
             if ($val['grade']>=3) {
                return $val;
             }

        },$comment_all);

        $comment['mid']=array_map(function($val){
             if ($val['grade']>1&&$val['grade']<3) {
                return $val;
             }

        },$comment_all);

         $comment['bad']=array_map(function($val){
             if ($val['grade']<=1) {
                return $val;
             }

        },$comment_all);
        // $comment['good']=($len>3)?array_slice($comment_all,0,floor(0.5*$len)):$comment_all;
        // $comment['mid']=($len>3)?array_slice($comment_all,floor(0.5*$len),floor(0.3*$len)):'';
        // $comment['bad']=($len>3)?array_slice($comment_all,floor(0.8*$len),floor(0.2*$len)):'';

        if ($type=='all') {
            $result['data']=array_filter($comment_all);
            $result['good_num']=count(array_filter($comment['good']));
            $result['mid_num']=count(array_filter($comment['mid']));
            $result['bad_num']=count(array_filter($comment['bad']));
            return $result;
        }else{
            return ['data'=>array_filter($comment[$type])];
        }
               
    }

    // bannner
    public function getBanner($type)
    {
        $fun=function($status,$record=false,$link_type=false){

            if ($link_type) {
                $obj=M('pc_banner a')->join('table_gameinfo b on a.appid=b.id')->field('a.appid as app_id,b.name as app_name,a.name as banner_name,b.apk_size,b.apk,a.id as banner_id,a.picture as bannner,b.picture as apk_icon,b.introduce as app_introduce')->where("statustype='$status'");
            }else{

                $obj=M('pc_banner')->field('name,id,picture,appid')->where("statustype='$status'");
            }
              
            return !$record ? $obj->find(): $obj->select();
        };

        $data['index']=['big'=>$fun(7,null,1),'small'=>$fun(5,1,1)];//首页
        $data['apply']=$fun(2);
        $data['game']=$fun(4);
        $data['recommend']=$fun(1);
        $data['banking']=$fun(3);
        $data['market']=['market'=>$fun(8,1),'boutique'=>$fun(6,1)];//应用市场

        return $data[$type];
        
    }

    // 统计飙升排行榜
    public function hotRanking()
    {
    	// 获取id列表
    	$fun1=function($data){
	        
	        foreach ($data as $key => $value) {
	        	$list[]=$value['app_id'];
	        }
	        return $list;

        }; 

        // 搜索下载量
        $fun2=function($data,$app_id){
	         
			foreach ($data as $key => $value) {
				if ($app_id==$value['app_id']) {
					return  $value['num'];
				}	 
			}

			return 0;
        }; 

        $sql1="select app_id,count(*) as num from table_down_history where datediff(curdate(), add_time)=2 group by app_id";

        $sql2="select app_id,count(*) as num from table_down_history where datediff(curdate(), add_time)=1 group by app_id";

        $data1=M()->query($sql1);
        $data2=M()->query($sql2);
        if (empty($data1)||empty($data2)) {
            return false;
        }
 		 foreach ($data2 as $key => $value) {

 		 	 if ($fun2($data1,$value['app_id'])==0) {
 		 	 	 $list[$key]['app_id']=$value['app_id'];
 		 	 	 $list[$key]['num']=$value['num'];
 		 	 }else{

 		 	 	$num=$value['num']-$fun2($data1,$value['app_id']);
 		 	 	if ($num>0) {
	 		
 		 	 	 	$list[$key]['app_id']=$value['app_id'];
 		 	 	 	$list[$key]['num']=$num;
 		 	 	}

 		 	 }
 		 }
         
        $list= my_array_sort($list,'num');
        $list=array_slice($list, 0, 10); 
        foreach ($list as $key => &$value) {
            $data=M('gameinfo')->field('id,name,people,picture,apk')->find($value['app_id']);
            $value=array_merge($value,$data);
        }
        unset($value);
        return $list;
    }
    // APP下载
    public function appDownload($id='')
    {
        $gameinfo=M('gameinfo');  
        $down_count=$gameinfo->where(['id'=>$id])->getField('down_count'); // 用户的积分加1
        
        if (empty($down_count)) {
            $res=$gameinfo->where(['id'=>$id])->setField('down_count',1); // 用户的积分加1
        }else{
            $res=$gameinfo->where(['id'=>$id])->setInc('down_count',1); // 用户的积分加1      
        }
        if(!$res)  Log::write($id.'下载量修改失败'.$res,'msg');
        $apk=M('gameinfo')->where(['id'=>$id])->getField('apk'); // 用户的积分加1;
        header("Location:".C('OSS_DOMAIN').$apk); 
        exit;
    }
 


}


?>
