<?php 
namespace app\Admin\controller;
use think\Request;
use think\Db;
use think\Controller;
use think\Loader;
class Daoru extends Controller
{
	function impUser(Request $request){
	      return view();
	}
	function impExcel()  
    {  
        //vendor("phpexcel.PHPExcel"); //下载PHPExcel类
        Loader::import('PHPExcel.Classes.PHPExcel');  
        //获取表单上传文件  
        $file = request()->file('import');   
        $info = $file->validate(['ext' => 'xlsx'])->move(ROOT_PATH . 'public' . DS . 'uploads');  
        if ($info) {  
             //echo $info->getFilename();die;  
            $exclePath = $info->getSaveName();  //获取文件名  
            $file_name = ROOT_PATH . 'public' . DS . 'uploads' . DS . $exclePath;   //上传文件的地址  
            $objReader = \PHPExcel_IOFactory::createReader('Excel2007');  
            $obj_PHPExcel = $objReader->load($file_name, $encode = 'utf-8');  //加载文件内容,编码utf-8  
            echo "<pre>";  
            $excel_array = $obj_PHPExcel->getsheet(0)->toArray();   //转换为数组格式  
            //array_shift($excel_array);  //删除第一个数组(标题);  
            $city = [];  
            foreach ($excel_array as $k => $v) {  
                $city[$k]['userName'] = $v[0];  
                $city[$k]['phoneNumber'] = $v[1];
                $city[$k]['QQ'] = $v[2];
                $arr=Db::table('Store')->where(['city'=>$v[3]])->select();
                $city[$k]['cid'] = $arr[0]['cid'];
                $city[$k]['comment'] = $v[4];
                
            }  //var_dump($city);
            //dump($city); 
               //die;
            $add=Db::table('MobileSales')->insertAll($city); //批量插入数据  
            //var_dump($add);die;  
            if($add){  
                $this->success('添加成功');  
            }else{  
                $this->error('失败');  
            }  
        } else {  
            echo $file->getError();  
        }  
    }  
}