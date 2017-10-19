<?php 
namespace app\Admin\controller;
use think\Request;
use think\Db;
class Number
{
	public function num(Request $request)
	{
		if($request->isPost())
		{
			$datas=$request->param();
            //var_dump($datas['content']);
			//die;
			$string=$datas['content'];
			/*var_dump($string);
			echo "<br>";
			$strings=str_replace(' ','', $string);
			var_dump($strings);*/
			//die();
			//$string1=trim($string);
			//var_dump($string1);
			//echo $data;
			//dump($data);
			$data=[];
			$count=strlen($string);
			for($i=0;$i<$count;$i+=11)
			{
				$data[]=trim(substr($string,$i,11));
			}

			
            //echo '<br>';
			//$data[]=substr($string1,-11,13);
			//var_dump($data);
			//die;
			$arr=[];
			$arr1=[];
			foreach($data as $vv)
			{
				//var_dump($vv);
				$data=Db::table('MobileSales')->alias('a')->join('Store w','a.cid=w.cid')->where(['phoneNumber'=>$vv])->select();
				if($data)
				{
					$arr[]=$data;
                    //return view('num',['arr'=>$data]);
				}
				else
				{
					//echo $vv.'<br>';
					$arr1[]=$vv;
					
					//return view('num',['arr1'=>$arr1]);
				}
				
			}
			$arr2=Db::table('store')->select();
			//echo "<br>";
			//var_dump($arr2);
		    	return view('num',['arr'=>$arr,'arr1'=>$arr1,'arr2'=>$arr2]);
            
		}
		else{
			return view();
		}
	}
	public function city(Request $request)
	{
        if($request->isPost())
        {
        	$data=$request->param();
        	//var_dump($data);
        	
        	$vke=[];
        	$vbu=[];
            foreach($data['num'] as $v)
            {
            	$num=substr($v,0,7);
            	$sql="select * from MobileSales,Store where MobileSales.cid=Store.cid and city='{$data['store']}' and phoneNumber like '{$num}%'
";
            	

            	$arr=Db::query($sql);
                if(!empty($arr))
	            {
	            	$vbu[]=$v;
	            }
	            else{
	            	 $vke[]=$v;
	            }
            }
            
            /*var_dump($vbu);
            echo '<br>';
            var_dump($vke);*/
            return json_encode(['vbu'=>$vbu,'vke'=>$vke]);
            
        }
	}
}