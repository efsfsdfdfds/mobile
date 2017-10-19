<?php 
namespace app\Admin\controller;
use think\Request;
use think\Controller;
use think\Db;
use app\Admin\model\Irt;
class Update
{
	public function udt(Request $request)
	{   

        	
        if($request->isPost())
        {
        	$datas=$request->param();
        	//var_dump($datas);
        	$arr=Db::table('Store')->where(['city'=>$datas['city']])->select();
        	$user=new Irt;
					
	        $bool=$user->save([
                'userName'=>$datas['userName'],
				'phoneNumber'=>$datas['phoneNumber'],
				'QQ'=>$datas['QQ'],
				'cid'=>$arr[0]['cid'],
				'comment'=>$datas['content']
	        	],['id'=>$datas['id']]);
	        if($bool)
	        {
	        	echo "<script>alert('修改成功');window.location.assign('udt?id={$datas['id']}');</script>";
	        }
	        else{
	        	echo "<script>alert('修改失败');window.location.assign('udt?id={$datas['id']}');</script>";
	        }
        }
        else{
        	$id=$_GET['id'];
			$data=Db::table('MobileSales')->alias('a')->join('Store w','a.cid=w.cid')->where(['id'=>$id])->select();
			$arr2=Db::table('Store')->select();
			foreach($data as $arr)
			{

			}
			return view('udt',['arr'=>$arr,'arr2'=>$arr2]);
        }
        	
		
        	
			
        
	
	}
}