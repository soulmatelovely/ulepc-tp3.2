<?php
namespace Test\Controller;
use OSS\OssClient;
use OSS\Core\OssException;
use Think\Controller;
use Think\Log;
use \Think\Storage;
class IndexController extends Controller {
    public function index()
    {
    	$this->display();   
    }

  

	    /**
	 * 上传指定的本地文件内容
	 *
	 * @param OssClient $ossClient OSSClient实例
	 * @param string $bucket 存储空间名称
	 * @return null
	 */
	function uploadOss($object,$bucket)
	{

		$accessKeyId = C('OSS.ACCESS_KEY_ID');
		$accessKeySecret = C('OSS.ACCESS_KEY_SECRET');
		$endpoint = C('OSS.ENDPOINT');
		try {
			$ossClient = new OssClient($accessKeyId, $accessKeySecret, $endpoint);
		} catch (OssException $e) {
			print $e->getMessage();
		}

	    $filePath = __FILE__;
	    try{
	        $ossClient->uploadFile($bucket, $object, $filePath);
	    } catch(OssException $e) {
	        printf(__FUNCTION__ . ": FAILED\n");
	        printf($e->getMessage() . "\n");
	        return;
	    }
	    print(__FUNCTION__ . ": OK" . "\n");
	}

	public function upload($value='')
	{
		  if (IS_POST){

		    $upload = new \Think\Upload();// 实例化上传类
		    $upload->maxSize   =     3145728 ;// 设置附件上传大小
		    // $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		    $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
		    // $upload->savePath  =     ''; // 设置附件上传（子）目录
		    // 上传文件 
		    $info   =   $upload->uploadOne($_FILES['myfile']);
		    if(!$info) {// 上传错误提示错误信息
		        $this->error($upload->getError());
		    }else{// 上传成功

		    	$object=$upload->rootPath.$info['savepath'].'/'.$info['savename'];
		    	// $filePath=$_FILES['myfile']['tmp_name'];
		        // $this->success('上传成功！');
		        $this->uploadOss($object,'syh-test-1');
	   		}
   	
       }else{
			$this->display();
       }
	}


	public function uploadify($value='')
	{
		 if (IS_POST) {
		 	dump($_FILES);
		 }

		 $this->display();
	}
	public function test()
	{
		$arr=[1,2,3,4,5];
	 	// $res=Log::record(implode('-',$arr));

	 	// Storage::put(APP_PATH.MODULE_NAME.'/Conf/webset.php', '<?php return '.var_export($arr,true).';', 'F');
	 	// dump($res);
	 	echo C('USER.NAME');
	}

	public function uploadPicture(){
        //TODO: 用户登录检测

        /* 返回标准数据 */
        $return  = array('status' => 1, 'info' => '上传成功', 'data' => '');

        /* 调用文件上传组件上传文件 */
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小   
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
        // $upload->savePath  =      '/img/'; // 设置附件上传目录    
        // 上传文件
        $info   =   $upload->upload();

        /* 记录图片信息 */
        if($info){
            $return['status'] = 1;
        } else {
            $return['status'] = 0;
            $return['info']   = $upload->getError();
        }

        /* 返回JSON数据 */
        $this->ajaxReturn($return);
    }


	 


}