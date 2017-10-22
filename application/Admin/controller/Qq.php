<?php 
namespace app\Admin\controller;
use think\Request;
use think\Db;
class Qq
{
	public function qq(Request $request)
	{
		if($request->isPost())
		{
			$datas=$request->param();
			$string=trim($datas['content']);
			if($string=="")
			{
				echo "<script>alert('输入数据不能为空！');window.location.assign('qq')</script>";
				return;
			}
			$data=explode("\r\n",$string);
			
			$arr=[];
			$arr1=[];
			foreach($data as $vv)
			{
				$datas=Db::table('MobileSales')->alias('a')->join('Store w','a.cid=w.cid')->where(['QQ'=>$vv])->select();
				if($datas)
				{
					$arr[]=$datas;
				}
				else
				{
					
					$arr1[]=$vv;
				}
			}
			return view('qq',['arr'=>$arr,'arr1'=>$arr1]);
		}
		else{
			return view();
		}
	}
}