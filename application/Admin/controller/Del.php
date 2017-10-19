<?php 
namespace app\Admin\controller;
use think\Request;
use think\Controller;
use think\Db;
use app\Admin\model\Irt;
class Del extends Controller
{
	public function del(Request $request)
	{
        $data=$request->param();
         //var_dump($data['ad']);
        $user=Irt::get($data['ad']);
        $bool=$user->delete();
        //var_dump($bool);
		if($bool)
		{
			$this->success('删除成功');
		}
		else{
            $this->error('失败');
		}
		
		
	}
	public function delall(Request $request)
	{
        if($request->isPost())
        {
        	$data=$request->param();
        	//var_dump($data);
            foreach($data as $v)
            {
            	$user=Irt::get($v);
                $bool=$user->delete();
            }
            if($bool)
            {
            	$this->success('批量删除成功');
            }
            else{
            	$this->error('批量删除失败');
            }
        }
	}
}