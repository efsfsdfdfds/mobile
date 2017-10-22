<?php 
namespace app\Admin\controller;
use think\Request;
use think\Db;
use app\Admin\model\Irt;
class Inserts
{
	public function inse(Request $request)
	{
		if($request->isPost())
		{
			$datas=$request->param();
			var_dump($datas);
      //die;
			$time=date('Y-m-d');
            $names=trim($datas['name']);
            $phoneNumbers=trim($datas['phoneNumber']);
            $QQs=trim($datas['QQ']);
            $city=$datas['city'];
            $name=explode("\r\n",$names);
            $phoneNumber=explode("\r\n",$phoneNumbers);
            $QQ=explode("\r\n",$QQs);
            $arr=Db::table('Store')->where(['city'=>$city])->select();
            $list=[];
            //$count=strlen($name);
            for($i=0;$i<count($name);$i++)
            {
              $user=new Irt();
              $list[]=['userName'=>$name[$i],'phoneNumber'=>$phoneNumber[$i],'QQ'=>$QQ[$i],'cid'=>$arr[0]['cid'],'comment'=>$time.'使用'];
              
            }
            $bool=$user->saveAll($list);
            if($bool)
            {
                echo "<script>alert('添加成功');window.location.assign('inserts')</script>";
                //header("location:inserts");
            }else{
                echo "<script>alert('添加失败');window.location.assign('inserts')</script>";
                //header("location:inserts");
            }
		}
		$arr2=Db::table('Store')->select();
		return view('inse',['arr2'=>$arr2]);
	}
}