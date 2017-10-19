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
			$time=date('Y-m-d');
            $names=trim($datas['name']);
            $phoneNumbers=trim($datas['phoneNumber']);
            $QQs=trim($datas['QQ']);
            $city=$datas['city'];
            $name=explode("\r\n",$names);
            $phoneNumber=explode("\r\n",$phoneNumbers);
            $QQ=explode("\r\n",$QQs);
            $arr=Db::table('Store')->where(['city'=>$city])->select();
            $user=new Irt();
            $list=[
                   ['userName'=>$name[0],'phoneNumber'=>$phoneNumber[0],'QQ'=>$QQ[0],'cid'=>$arr[0]['cid'],'comment'=>$time.'使用'],
                   ['userName'=>$name[1],'phoneNumber'=>$phoneNumber[1],'QQ'=>$QQ[1],'cid'=>$arr[0]['cid'],'comment'=>$time.'使用'],
                   ['userName'=>$name[2],'phoneNumber'=>$phoneNumber[2],'QQ'=>$QQ[2],'cid'=>$arr[0]['cid'],'comment'=>$time.'使用'],
                   ['userName'=>$name[3],'phoneNumber'=>$phoneNumber[3],'QQ'=>$QQ[3],'cid'=>$arr[0]['cid'],'comment'=>$time.'使用'],
                   ['userName'=>$name[4],'phoneNumber'=>$phoneNumber[4],'QQ'=>$QQ[4],'cid'=>$arr[0]['cid'],'comment'=>$time.'使用']
                   ];
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