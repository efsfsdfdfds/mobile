<?php 
namespace app\Admin\controller;
use think\Request;
use think\Db;
class Lista
{
	public function lis()
	{
		$data=Db::table('MobileSales')->alias('a')->join('Store w','a.cid=w.cid')->order('id','asc')->paginate(5);
		$page=$data->render();
		$arr2=Db::table('Store')->select();
		return view('lis',['arr'=>$data,'page'=>$page,'arr2'=>$arr2]);
	}
	public function chaxun(Request $request)
	{
		if($request->isPost())
		{
			$data=$request->param();
			$search=$data['search'];
			$data=Db::table('MobileSales')->alias('a')->join('Store w','a.cid=w.cid')->where('city','like','%'.$search.'%')->order('id','asc')->select();
	        //$page1=$data->render();
	        $arr2=Db::table('Store')->select();
			return view('lis',['arr'=>$data,'arr2'=>$arr2]);
		}
		else
		{
			$data=Db::table('MobileSales')->alias('a')->join('Store w','a.cid=w.cid')->order('id','asc')->paginate(5);
	        $page=$data->render();
	        $arr2=Db::table('Store')->select();
			return view('lis',['arr'=>$data,'page'=>$page,'arr2'=>$arr2]);
		}
		
	}
	public function shijian()
	{
        $data=Db::table('MobileSales')->alias('a')->join('Store w','a.cid=w.cid')->order('id','desc')->paginate(5);
        $page=$data->render();
        $arr2=Db::table('Store')->select();
		return view('lis',['arr'=>$data,'page'=>$page,'arr2'=>$arr2]);
	}
}