<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Index extends controller
{
    public function index()
    {   $result = Db::query('select * from think_data');
        dump($result);

    }

    public function db(){
        $list=Db::table('think_data')
        ->where('id',6)->select();
        dump($list);

    }
    public function db2()
    {
        $list=Db::name('data')
            ->where('id','>',7)
            ->select();
        dump($list);
    }

    public function db3()
    {
        $d=db('data');
        $result=$d->insertGetId(['name'=>'vvvv']);
        dump($result);
    }
    public function db4()
    {
        for ($i=3;$i<60;$i++)
        {
            $data1 = [
                ['name' =>'t'.$i]
            ];
            $result=db('data')->insertAll($data1);
        }

        dump($data1);
    }
    public function add()
    {
        $data=Db::name('data')->select();
        dump($data);
    }

}
