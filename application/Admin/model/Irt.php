<?php
namespace app\Admin\model;
use think\Model;
use think\Db;

class Irt extends Model
{
	protected $table = 'MobileSales';

	public function yyy($data='')
	{
         $bool=Db::table('MobileSales')->insert($data);
         if($bool){
         	return true;
         }else{
         	return false;
         }

	}
}